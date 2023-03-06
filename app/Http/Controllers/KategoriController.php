<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $judul = "Data Kategori";
        return view('admin.kategori.index', compact('kategori', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all()->first();
        $judul = "Tambah Data Kategori";
        return view('admin.kategori.create', compact('kategori', 'judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($kategori->nama_kategori, '-');
        $kategori->isaktif = $request->isaktif;
        $kategori->save();
        if ($kategori) {
            Session::flash('success','Data Kategori Berhasil Ditambahkan');
            return redirect()->route('categories.index');
        } else {
            Session::flash('failed','Data Kategori Gagal Ditambahkan');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $judul = "Update Data Kategori";
        return view('admin.kategori.edit',compact('kategori', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $kategori = Kategori::find($id);
       $kategori->nama_kategori = $request->nama_kategori;
       $kategori->slug = Str::slug($kategori->nama_kategori, '-');
       $kategori->isaktif = $request->isaktif;
       $kategori->save();

        if ($kategori) {
            Session::flash('update','Update Data Kategori Berhasil');
            return redirect()->route('categories.index');
        } else {
            Session::flash('failed','Update Data Kategori Gagal');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        Session::flash('delete','Data Kategori Berhasil Dihapus');
        return redirect()->route('categories.index');
    }
}
