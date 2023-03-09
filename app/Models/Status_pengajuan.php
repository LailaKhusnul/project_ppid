<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_pengajuan extends Model
{
    use HasFactory;
    public $table = "cekstatuspengajuan";
    protected $fillable = [
        'kode_permohonan', 'nik_nip'];
}
