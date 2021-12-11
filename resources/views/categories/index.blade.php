@extends('layouts.app')

@section('content')



   <div class="d-flex justify-content-end my-2">
   
   <a href="{{route('categories.create')}}" class="btn btn-success float-end">Add Category</a>
   
   
   </div>
   
   <div class="card card-default">
    
    <div class="card-header">Categorie</div>

    <div class="card-body">
    
  <table class="card-table">
  
        <thead>

            <th>Name</th>

            <th></th>
        
        </thead>

        <tbody>
        
        
        @foreach($categories as $category)

        <tr>
            <td>{{$category->name}}</td>
        
        <td>
            <button class="btn btn-danger btn-sm ms-1 float-end" onclick='manegeDelete("{{$category->id}}")'>Delete</button>
            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm  ms-5 float-end">Edit</a>
            
        </td>

        </tr>
        @endforeach
          </tbody>
        </table>

<!-- Modal -->

<form action="" method="POST" id="deleteCategoryForm">

@method('DELETE')

@csrf

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Delete Category</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center text-bold">
            Are you sure you want to delete this category
        </div>
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No go back</button>
        <button type="submit" class="btn btn-danger">Yes delete</button>
      </div>
    </div>
  </div>
</div>
</form>

     </div>
    
    </div> 
@endsection


@section('script')
<script>

function manegeDelete(id){
$('#deleteModal').modal('show');
let form=document.getElementById('deleteCategoryForm');
form.action="categories/"+id;

}

</script>
@endsection
