<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;


class Delete extends Model
{
   

  public function cancel(Post $post)
  {
      return Storage::delete($post->image);
  }


}
