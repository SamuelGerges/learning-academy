<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'Samuel Gerges',
            'spec' => 'Backend Developer',
            'img' => '1.png'
        ]);
        Trainer::create([
            'name' => 'Mina Gerges',
            'spec' => 'Manager',
            'img' => '1.png'
        ]);
        Trainer::create([
            'name' => 'Ahmed Hassan',
            'spec' => 'Dentist',
            'img' => '2.png'
        ]);
        Trainer::create([
            'name' => 'Ramy Ayman',
            'spec' => 'First Teacher',
            'img' => '3.png'
        ]);
    }
}
