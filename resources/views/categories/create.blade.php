@extends('layouts.app')

@section('content')



   
   <div class="card card-default">

  
    <div class="card-header">
    
        {{ !isset($category) ? 'Add Category':'Edit Category'}} 

    </div>
    
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
    
    <form action="{{!isset($category) ? route('categories.store') : route('categories.update',$category->id)}}" method="post">
   
   @if(isset($category))
       @method('PUT')
   @endif
  
    @csrf
  
    
    <div class="form-group">
    
    <label for="name">Name</label>
    <input type="text" class="form-control" value="{{!isset($category) ? '' : $category->name}}" name="name">
    
    <div class="form-group">
    
    <button class="btn btn-success mt-2 ">
    
    {{!isset($category) ? 'Add Category':'Update Category' }}
    
    </button>
    
    </div>
    
    </div>
    
    
    
    </form>
    
    
    </div>


   
   </div>



@endsection


