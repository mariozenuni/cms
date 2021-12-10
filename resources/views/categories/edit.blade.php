@extends('layouts.app')

@section('content')


   
   <div class="card card-default">
    
    <div class="card-header">Edit Categorie</div>
    
    <div class="card-body">
    
    @if($errors->any())

        <div class="alert alert-danger">
        
        <ul class="list-group">
        
            @foreach($errors->all() as $error)

             <li class="list-group-item text-danger">{{$error}}</li> 

            @endforeach
        
        </ul>
        
        
        </div>

    @endif
    
    <form action="{{route('categories.update',$category->id)}}" method="post">
  
  @method('PUT')
  @csrf

    <div class="form-group">
    
    <label for="name">Name</label>
    <input type="text" class="form-control" value="{{$category->name}}" name="name">
    
    <div class="form-group">
    
    <button type="submit"class="btn btn-success mt-2 ">Edit Category</button>
    <a href="/categories" class="btn btn-primary mt-2">Back</a>
    </div>
    
    </div>
    
    
    
    </form>
    
    
    </div>


   
   </div>



@endsection
