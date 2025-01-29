<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $committees = [
            [
                "name_ar" => "لجنة الشؤون المالية",
                "name_fr" => "Commission des affaires financières",
                "description_ar" => "تختص اللجنة بالشؤون المالية والموازنة العامة.",
                "description_fr" => "Cette commission est responsable des affaires financières et du budget.",
            ],
            [
                "name_ar" => "لجنة الشؤون القانونية",
                "name_fr" => "Commission des affaires juridiques",
                "description_ar" => "تتولى اللجنة معالجة القضايا القانونية والتشريعية.",
                "description_fr" => "Cette commission traite des questions juridiques et législatives.",
            ],
            [
                "name_ar" => "لجنة التعليم والتكوين",
                "name_fr" => "Commission de l'éducation et de la formation",
                "description_ar" => "تختص اللجنة بمسائل التعليم والتدريب في مختلف المجالات.",
                "description_fr" => "Cette commission est responsable de l'éducation et de la formation dans divers domaines.",
            ],
            [
                "name_ar" => "لجنة الشؤون الاجتماعية",
                "name_fr" => "Commission des affaires sociales",
                "description_ar" => "تهتم اللجنة بالقضايا الاجتماعية والرعاية الاجتماعية.",
                "description_fr" => "Cette commission se préoccupe des questions sociales et de la protection sociale.",
            ],
            [
                "name_ar" => "لجنة التخطيط والتنمية",
                "name_fr" => "Commission de planification et de développement",
                "description_ar" => "تتولى اللجنة مسئولية تخطيط وتنفيذ مشاريع التنمية.",
                "description_fr" => "Cette commission est responsable de la planification et de la mise en œuvre des projets de développement.",
            ],
            [
                "name_ar" => "لجنة البيئة والتنمية المستدامة",
                "name_fr" => "Commission de l'environnement et du développement durable",
                "description_ar" => "تختص اللجنة بحماية البيئة وتعزيز التنمية المستدامة.",
                "description_fr" => "Cette commission se consacre à la protection de l'environnement et à la promotion du développement durable.",
            ],
            [
                "name_ar" => "لجنة الاقتصاد والتجارة",
                "name_fr" => "Commission de l'économie et du commerce",
                "description_ar" => "تعمل اللجنة على تطوير الاقتصاد وتعزيز التجارة.",
                "description_fr" => "Cette commission œuvre pour le développement de l'économie et la promotion du commerce.",
            ],
            [
                "name_ar" => "لجنة الثقافة والرياضة",
                "name_fr" => "Commission de la culture et du sport",
                "description_ar" => "تتولى اللجنة تعزيز الأنشطة الثقافية والرياضية.",
                "description_fr" => "Cette commission est chargée de promouvoir les activités culturelles et sportives.",
            ],
            [
                "name_ar" => "لجنة الصحة",
                "name_fr" => "Commission de la santé",
                "description_ar" => "تختص اللجنة بالقضايا الصحية والرعاية الطبية.",
                "description_fr" => "Cette commission est responsable des questions de santé et de soins médicaux.",
            ],
            [
                "name_ar" => "لجنة الإعلام",
                "name_fr" => "Commission des médias",
                "description_ar" => "تهتم اللجنة بشؤون الإعلام والاتصال.",
                "description_fr" => "Cette commission s'occupe des questions relatives aux médias et à la communication.",
            ],
        ];


        Committee::insert(values: $committees);
    }
}
