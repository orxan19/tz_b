<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(10)
            ->for(Country::factory()->create())
            ->hasAttached(
                User::factory(10)->create(),
                ['date_at' => now()]
            )
            ->create();

    }
}
