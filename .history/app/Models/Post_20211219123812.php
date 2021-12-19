<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable= [

            'title',
            'description',
            'content',
            'image',
            'published_at'

    ];

    public function cancel_image(){
        Storage::delete($this->image);
    }

        public function category()
        {
               return $this->belongsTo(Category::class);
        }
}
