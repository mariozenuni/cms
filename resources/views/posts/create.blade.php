@extends('layouts.app')

@section('content')

<div class="card card-default"></div>

<div class="card-header">

Add Post

</div>
<div class="card">
<div class="card-body">

<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="form-group">

        <label for="title">Title</label>

        <input type="text" class="form-control" name="title" id="tilte">

</div>
<div class="form-group">

        <label for="description">Description</label>

        <textarea name="description" id="description" cols="5" rows="5" class="form-control" ></textarea>
</div>

<div class="form-group">

        <label for="content">Content</label>
        <input id="content" type="hidden" name="content">
         <trix-editor input="content"></trix-editor>

</div>

<div class="form-group">

        <label for="published_at">Published at</label>

        <input type="text" class="form-control" name="published_at" id="published_at">

</div>


<div class="form-group">

        <label for="image">Image</label>

        <input type="file" name="image" class="form-control">
</div>

<div class="form-group">

         <button type="submit" class="btn btn-success my-3">Add Posts</button>

</div>
</form>

</div>

</div>
</div>

@endsection

@section('scripts')


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