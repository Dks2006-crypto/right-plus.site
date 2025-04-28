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
                'name' => 'Иванова Анна Сергеевна',
                'specialization' => 'Корпоративное право',
                'experience' => 12,
                'education' => 'МГУ им. М.В. Ломоносова, юридический факультет',
                'biography' => 'Специализируется на корпоративном праве, M&A, антимонопольном регулировании. Имеет опыт работы в международных юридических компаниях.',
                'is_active' => true,
            ],
            [
                'name' => 'Петров Дмитрий Владимирович',
                'specialization' => 'Налоговое право',
                'experience' => 8,
                'education' => 'СПбГУ, юридический факультет',
                'biography' => 'Эксперт в области налогового права и налогового планирования. Помогает клиентам оптимизировать налоговую нагрузку.',
                'is_active' => true,
            ],
            [
                'name' => 'Горнова Елена Александровна',
                'specialization' => 'Семейное право',
                'experience' => 15,
                'education' => 'МГЮА им. О.Е. Кутафина',
                'biography' => 'Специалист по семейным спорам, разделу имущества, алиментным обязательствам. Принципиальный сторонник досудебного урегулирования споров.',
                'is_active' => true,
            ],
            [
                'name' => 'Козлов Артем Игоревич',
                'specialization' => 'Трудовое право',
                'experience' => 6,
                'education' => 'РУДН, юридический факультет',
                'biography' => 'Защищает права работников и работодателей. Специализируется на сложных трудовых спорах и миграционном законодательстве.',
                'is_active' => true,
            ],
        ];
        foreach($lawyers as $lawyer){
            lawyer::create($lawyer);
        }
    }
}
