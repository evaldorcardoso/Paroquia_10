<?php

namespace Database\Seeders;

use App\Models\Congregation;
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
        Congregation::factory()->count(10)->create();
    }
}
