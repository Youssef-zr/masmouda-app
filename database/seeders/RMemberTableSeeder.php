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
                "name_ar" => 'الرئيس',
                "name_fr" => 'président',
                "salary" => 4200, // Example salary
            ],
            [
                "name_ar" => 'النائب الأول للرئيس',
                "name_fr" => 'Premier vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب الثاني للرئيس',
                "name_fr" => 'Deuxième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب الثالث للرئيس',
                "name_fr" => 'Troisième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب الرابع للرئيس',
                "name_fr" => 'Quatrième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب الخامس للرئيس',
                "name_fr" => 'Cinquième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب السادس للرئيس',
                "name_fr" => 'Sixième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'النائب السابع للرئيس',
                "name_fr" => 'Septième vice-président',
                "salary" => 2000, // Example salary
            ],
            [
                "name_ar" => 'كاتب المجلس',
                "name_fr" => 'Secrétaire du conseil',
                "salary" => 1500, // Example salary
            ],
            [
                "name_ar" => 'نائب كاتب المجلس',
                "name_fr" => 'Vice-secrétaire du conseil',
                "salary" => 1500, // Example salary
            ],
            [
                "name_ar" => 'عضو',
                "name_fr" => 'Membre',
                "salary" => 1000, // Example salary
            ]
        ];


        DB::table('role_members')->insert($rmembers);
    }
}
