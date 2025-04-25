<?php

namespace Database\Seeders;

use App\Models\lawyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LawyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lawyers = [
            [
                'name' => 'Иванов Петр Сергеевич',
                'specialization' => 'Налоговое право',
                'experience' => 12,
            ],
            [
                'name' => 'Городов Андрей Сергеевич',
                'specialization' => 'Налоговое право',
                'experience' => 6,
                'is_active' => false,
            ],
            [
                'name' => 'Ворко Руслан Шагенович',
                'specialization' => 'Арбитраж',
                'experience' => 4,
            ],
        ];
        foreach($lawyers as $lawyer){
            lawyer::create($lawyer);
        }
    }
}
