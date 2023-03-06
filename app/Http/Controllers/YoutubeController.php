<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Youtube;
use Session;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = Youtube::all();
        $judul = "Data Youtube";
        return view('admin.youtube.index', compact('youtube', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Data Youtube";
        return view('admin.youtube.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publish = isset($_POST['status_publish']) ? 1 : 0;

        $youtube_data = new Youtube;
        $youtube_data->judul = $request->judul;
        $youtube_data->content = $request->content;
        $youtube_data->link = $request->link;
        $youtube_data->ispublish = $publish;
        $youtube_data->save();
        if ($youtube_data) {
            Session::flash('success','Data Youtube Berhasil Ditambahkan');
            return redirect()->route('admin.youtube.index');
        } else {
            Session::flash('failed','Data Youtube Gagal Ditambahkan');
            return redirect()->route('admin.youtube.index');
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
    public function edit(youtube $youtube)
    {
        $judul = "Update Data Youtube";
        $youtube = Youtube::findorfail($youtube->id);

        return view('admin.youtube.edit', compact('judul', 'youtube'));
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
        $publish = isset($_POST['status_publish']) ? 1 : 0;

        $youtube_data = Youtube::find($id);
        $youtube_data->judul = $request->judul;
        $youtube_data->content = $request->content;
        $youtube_data->link = $request->link;
        $youtube_data->ispublish = $publish;
        $youtube_data->save();
        if ($youtube_data) {
            Session::flash('success','Data Youtube Berhasil Ditambahkan');
            return redirect()->route('admin.youtube.index');
        } else {
            Session::flash('failed','Data Youtube Gagal Ditambahkan');
            return redirect()->route('admin.youtube.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(youtube $youtube)
    {
        $youtube_data = Youtube::findorfail($youtube->id);
        $youtube_data->delete();
        
        $youtube->delete();

        Session::flash('delete','Data Youtube Berhasil Dihapus');
        return redirect()->route('admin.youtube.index');
    }
}
