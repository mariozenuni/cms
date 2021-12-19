<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Delete extends Model
{
   

  public function cancel()
  {
      Storage::delete($post->img)
  }


}
