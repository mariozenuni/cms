<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;


class Delete extends Model
{
   /**
    * delete post image from storage;
    *@return avoid
    */

  static public function cancel_image(Post $post)
  {
     Storage::delete($$post->image);
  }


}
