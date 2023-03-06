<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'pengumuman', 'slug' =>'pengumuman'
            ],
            [
                'nama_kategori' => 'produk hukum','slug' =>'produk_hukum'
            ],
            [
                'nama_kategori' => 'materi ppid kota','slug' =>'materi-ppid-kota'
            ],
            [
                'nama_kategori' => 'materi umum','slug' =>'materi-umum'
            ],
            [
                'nama_kategori' => 'laporan pengaduan','slug' =>'laporan-pengaduan'
            ],
            [
                'nama_kategori' => 'berita ppid','slug' =>'berita-ppid'
            ],
            [
                'nama_kategori' => 'artikel','slug' =>'artikel'
            ],
            [
                'nama_kategori' => 'narasi tunggal','slug' =>'narasi-tunggal'
            ],
            [
                'nama_kategori' => 'galeri','slug' =>'galeri'
            ],
            [
                'nama_kategori' => 'infografis','slug' =>'infografis'
            ]
        ]);
    }
}
