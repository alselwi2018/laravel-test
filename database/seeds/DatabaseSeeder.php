<?php

use App\order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companyStatuses = [
            ['name' => 'Active'],
            ['name' => 'Lost'],
            ['name' => 'Suspended'],
            ['name' => 'Prospect'],
        ];

        foreach($companyStatuses as $status)
        {
            App\CompanyStatus::create($status);
        }

        $companyTypes = [
            ['name' => 'Distributor'],
            ['name' => 'Agent'],
            ['name' => 'Reseller'],
            ['name' => 'Supplier'],
        ];
        foreach($companyTypes as $companyType)
        {
            App\CompanyType::create($companyType);
        }

        $contactRoles = [
            ['name' => 'Director'],
            ['name' => 'Owner'],
            ['name' => 'Manager'],
            ['name' => 'Staff'],
        ];
        foreach($contactRoles as $role)
        {
            App\ContactRole::create($role);
        }


        factory(App\Company::class, 500)->create()->each(function ($c) {
            $c->contacts()->saveMany(factory(App\Contact::class, rand(1,5))->make());
        });

        factory(App\order::class, 40)->create();
    }
}
