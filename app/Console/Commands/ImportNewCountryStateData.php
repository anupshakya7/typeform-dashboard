<?php

namespace App\Console\Commands;

use App\Models\NCountry;
use App\Models\NSubCountry;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportNewCountryStateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:new-country-state-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserting Countries and its State new data into Database from json.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try{
            $countriesState = public_path('build/countries_json/country_states.json');
    
            $countriesStateCode = file_get_contents($countriesState);
            $countriesStateArray = json_decode($countriesStateCode);
    
            foreach($countriesStateArray as $country){
                NCountry::create([
                    'name'=>$country->name,
                    'code'=>$country->iso3,
                    'capital'=>$country->capital,
                    'latitude'=>$country->latitude,
                    'longitude'=>$country->longitude,
                ]);
            }
            
            foreach($countriesStateArray as $country){
               foreach($country->states as $state){
                    NSubCountry::create([
                        'name'=>$state->name,
                        'countryCode'=>$country->iso3,
                        'latitude'=>$state->latitude,
                        'longitude'=>$state->longitude,
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
