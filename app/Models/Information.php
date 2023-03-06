<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "information";
    protected $fillable = [
        'kategori_informasi','slug', 'deskripsi', 'title', 'user_id'];
}
