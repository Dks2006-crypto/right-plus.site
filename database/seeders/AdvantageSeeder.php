<?php

namespace Database\Seeders;

use App\Models\advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adventages = [
            [
                'title' => 'Гарантия конфиденциальности',
                'description' => 'Все данные защищены NDA. Работаем по криптозащищенным каналам связи.'
            ],
            [
                'title' => 'Срочная помощь 24/7',
                'description' => 'Дежурный юрист ответит в течение 15 минут даже ночью.',
            ],
            [
                'title' => 'Победы в 95% дел',
                'description' => 'Реальные кейсы с суммами выигрыша от 500 тыс. до 50 млн руб.'
            ],
        ];
        foreach($adventages as $adventage){
            advantage::create($adventage);
        }
    }
}
