<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = ['Google', 'Facebook'];
        foreach ($companies as $key => $value) {
            Company::firstOrCreate(['name' => $value], ['name' => $value]);
        }
    }
}
