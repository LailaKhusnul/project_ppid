<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "kategori";
    protected $fillable = [
        'nama_kategori','slug', 'isaktif'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
