<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "profile";
    protected $fillable = [
      'kategori_profile', 'slug', 'deskripsi', 'title', 'user_id'];
    
    public function berkas(){
        return $this->hasMany(Berkas::class,'profile_id');
    }

}
