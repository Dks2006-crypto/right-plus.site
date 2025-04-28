<?php

namespace Database\Seeders;

use App\Models\IntroCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntroCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'title' => '8',
                'description' => 'Лет на рынке',
            ],
            [
                'title' => '1000+',
                'description' => 'довольных клиентов',
            ],
            [
                'title' => 'Более 1000',
                'description' => 'Успешных дел',
            ],
        ];
        foreach($cards as $card){
            IntroCard::create($card);
        }
    }
}
