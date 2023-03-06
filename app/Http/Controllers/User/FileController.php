<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function show(Request $request)
    {
        try {
            return Storage::response(decrypt($request->file));
        } catch (\Throwable $th) {
            return 'File tidak ditemukan!';
        }
    }

    public function showgambar($gambar)
    {
        try {
           // $path =   Storage::disk('local')->put('public',$gambar);
            return storage_path('app/thumbnail/2022/10/28/pengajian akbar gus miftah_1666924932.jpeg') ;
            // return Storage::url($gambar);
        } catch (\Throwable $th) {
            return 'File tidak ditemukan!';
        }
     
    }
}