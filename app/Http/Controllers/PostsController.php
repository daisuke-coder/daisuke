<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ValidateTestRequest;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $authUser= Auth::user()->name;
        $sPost=$request->input('sPost');
        // ↓検索フォームに入力されたら
        if(!empty($sPost)){
            $sPost=str_replace('　', ' ',$sPost);
            // ↑全角スペースを半角に変換
            $list=DB::table('posts')
            ->where('post', 'like' , '%' .$sPost. '%')
            ->get();

            if($sPost==" "){
                $list=DB::table('posts')->get();
                // ↑スペースのみの場合、全選択
            }
        }
        // ↓検索されていない状態
        else{
        $list= DB::table('posts')->get();
        }

        // return view('posts.index',['list'=>$list],['authUser'=>$authUser],['sPost'=>$sPost]);
        return view('posts.index',compact('list','authUser','sPost'));
    }

    public function createForm(Request $request)
    {
        return view('posts.createForm');
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $name = $request->input('newName');
        $errormessage="※100文字以内で入力してください";

        if(100 < mb_strlen($post)){
            return view('posts.createForm',compact('errormessage'));
        }

        else{
        DB::table('posts')->insert([
            'post'=>$post,
            'name'=>$name
        ]);
        return redirect('/index');
        }
    }

    public function username()
    {
        return 'name';
    }

    public function __construct()
    {
        $this->middleware('auth');
        $authUser= Auth::user();
    }

    public function updateForm($id)
    {
        $post= DB::table('posts')
        ->where('id',$id)
        ->first();
        return view('posts.updateForm',['post'=>$post]);
    }

    public function update(Request $request)
    {
        $id= $request->input('id');
        $up_post=$request->input('upPost');
        $errormessage="※100文字以内で入力してください";
        $post= DB::table('posts')
        ->where('id',$id)
        ->first();

        if(100 < mb_strlen($up_post)){
            return view('posts.updateForm',compact('errormessage','id','up_post','post'));
        }

        else{
        DB::table('posts')
        ->where('id',$id)
        ->update(
            ['post'=>$up_post]
        );
        return redirect('/index');
        }
    }
    public function delete($id)
    {
        DB::table('posts')
        ->where('id',$id)
        ->delete();

        return redirect('/index');
    }
}
