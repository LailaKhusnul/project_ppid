<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Tag;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function dashboard(){
        $publish = Post::where('ispublish', '=', '1')
                    ->count();
        $unpublish = Post::where('ispublish', '=', '0')
                    ->count();
        $publishall = Post::all()
                    ->count();
        $categories = Kategori::all()
                    ->count();
        $users = User::all()
                    ->count();
        $tags = Tag::all()
                    ->count();
        
        $data=Post::select('id','tgl_post')
                    ->where('ispublish', '=', '1')
                    ->get()->groupBy(function($data){
            return Carbon::parse($data->tgl_post)->format('M');
        });
            
            $months=[];
            $monthCount=[];
            foreach($data as $month => $values){
                $months[]=$month;
                $monthCount[]=count($values);
            }

        $datas=Post::select('id','tgl_post')
            ->where('ispublish', '=', '1')
            ->get()->groupBy(function($datas){
                return Carbon::parse($datas->tgl_post)->format('Y');
            });
    
            $year=[];
            $yearsCount=[];
            foreach($datas as $years => $value){
                $year[]=$years;
                $yearsCount[]=count($value);
        }
    
        return view('admin.index', compact('publish', 'unpublish', 'publishall', 'categories', 'users', 'tags',  'data', 'months', 'monthCount', 
                                           'data', 'months', 'monthCount', 'datas', 'year', 'yearsCount'));
    }

    public function coba(){
        return view('admin.coba');
    }
}
