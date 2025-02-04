<?php

namespace Database\Seeders;

use App\Models\RMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rmembers = [
            [
                "name_ar" => 'رئيس المجلس',
                "name_fr" => 'président',
                "salary" => 4200,
            ],
            [
                "name_ar" => 'النائب الأول لرئيس المجلس',
                "name_fr" => 'Premier vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'النائب الثاني لرئيس المجلس',
                "name_fr" => 'Deuxième vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'النائب الثالث لرئيس المجلس',
                "name_fr" => 'Troisième vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'النائب الرابع لرئيس المجلس',
                "name_fr" => 'Quatrième vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'النائب الخامس لرئيس المجلس',
                "name_fr" => 'Cinquième vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'النائب السادس لرئيس المجلس',
                "name_fr" => 'Sixième vice-président',
                "salary" => 2000,
            ],
            [
                "name_ar" => 'كاتب المجلس',
                "name_fr" => 'Secrétaire du conseil',
                "salary" => 1000,
            ],
            [
                "name_ar" => 'نائب كاتب المجلس',
                "name_fr" => 'Vice-secrétaire du conseil',
                "salary" => 500,
            ],
            [
                "name_ar" => "رئيسة اللجنة المكلفة بالتخطيط والشؤون الاقتصادية والمالية",
                "name_fr" => "Présidente de la Commission de la Planification et des Affaires Économiques et Financières",
                "salary" => 1000
            ],
            [
                "name_ar" => "نائب رئيسة اللجنة المكلفة بالتخطيط والشؤون الاقتصادية والمالية",
                "name_fr" => "Vice-Présidente de la Commission de la Planification et des Affaires Économiques et Financières",
                "salary" => 500
            ],
            [
                "name_ar" => "رئيس اللجنة المكلفة بالتعمير والمرافق العمومية",
                "name_fr" => "Président de la Commission des Affaires Juridiques",
                "salary" => 1000
            ],
            [
                "name_ar" => "نائب رئيس اللجنة المكلفة بالتعمير والمرافق العمومية",
                "name_fr" => "Vice-Président de la Commission des Affaires Juridiques",
                "salary" => 500
            ],
            [
                "name_ar" => "رئيسة اللجنة المكلفة بالتنمية البشرية والشؤون الاجتماعية والثقافية والرياضية",
                "name_fr" => "Présidente de la Commission de l'Éducation et de la Formation",
                "salary" => 1000
            ],
            [
                "name_ar" => "نائب رئيسة اللجنة المكلفة بالتنمية البشرية والشؤون الاجتماعية والثقافية والرياضية",
                "name_fr" => "Vice-Présidente de la Commission de l'Éducation et de la Formation",
                "salary" => 500
            ],
            [
                "name_ar" => "رئيس اللجنة المكلفة بالتنمية المحلية والبيئية",
                "name_fr" => "Président de la Commission des Affaires Sociales",
                "salary" => 1000
            ],
            [
                "name_ar" => "نائب رئيس اللجنة المكلفة بالتنمية المحلية والبيئية",
                "name_fr" => "Vice-Président de la Commission des Affaires Sociales",
                "salary" => 500
            ],
            [
                "name_ar" => "رئيس اللجنة المكلفة بالتخطيط الاستراتيجي التشاركي والتنمية المجالية",
                "name_fr" => "Président de la Commission de la Planification et du Développement",
                "salary" => 1000
            ],
            [
                "name_ar" => "نائب رئيس اللجنة المكلفة بالتخطيط الاستراتيجي التشاركي والتنمية المجالية",
                "name_fr" => "Vice-Président de la Commission de la Planification et du Développement",
                "salary" => 500
            ],
        ];


        DB::table('role_members')->insert($rmembers);
    }
}
