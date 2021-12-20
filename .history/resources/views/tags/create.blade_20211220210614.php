@extends('layouts.app')

@section('content')



   
   <div class="card card-default">

  
    <div class="card-header">
    
        {{ !isset($tag) ? 'Add Tag':'Edit Tag'}} 

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
    
    <form action="{{!isset($tag) ? route('tags.store') : route('tags.update',$tag->id)}}" method="post">
   
   @if(isset($tag))
       @method('PUT')
   @endif
  
    @csrf
  
    
    <div class="form-group">
    
    <label for="name">Name</label>
    <input type="text" class="form-control" value="{{!isset($tag) ? '' : $tag->name}}" name="name">
    
    </div>
    <div class="form-group">
    
    <button class="btn btn-success mt-2 ">
    
    {{!isset($tag) ? 'Add tag':'Update tag' }}
    
    </button>
    
    </div>
    
    </div>
    
    
    
    </form>
    
    
    </div>


   
   </div>



@endsection


