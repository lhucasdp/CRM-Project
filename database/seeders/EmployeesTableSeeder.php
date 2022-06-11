<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            Employee::factory()->state([
                'company_id' => $company->id,
            ])->count(2)->create();
        }
    }
}
