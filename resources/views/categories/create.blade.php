@extends('layouts.app')

@section('content')


   
   <div class="card card-default">
    
    <div class="card-header">Create Categorie</div>
    
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
    
    <form action="{{route('categories.store')}}" method="post">
    @csrf
    
    <div class="form-group">
    
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name">
    
    <div class="form-group">
    
    <button class="btn btn-success mt-2 ">Add Category</button>
    
    </div>
    
    </div>
    
    
    
    </form>
    
    
    </div>


   
   </div>



@endsection


