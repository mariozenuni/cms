@extends('layouts.app')

@section('content')

<div class="card card-default">

    <div class="card card-header">Category</div>

    <div class="card-body">{{$category->name}}
    <a href="{{route('categories.index')}}" class="btn btn-primary  btn-sm ms-2 float-end">Back</a>
    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm  ms-2 float-end">Edit</a>
  
    </div>

            

</div>

@endsection