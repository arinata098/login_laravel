<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // ini field yg boleh diisi (pake filable)
    // protected $fillable = ['title', 'excerpt', 'body'];

    // ini field yg ga boleh diisi (pake guard)
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters){
        // if(request('search')) {
        // //select * from post desc where title like % (yg di cari) %
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //             ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        //$filters[search] masuk ke $searhc dan $query masuk ke $query
        $query->when($filters['search'] ?? false, function($query, $search) {
            //select * from post desc where title like % (yg di cari) %
            return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
        });

        //callback version
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    public function category()
    {
        // satu post memiliki 1 category
        return $this->belongsTo(Category::class);
    }
    
    // public function author()
    // {
    //     // satu post memiliki 1 category
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
