<?php

namespace Database\Seeders;

use App\Models\DepartmentModel;
use App\Models\DesignationModel;
use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentModel::insert([
            [
                'name' => 'Information Technology'

            ],
            [
                'name' => 'civil'

            ],
            [
                'name' => 'sales'

            ],
            [
                'name' => 'accounting'

            ],
            [
                'name' => 'HR'

            ]

        ]);

        DesignationModel::insert([
            [
                'name' => 'sales_manager'
            ],
            [
                'name' => 'sales_executive'
            ],
            [
                'name' => 'employee'
            ],
            [
                'name' => 'co_ordinator'
            ],
            [
                'name' => 'manager'
            ]
        ]);

        UserModel::insert([
            [

                'name' => 'amal',
                'Fk_department' => 1,
                'Fk_designation' => 2,
                'mobile' => 8765678976,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'jishnu',
                'Fk_department' => 2,
                'Fk_designation' => 3,
                'mobile' => 8765678977,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'jeez',
                'Fk_department' => 3,
                'Fk_designation' => 4,
                'mobile' => 8765678978,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'mnop',
                'Fk_department' => 4,
                'Fk_designation' => 5,
                'mobile' => 8765678979,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'vishnu',
                'Fk_department' => 5,
                'Fk_designation' => 1,
                'mobile' => 8765678980,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
