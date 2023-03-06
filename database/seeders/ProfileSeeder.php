<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
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
            'kategori_profile' => 'profil-kota-madiun'
            ],
            [
                'kategori_profile' => 'sejarah-kota-madiun'
            ],
            [
                'kategori_profile' => 'letak-geografis'
            ],
            [
                'kategori_profile' => 'profil-pemerintah'
            ],
            [
                'kategori_profile' => 'profil-pejabat'
            ],
            [
                'kategori_profile' => 'lhkpn-pejabat'
            ],
            [
                'kategori_profile' => 'visi-misi'
            ],
            [
                'kategori_profile' => 'struktur-organisasi-pemerintah'
            ],
            [
                'kategori_profile' => 'struktur-organisasi-unit-kerja'
            ],
            [
                'kategori_profile' => 'tupoksi-pemerintah'
            ],
            [
                'kategori_profile' => 'tupoksi-unit-kerja'
            ],
            [
                'kategori_profile' => 'agenda-kerja-kegiatan-pimpinan'
            ]
        ]);
    }
}
