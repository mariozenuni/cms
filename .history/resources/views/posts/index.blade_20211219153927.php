
@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end my-2">
   
           <a href="{{route('posts.create')}}" class="btn btn-success float-end">Add Post</a>
     </div>


     <div class="card card-default">
    
    <div class="card-header">Post</div>


    <div class="card-body">
    @if($posts->count()>0)
          <table class="table">

            <thead>
            
              <th>Image</th>
              <th>Title</th>
              <th>Category</th>
              <th></th>
              <th></th>
            
            </thead>

            <tbody>
            
                @foreach($posts as $post)

                    <tr>
                        <td>
                       <img src="{{asset('storage/'. $post->image)}}" width="50px" alt=""> 
                       
                        
                        </td>

                        <td>
                       {{$post->title}}
                        
                        </td>
                        <td>
                         <a href="{{route('posts.edit',$post->id)}}">{{$post->category->name}}</a>
                        
                        </td>
                       
                        @if(!$post->trashed())
                        <td>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                            @else 
                            <td>
                            <form action="{{route('restore-post',$post->id)}}" method="post"> 
                             @method('PUT')
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>
                            </td>
                          @endif
                       
                        <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        
                        <button type="submit" class="btn btn-danger btn-sm">
                        
                               {{$post->trashed()?'Delete':'Trash'}}
                        
                        </button>
                        
                        </form>
                      
                          
                        </td>
                    </tr>

                @endforeach
            
            </tbody>
          
          
          </table>
      @else 
        No post available     
     @endif     
    </div>

</div>

@endsection


