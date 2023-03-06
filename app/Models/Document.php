<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'documents';

    protected $fillable = ['posts_id', 'jenis_file', 'path_file'];


    public function posts(){
        return $this->belongsTo(Post::class, 'posts_id');
    }
}
