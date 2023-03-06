<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'judul', 'kategori_id', 'contents', 'thumbnail', 'tgl_post', 'slug', 'users_id', 'ispublish', 'ispinned'];

    
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function documents(){
        return $this->hasMany(Document::class,'posts_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
