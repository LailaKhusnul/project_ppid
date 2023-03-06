<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "tags";
    protected $fillable = [
        'jenis_tag', 'slug_tag', 'isaktif'];
    
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
