<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InformasiBerkala extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "informasi_berkala";
    protected $fillable = [
        'judul','slug','isi'];
}
