<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $organizationIds = DB::table('organizations')->pluck('id');

        foreach(range(1,5) as $index){
            DB::table('branches')->insert([
                'organization_id'=>$organizationIds->random(),
                'name'=>$faker->companySuffix.' Branch',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
