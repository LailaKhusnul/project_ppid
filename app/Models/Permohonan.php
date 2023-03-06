<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $fillable = [
        'kategori_permohonan', 'nik_nip', 'nama_lengkap', 'ktp', 'akta', 'email',
        'telepon', 'pekerjaan', 'alamat', 'rincian_informasi', 'tujuan', 'get_information',
        'copy_information', 'how_copy', 'kode_permohonan'];
}
