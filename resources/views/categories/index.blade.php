@extends('layouts.app')

@section('content')



   <div class="d-flex justify-content-end my-2">
   
   <a href="{{route('categories.create')}}" class="btn btn-success float-end">Add Category</a>
   
   
   </div>
   
   <div class="card card-default">
    
    <div class="card-header">Categorie</div>

    <div class="card-body">
    
  <table class="crad-table">
  
        <thead>

            <th>Name</th>
        
        </thead>

        <tbody>
        
        
        @foreach($categories as $category)

            <tr>
            
                <td>{{$category->name}}</td>
            
            </tr>
            


         

        @endforeach
        </tbody>
  
  </table>
    </div>
    
    </div>

   
   </div>



@endsection


