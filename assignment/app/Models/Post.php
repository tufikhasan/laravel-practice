<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function category() {
        return $this->belongsTo( Category::class );
    }
    static function categoryWisePostCount( $categoryId ) {
        return self::where( 'category_id', $categoryId )->count();
    }

    public static function softDeletedPosts() {
        return self::onlyTrashed()->get();
    }
}
