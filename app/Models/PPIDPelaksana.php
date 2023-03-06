<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PPIDPelaksana extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "ppid_pelaksana";
    protected $fillable = [
        'nama_opd','alamat', 'telepon', 'user_id'];
}
