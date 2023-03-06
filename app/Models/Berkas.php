<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berkas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'berkas';

    protected $fillable = ['profile_id', 'jenis_file', 'path_file'];


    public function profile(){
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
