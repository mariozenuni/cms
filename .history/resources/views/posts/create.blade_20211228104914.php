@extends('layouts.app')

@section('content')

<div class="card card-default"></div>

<div class="card-header">

  {{isset($post)?'Edit Post':'Add Post'}}

</div>
<div class="card">
<div class="card-body">

<form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
   
 @csrf

 @if(isset($post))
    @method('PUT')
@endif
   

<div class="form-group">

        <label for="title">Title</label>

        <input type="text" class="form-control" name="title" id="tilte" value="{{isset($post)?$post->title:''}}">

</div>
<div class="form-group">

        <label for="description">Description</label>

        <textarea name="description" id="description" cols="5" rows="5" class="form-control" >{{isset($post)?$post->description:''}}</textarea>
</div>

<div class="form-group">

        <label for="content">Content</label>
        <input id="content" type="hidden" name="content" value="{{isset($post)?$post->content:''}}">
         <trix-editor input="content"></trix-editor>

</div>

<div class="form-group">

        <label for="published_at">Published at</label>

        <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post)?$post->published_at:''}}">

</div>


<div class="form-group">

        <label for="image" class="mt-2">Image</label>

        @if(isset($post))
                <img src="{{asset('storage/'. $post->image)}}" width="100%"  class="my-2"  alt="image">
        @endif

        <input type="file" name="image" class="form-control mt-2">
</div>

<div class="form-group">

        <label for="category">Category</label>

        <select name="category" id="category" class="form-control">
        @foreach($categories as $category)
    
        @if(isset($post))
                @if($post->category_id===$post->category->id)
                                selected
                @endif           
        
        @endif
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>


</div>

<div class="form-group">
        <lable for="tags">Tags</lable>
                <select name="tags" id="tags" class="form-control" multiple>
                        foreach($tags as $tag)

                        
                        <option value="">{{$tag->name}}</option>  

                        endforeach
                </select>
</div>

        <div class="form-group">

         <button type="submit" class="btn btn-success my-3">
         
         {{isset($post)?'Edit Post': 'Add Post'}}
         
         </button>

</div>
</form>

</div>

</div>
</div>

@endsection

@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

flatpickr('#published_at', {

        
    enableTime: true,
    dateFormat: "Y-m-d H:i",
     

});

</script>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection