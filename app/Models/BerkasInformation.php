<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BerkasInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "berkas_information";
    protected $fillable = ['informasi_id', 'jenis_file', 'path_file'];

    public function information(){
        return $this->belongsTo(Information::class, 'informasi_id');
    }
}
