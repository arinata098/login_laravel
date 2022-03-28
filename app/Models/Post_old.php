<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Bagoes Arinata",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, eaque laborum quibusdam vel ad sapiente quo rerum temporibus eius adipisci possimus ex hic vitae mollitia, itaque quaerat? Ab illum vel aperiam repudiandae eius odit cupiditate aspernatur nobis dolor exercitationem quod animi corporis, ratione quia dolore? Facilis officia qui corrupti quod?",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Toyota Honda",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, eaque laborum quibusdam vel ad sapiente quo rerum temporibus eius adipisci possimus ex hic vitae mollitia, itaque quaerat? Ab illum vel aperiam repudiandae eius odit cupiditate aspernatur nobis dolor exercitationem quod animi corporis, ratione quia dolore? Facilis officia qui corrupti quod?",
        ],
    ];

    public static function all()
    {
        // menggunakan fungsi collection (pembungkus untuk sebuah array (biar lebih sakti))
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // ambil data dari fungsi all / bisa juga menggunakan collection spt contoh dibawah
        $posts = static::all();
        // $posts = collect(self::$blog_posts); 

        // cara baru untuk mencari id tanpa looping
        return $posts->firstWhere('slug', $slug);

        // cara lama menggunakan loop
        // $find_post = [];
        // foreach ($posts as $post) {
        //     if ($post["slug"] === $slug) {
        //         $find_post = $post;
        //     }
        // }
        // return $find_post;

    }
}
