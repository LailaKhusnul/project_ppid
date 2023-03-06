<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\Icon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::all();
        $judul = "Data Icons";
        return view('admin.icons.index', compact('icons', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Data Icons";
        return view('admin.icons.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $file = $request->file('icon');
        $file_name = $file->getClientOriginalName();
        $fileName = pathinfo($file_name, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $path = $file->storeAs('icon/'.$year.'/'.$month.'/'.$day, $fileName, 'local');

        $icon = new icon;
        $icon->judul = $request->judul;
        $icon->subjudul = $request->subjudul;
        $icon->link = $request->link;
        $icon->kategori_name = $request->kategori_name;
        $icon->icon = $path;
        $icon->save();
        if ($icon) {
            Session::flash('success','Data Icon Berhasil Ditambahkan');
            return redirect()->route('admin.icons.index');
        } else {
            Session::flash('failed','Data Icon Gagal Ditambahkan');
            return redirect()->route('admin.icons.index');
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
    public function edit(Icon $icon)
    {
        $judul = "Update Data Icons";
        $icons = Icon::findorfail($icon->id);

        return view('admin.icons.edit', compact('icons', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Icon $icon)
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $icon = Icon::findorfail($icon->id);

        if($request->hasFile('icon')){
            $file=$request->file('icon');
    
                $file_name = $file->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
    
                $path = $file->storeAs('icon/'.$year.'/'.$month.'/'.$day, $fileName, 'local');

        $icon_data = [
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'link' => $request->link,
            'kategori_name' => $request->kategori_name,
            'icon' => $path
        ];

    }else{

        $icon_data = [
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'link' => $request->link,
            'kategori_name' => $request->kategori_name
        ];
    }
        
        $icon->update($icon_data);

            Session::flash('success','Update Data icon Berhasil');
            return redirect()->route('admin.icons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icon $icon)
    {
        $icons_data = Icon::findorfail($icon->id);
        $icons_data->delete();
        
        $icon->delete();

        Session::flash('delete','Data icon Berhasil Dihapus');
        return redirect()->route('admin.icons.index');
    }
}
