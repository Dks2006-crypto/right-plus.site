<?php

namespace Database\Seeders;

use App\Models\Intro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intros = [
            [
                'title' => 'Профессиональные юридические решения для бизнеса и частных клиентов',
                'description' => 'Мы гарантируем полное правовое сопровождение, защиту ваших интересов и индивидуальный подход к каждому делу. Наши юристы с опытом от 10 лет помогут разрешить даже самые сложные правовые вопросы.',
            ]
        ];
        foreach($intros as $intro){
            Intro::create($intro);
        }
    }
}
