<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InformasiPublik extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "informasi_publik";
    protected $fillable = [
        'daftar_informasi','ringkasan', 'jenis', 'jangka_waktu','link'];
}
