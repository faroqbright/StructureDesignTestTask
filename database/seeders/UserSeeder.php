<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $tenants = ['GoogleTenant', 'FacebookTenant'];
        foreach ($companies as $key => $company) {
            // Tenant::firstOrCreate(['name' => $tenants[$key]], ['name' => $tenants[$key], 'company_id' => $company->id]);
        }
    }
}
