<?php

namespace App\Http\Controllers;
use Session;
use DateTime;
use App\Models\Tag;
use App\Models\Icon;
use App\Models\Post;
use App\Models\Document;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $judul = "Data Posts";
        return view('admin.posts.index', compact('posts', 'judul'));
    }

    public function indexpengumuman()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '1');
        $judul = "Data Posts";
        return view('admin.posts.pengumuman', compact('posts', 'judul'));
    }

    public function indexproduk()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '2');
        $judul = "Data Posts";
        return view('admin.posts.produk', compact('posts', 'judul'));
    }

    public function materippid()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '3');
        $judul = "Data Posts";
        return view('admin.posts.ppidmateri', compact('posts', 'judul'));
    }

    public function materiumum()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '4');
        $judul = "Data Posts";
        return view('admin.posts.materiumum', compact('posts', 'judul'));
    }

    public function pengaduan()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '5');
        $judul = "Data Posts";
        return view('admin.posts.pengaduan', compact('posts', 'judul'));
    }

    public function berita()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '6');
        $judul = "Data Posts";
        return view('admin.posts.berita', compact('posts', 'judul'));
    }

    public function artikel()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '7');
        $judul = "Data Posts";
        return view('admin.posts.artikel', compact('posts', 'judul'));
    }

    public function narasi()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '8');
        $judul = "Data Posts";
        return view('admin.posts.narasi', compact('posts', 'judul'));
    }

    public function galeri()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '9');
        $judul = "Data Posts";
        return view('admin.posts.galeri', compact('posts', 'judul'));
    }

    public function infografis()
    {
        $posts = Post::all()
                ->where('kategori_id', '=', '10');
        $judul = "Data Posts";
        return view('admin.posts.infografis', compact('posts', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::orderBy('nama_kategori', 'ASC')->get();
        $tags = Tag::orderBy('jenis_tag', 'ASC')->get();
        $judul = "Tambah Data Posts";
        return view('admin.posts.create', compact('categories', 'judul', 'tags'));
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

        $tgl_post = DateTime::createFromFormat('Y-m-d', $request->tgl_post);
        $TglPostNew = $tgl_post->format('Y-m-d');

        $publish = isset($_POST['status_publish']) ? 1 : 0;
        $pinned = isset($_POST['status_pinned']) ? 1 : 0;

        
        
        if($request->hasFile('thumbnail')){
            $file=$request->file('thumbnail');
    
                $file_name = $file->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
    
                $path = $file->storeAs('thumbnail/'.$year.'/'.$month.'/'.$day, $fileName, 'local');

        $post = Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'contents' => $request->contents,
            'thumbnail' => $path,
            'tgl_post' => $TglPostNew,
            'slug' =>  Str::slug($request->judul),
            'users_id' => Auth::id(),
            'ispublish' => $publish,
            'ispinned' => $pinned
        ]);

        $post->tags()->attach($request->tags);

    } else {
        $post = Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'contents' => $request->contents,
            'tgl_post' => $TglPostNew,
            'slug' =>  Str::slug($request->judul),
            'users_id' => Auth::id(),
            'ispublish' => $publish,
            'ispinned' => $pinned
        ]);

        $post->tags()->attach($request->tags);
    }

        if($request->hasFile('dokumen')){
            foreach ($request->file('dokumen') as $filegambar) {
                $file_name = $filegambar->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $filegambar->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document= new Document();
                $pathgambar = $filegambar->storeAs('dokumen/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->posts_id = $post->id;
                $document->jenis_file = "gambar";
                $document->path_file = $pathgambar;
                $document->save();
            }
        }

        if($request->hasFile('file_lampiran')){
            foreach ($request->file('file_lampiran') as $lampiran) {
                $file_name = $lampiran->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $lampiran->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document = new Document();
                $pathlampiran = $lampiran->storeAs('lampiran/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->posts_id = $post->id;
                $document->jenis_file = "lampiran";
                $document->path_file = $pathlampiran;
                $document->save();
            }
        }

            Session::flash('success','Data Post Berhasil Ditambahkan');
            return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = Post::where('id', '=', $post->id)->get();
        $galleries = Document::where('posts_id', '=', $post->id)->where('jenis_file', '=', 'gambar')->get();
        $files = Document::where('posts_id', '=', $post->id)->where('jenis_file', '=', 'lampiran')->get();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $categories = Kategori::all();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        $parent = "berita";
        $subjudul = "Detail Berita";
        $child = "";
        $root_parent = "/";
        $title = "Detail Berita";

        return view('admin.posts.show', compact('galleries','logo','subjudul','data', 'files', 'beritaterkini', 'categories', 'parent', 'child', 'root_parent', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();
        $tags = Tag::orderBy('jenis_tag', 'ASC')->get();
        $judul = "Update Data Post";
        $posts = Post::findorfail($post->id);

        $documents = Document::where('posts_id', '=', $posts->id)->get();

        return view('admin.posts.edit', compact('documents','kategori', 'tags', 'posts', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $tgl_post = DateTime::createFromFormat('Y-m-d', $request->tgl_post);
        $TglPostNew = $tgl_post->format('Y-m-d');
       
        $post = Post::findorfail($post->id);

        $publish = isset($_POST['status_publish']) ? 1 : 0;
        $pinned = isset($_POST['status_pinned']) ? 1 : 0;


        if($request->hasFile('thumbnail')){
            $file=$request->file('thumbnail');
    
                $file_name = $file->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
    
                $path = $file->storeAs('thumbnail/'.$year.'/'.$month.'/'.$day, $fileName, 'local');

        $post_data = [
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'contents' => $request->contents,
            'thumbnail' => $path,
            'tgl_post' => $TglPostNew,
            'slug' =>  Str::slug($request->judul),
            'ispublish' => $publish,
            'ispinned' => $pinned
        ];

    }else{

        $post_data = [
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'contents' => $request->contents,
            'tgl_post' => $TglPostNew,
            'slug' =>  Str::slug($request->judul),
            'ispublish' => $publish,
            'ispinned' => $pinned
        ];
    }

        if($request->hasFile('dokumen')){
            foreach ($request->file('dokumen') as $filegambar) {
                $file_name = $filegambar->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $filegambar->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document= new Document();
                $pathgambar = $filegambar->storeAs('dokumen/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->posts_id = $post->id;
                $document->jenis_file = "gambar";
                $document->path_file = $pathgambar;
                $document->save();
            }
        }

        if($request->hasFile('file_lampiran')){
            foreach ($request->file('file_lampiran') as $lampiran) {
                $file_name = $lampiran->getClientOriginalName();
                $fileName = pathinfo($file_name, PATHINFO_FILENAME);
                $extension = $lampiran->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;


                $document = new Document();
                $pathlampiran = $lampiran->storeAs('lampiran/'.$year.'/'.$month.'/'.$day, $fileName, 'local');
                $document->posts_id = $post->id;
                $document->jenis_file = "lampiran";
                $document->path_file = $pathlampiran;
                $document->save();
            }
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

            Session::flash('success','Update Data Post Berhasil');
            return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $postingan = Post::findorfail($post->id);
        $postingan->delete();
        
        $post->tags()->detach();
        $post->delete();
        Document::where('posts_id', '=', $post->id)->delete();

        Session::flash('delete','Data Post Berhasil Dihapus');
        return redirect()->route('admin.post.index');
    }

    public function destroy_document($document){
      
        $dokumen = Document::findorfail(decrypt($document));
        $id = $dokumen->posts_id;
        $dokumen->delete();
 
        Session::flash('delete','Data Dokumen Berhasil Dihapus');
        return redirect()->route('admin.post.edit', $id);
     }
}
