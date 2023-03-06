<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InformasiPPID extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "informasi_ppid";
    protected $fillable = [
        'ppid','link'];
}
