<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('information')->insert([
            [
                'kategori_informasi' => 'daftar-informasi-publik'
            ],
            [
                'kategori_informasi' => 'daftar-informasi-publik-ppid-pelaksana'
            ],
            [
                'kategori_informasi' => 'informasi-secara-berkala'
            ],
            [
                'kategori_informasi' => 'informasi-serta-merta'
            ],
            [
                'kategori_informasi' => 'informasi-setiap-saat'
            ],
            [
                'kategori_informasi' => 'informasi-dikecualikan'
            ],
            [
                'kategori_informasi' => 'sop-pedoman-pengelolaan-organisasi'
            ],
            [
                'kategori_informasi' => 'sop-pedoman-pengelolaan-administrasi'
            ],
            [
                'kategori_informasi' => 'sop-pedoman-kepegawaian'
            ],
            [
                'kategori_informasi' => 'sop-pedoman-pengelolaan-keuangan'
            ]
        ]);
    }
}
