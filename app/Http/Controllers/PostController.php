<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;




class PostController extends Controller
{
    public function index()
    {
        // cara menangkap request by name 
        // dd(request('search'));

        //untuk mencari category bila ada dan ditaruh di title
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('posts', [
            "title" => "All Post" . $title,
            "active" => 'posts',
            //untuk semu postingan pake all untuk yg trakhir pake latest
            // "posts" => Post::all()
            //menggunakan with untuk eager loading biar querisnya ga banyak pas di loop anjay
            // "posts" => Post::with(['user', 'category'])->latest()->get() || with sudah di tambahkan ke model dengan protected jadi tidak perlu lagi
            //latest(descending) filter(fungsi dari model scopedFilter)

            //menampilkan seluruh post
            // "posts" => Post::latest()->Filter(request(['search', 'category', 'author']))->get()
            //menampilkan seluruh post dengan pagination
            // "posts" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(7)
            //menampilkan seluruh post dengan pagination dengan querynya langsung soakweoawkoea GG
            "posts" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            // "post" => Post::find($post) old
            "post" => $post
        ]);
    }

    public function aboutme()
    {
        return view('about', [
            "title" => "About",
            "active" => "about",
            "name" => "Bagus Arinata",
            "email" => "arinata@gmail.com",
        ]);
    }
}
