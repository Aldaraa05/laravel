<?php

namespace Database\Seeders;

use App\Models\Angi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AngiSeeder extends Seeder
{
    
    public function run()
    {
        Angi::factory()
            ->count(12)
            ->hasSuragches(10)
            ->hasBagshes(1)
            ->create();
        
    }
}
