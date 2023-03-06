<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Icon;
use App\Models\Document;
use App\Models\Youtube;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BaseController extends Controller
{

    public function contents_blog($year, $month, $day,$slug){
        $time =$year.'-'.$month.'-'.$day;
        $data = Post::where('slug', $slug)->where('tgl_post', '=', $time)->where('ispublish', '=', '1')->get();
        $parent = "Berita";
        $subjudul = "Detail Berita";
        $child = "";
        $root_parent = "/";
        $title = "Detail Berita";
  
        $post =  Post::where('slug', $slug)->where('tgl_post', '=', $time)->where('ispublish', '=', '1')->first();
        $galleries = Document::where('posts_id', '=', $post->id)->where('jenis_file', '=', 'gambar')->get();
        $files = Document::where('posts_id', '=', $post->id)->where('jenis_file', '=', 'lampiran')->get();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $categories = Kategori::all();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        $tags = Tag::all();

        return view('user.berita.detail', compact('files','post','galleries','subjudul','data', 'parent', 'child', 'root_parent', 'title', 'beritaterkini', 'categories', 'tags', 'logo'));
    }

    public function contents_kategori($slug){
        $data = Kategori::where('slug', $slug)->first();

        if($data != null){
            $posts = Post::where('kategori_id', '=', $data->id )->where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->paginate(3);
            $child = $data->nama_kategori;
        }else{
            $posts = [];
            $child = $slug;
           
        }

        $subjudul = "Kategori";
        $parent = $slug;
        $root_parent = "/";
        $title = "Kategori Berita";
  
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.kategori.base', compact('subjudul','categories','posts', 'parent', 'child', 'root_parent', 'title', 'beritaterkini','tags', 'logo'));
      
    }

    public function index()
    {

        // $beritapop = Post::where('ispublish', '=', '1')->where('category_id', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->first();
            
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        
        $beritapinned = Post::where('ispublish', '=', '1')->where('ispinned', '=', '1')->orderBy('tgl_post', 'DESC')->limit(3)->get();
        
        $beritakonten = Post::where('ispublish', '=', '1')->where('ispinned', '=', '0')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(6)->get();

        // icon

        $carousel = Icon::where('kategori_name', '=', 'Carousel')->orderBy('created_at', 'DESC')->limit(3)->get();
        $penghargaan = Icon::where('kategori_name', '=', 'Penghargaan')->orderBy('created_at', 'DESC')->limit(3)->get();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        $youtube = Youtube::where('ispublish', '=', '1')->orderBy('created_at', 'DESC')->limit(1)->get();
        
    return view('user.berita.index',compact('beritaterkini', 'beritapinned', 'beritakonten', 'carousel', 'penghargaan', 'carousel', 'penghargaan', 'logo', 'youtube'));
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $news = Post::where('judul','ilike','%'.$key.'%')
                 ->where('ispublish', '=', '1')
                 ->orderBy('tgl_post', 'DESC')
                 ->paginate(3);
        
        $categories = Kategori::all();
        $tags = Tag::all();
        $beritaterkini = Post::where('ispublish', '=', '1')->orderBy('tgl_post', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $logo = Icon::where('kategori_name', '=', 'Logo')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('user.berita.list',compact('news', 'categories', 'beritaterkini', 'tags', 'logo')) ;
    }

    public function jadwal_rapat() {

        $client = new Client(); //GuzzleHttp\Client

        $url = 'http://10.11.15.69:680/api/ruangrapat/jadwal'; // url api data

        try{
            $response = $client->post($url, 
                array(
                    'headers' => array(
                        'passcode' => 'k0taPendekArr'
                    )
                )
            );
        }catch(RequestException $exception){
            var_dump($exception->getResponse()->getBody()->getContents());
        }
        
        $json = $response->getBody()->getContents();
        
        $hasil = json_decode($json, true);

        $total = (count($hasil["data"]));
      
         return view('user.jadwal.rapat', [
             "data_rapat" => $hasil,
             "jumlah" => $total,
             "title" => "Jadwal Rapat Kota Madiun",
             "parent" => "jadwal_rapat"
         ]);

    }

    public function daftar_agenda() {

        $client = new Client(['verify' => false]); //GuzzleHttp\Client, verification SSL

        $url = 'https://agenda.madiunkota.go.id/api/daftarAgenda'; // url api data

        try{
            $response = $client->post($url, 
                array(
                    'headers' => array(
                        'passcode' => 'k0taPendekArr'
                    )
                )
            );
        }catch(RequestException $exception){
            var_dump($exception->getResponse()->getBody()->getContents());
        }
        
        $json = $response->getBody()->getContents();
        
        $hasil = json_decode($json, true);

        $total = (count($hasil["data"]));
      
         return view('user.jadwal.agenda', [
             "data_agenda" => $hasil,
             "jumlah" => $total,
             "title" => "Daftar Agenda Kota Madiun",
             "parent" => "daftar_agenda"
         ]);

    }

}
