<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function show(Request $request)
    {
        try {
            return Storage::response(decrypt($request->file));
        } catch (\Throwable $th) {
            return 'File tidak ditemukan!';
        }
    }
}
