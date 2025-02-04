<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $members = [
        //     [
        //         "name" => ,
        //         "phone" => ,
        //         "email" => ,
        //         "adress" => ,
        //         "cin_number" => "GM" . ,
        //         "rib_number" => ,
        //         "political_party" =>  ,
        //         "bank_name" => ,
        //         "month" =>,
        //         "role_id" => ,
        //         "permissions" => [
        //             "permission 1 | الصلاحية الاولى",
        //             "permission 2 | الصلاحية الثانية",
        //             "permission 3 | الصلاحية الثالثة",
        //         ],
        //     ],
        // ];

        // DB::table('members')->insert($members);

        Member::factory()
            ->count(18)
            ->create();
    }
}
