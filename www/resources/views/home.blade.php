@extends('layouts.app')

@section('content')
<div class="container">

   @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    @endif

  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">CMS News</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                  <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                          <p>{{ $error }}</p>
                      @endforeach
                  </div>
                @endif

                <button class="btn btn-warning mb-2" onclick="window.location='{{ url("/createnew") }}'"><img src=https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/plus.svg width="32" height="32" alt="">Add New</button>

                <button class="btn btn-secondary mb-2" onclick="window.location='{{ url("/search") }}'"><img src=https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/search.svg width="32" height="32" alt="">Search</button>

            </div>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Date</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Content</th>
                  <th scope="col">Image</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($news))
                  @foreach($news as $new)

                <tr>
                  <th scope="row">{{ $new->title }}</th>
                  <td>{{ $new->author }}</td>
                  <td>{{ $new->date }}</td>
                  <td>{{ $new->created_at }}</td>
                  <td>{{ $new->content }}</td>
                  <td>
                  <!-- {{ $new->image }} -->
                  <img src="<?php echo asset("storage/$new->image")?>" class="card-img-top" alt="news image">
                  </td>
                  <td>

                    <!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#editModal" onclick="window.location='{{ route('news.edit', $new->id) }}'"><i class="fa fa-edit"> Edit </i></button> -->

                    <div class="mb-2">
                        <a href="#" class="btn btn-primary" data-target="#editModal" data-toggle="modal" onclick="window.location='{{ route('news.edit', $new->id) }}'"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    
                    <!-- <i class="fa fa-trash-alt"></i> -->

                    <!-- <button class="btn btn-danger" type="submit">
                      <a href="#" class="card-link" onclick="openDeleteModal({{ $new->id }})"><i class="fa fa-trash"></i> Delete</a>
                    </button> -->

                    <div>
                      <a href="#" class="btn btn-danger" data-toggle="modal" onclick="openDeleteModal({{ $new->id }})"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                    
                    {{-- <form action="{{ route('news.destroy', $new->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-alt"></i></button>
                    </form> --}}
                    
                  </td>
                </tr>

                  @endforeach

                @else
                <p>No records found</p>    
                @endif

              </tbody>
            </table>
        </div>
      </div>
  </div>

</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="delNews" action="/deleteNews/{{$new->id}}" method="POST" enctype="multipart/form-data"> 
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <span id="Newsdel">Do you want to delete this news? This cannot be undone</span>
                  <button type="submit" id="deleteModalBtn" class="btn btn-danger" data-id="{{ $new->id }}">Delete</button>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>  
</div>

<script type="text/javascript">
  function openDeleteModal(id){
      $("#delNews").attr("action", "/deleteNews/"+id) ;
      $("#Newsdel").html('Do you want to delete this news? This cannot be undone');
      $("#deleteModal").modal("show");
    }
</script>

@endsection
