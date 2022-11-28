<?php

namespace Database\Seeders;

use App\Models\Congregation;
use App\Models\Event;
use Illuminate\Database\Seeder;

class CongregationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Congregation::factory()
            ->has(Event::factory()->count(2))
            ->count(10)
            ->create();
    }
}
