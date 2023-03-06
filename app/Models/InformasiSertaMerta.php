<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InformasiSertaMerta extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "informasi_serta_merta";
    protected $fillable = [
        'judul','isi','slug'];
}
