<?php

namespace App\Console\Commands;

use App\Models\CountryState;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportCountryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:country-state';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserting Countries and its State data into Database from json.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try{
            $countriesState = public_path('build/countries_json/countries_state.json');

            $countriesStateCode = file_get_contents($countriesState);
            $countriesStateArray = json_decode($countriesStateCode);

            foreach($countriesStateArray as $country){
                CountryState::create([
                    'name'=>$country->name,
                    'code'=>$country->code3,
                    'parent_code'=>null,
                    'level'=>0,
                ]);
            }

            foreach($countriesStateArray as $country){
               foreach($country->states as $state){
                    CountryState::create([
                        'name'=>$state->name,
                        'code'=>$state->code,
                        'parent_code'=>$country->code3,
                        'level'=>1,
                    ]);
               }
            }

            Log::info('Successfully Inserted Both Countries and its State Data');
            echo "Successfully Inserted Countries and States";
        }catch(Exception $e){
            Log::error($e->getMessage());
            echo "Errors while inserting Countries and States";
        }
        
    }
}
