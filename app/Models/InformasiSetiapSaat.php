<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InformasiSetiapSaat extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "informasi_setiap_saat";
    protected $fillable = [
        'judul','isi','slug'];
}
