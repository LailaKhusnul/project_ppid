<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilePPIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            [
            'kategori_profile' => 'profil-ppid'
            ],
            [
                'kategori_profile' => 'visi-misi-ppid'
            ],
            [
                'kategori_profile' => 'bagan-struktur-ppid'
            ],
            [
                'kategori_profile' => 'sop-ppid'
            ],
            [
                'kategori_profile' => 'tupoksi-ppid'
            ],
            [
                'kategori_profile' => 'sk-ppid'
            ],
            [
                'kategori_profile' => 'perwal-ppid'
            ],
            [
                'kategori_profile' => 'maklumat-ppid'
            ],
            [
                'kategori_profile' => 'jam-pelayanan'
            ],
            [
                'kategori_profile' => 'sk-daftar-informasi-publik'
            ],
            [
                'kategori_profile' => 'sk-daftar-informasi-dikecualikan'
            ]
        ]);
    }
}
