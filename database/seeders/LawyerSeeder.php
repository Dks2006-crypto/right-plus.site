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

            ],
            [],
            [],
        ];
        foreach($lawyers as $lawyer){
            lawyer::create($lawyer);
        }
    }
}
