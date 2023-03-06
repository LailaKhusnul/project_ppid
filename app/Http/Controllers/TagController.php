<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $judul = "Data Tag";
        return view('admin.tags.index', compact('tags', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->first();
        $judul = "Tambah Data Tag";
        return view('admin.tags.create', compact('tags', 'judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = new Tag;
        $tags->jenis_tag = $request->jenis_tag;
        $tags->slug_tag = Str::slug($tags->jenis_tag, '-');
        $tags->isaktif = $request->isaktif;
        $tags->save();
        if ($tags) {
            Session::flash('success','Data Tag Berhasil Ditambahkan');
            return redirect()->route('admin.tags.index');
        } else {
            Session::flash('failed','Data Tag Gagal Ditambahkan');
            return redirect()->route('admin.tags.index');
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
        $tags = Tag::find($id);
        $judul = "Update Data Tag";
        return view('admin.tags.edit',compact('tags', 'judul'));
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
        $tags = Tag::find($id);
        $tags->jenis_tag = $request->jenis_tag;
        $tags->slug_tag = Str::slug($tags->jenis_tag, '-');
        $tags->isaktif = $request->isaktif;
        $tags->save();

            if ($tags) {
                Session::flash('update','Update Data Tag Berhasil');
                return redirect()->route('admin.tags.index');
            } else {
                Session::flash('failed','Update Data Tag Gagal');
                return redirect()->route('admin.tags.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag = Tag::findorfail($tag->id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('delete','Data Tag Berhasil Dihapus');
        return redirect()->route('admin.tags.index');
    } 
}
