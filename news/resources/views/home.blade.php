@extends('layouts.app')

@section('content')
<div class="container">

  {{-- @if(isset($results))
  <div class="container"> --}}
     {{--  <p>Search results for: <strong>{{ $input }}</strong></p> --}}
     {{--  <p>Search results for: <strong>{{ $input ?? '' }}</strong></p> --}}
      {{-- <p>Search results: </p> --}}
      {{-- <table class="table table-striped">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Author</th>
              </tr>
          </thead>
          <tbody>
            
              @foreach($results as $result)
              <tr>
                  <td>{{$new->title}}</td>
                  <td>{{$new->author}}</td>
              </tr>
              @endforeach
            
          </tbody>
      </table>
  </div>
  @endif --}}

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

                {{-- <button class="btn btn-warning mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
 --}}
                <button class="btn btn-warning mb-2" onclick="window.location='{{ url("/createnew") }}'">Add New</button>

                <button class="btn btn-secondary mb-2" onclick="window.location='{{ url("/search") }}'">Search</button>

                {{-- <button class="btn btn-primary mb-2" onclick="window.location='{{ url("/createnew") }}'">Test create new</button> --}}

                {{-- <form action="/search" method="GET" role="search">
                  {{ csrf_field() }}
                  <div class="input-group">
                      <input type="text" class="form-control" id="search" name="search" placeholder="Search news"></input> 
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                  </div>
                </form> --}}

                {{-- <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search news"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form> --}}

                {{-- <div class="container">
                    @if(isset($news))
                        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>News details</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <td>{{$new->title}}</td>
                                <td>{{$new->author}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div> --}}

                {{-- <form action="/search" method="POST" role="search">
                  {{ csrf_field() }}
                  <div class="input-group">
                      <input type="text" class="form-control" id="search" name="search" placeholder="Search news"></input> 
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                  </div>
                </form> --}}

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

                @foreach($news as $new)

                <tr>
                  <th scope="row">{{ $new->title }}</th>
                  <td>{{ $new->author }}</td>
                  <td>{{ $new->date }}</td>
                  <td>{{ $new->created_at }}</td>
                  <td>{{ $new->content }}</td>
                  <td>{{ $new->image }}</td>
                  <td>

                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="openEditModal({{ $new->id }})"><i class="fa fa-edit"></i></button> --}}

                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="window.location='{{ url("/editnew/{id}") }}'"><i class="fa fa-edit"></i></button> --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="window.location='{{ route('news.edit', $new->id) }}'"><i class="fa fa-edit"></i></button>
                    <form action="{{ route('news.destroy', $new->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      {{-- <button type="button" class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i></button> --}}
                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-alt"></i></button>
                    </form>
                    
                    {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="openDeleteModal({{ $new->id }})"><i class="fa fa-trash-alt"></i></button> --}}

                    {{-- <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form> --}}

                  </td>
                </tr>

                @endforeach

              </tbody>
            </table>
        </div>
      </div>
  </div>

  {{-- <div class="container">
      <p>Search results for: <strong>{{ $query }}</strong></p>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Author</th>
              </tr>
          </thead>
          <tbody>
            @if(isset($new))
              @foreach($new as $news)
              <tr>
                  <td>{{$new->title}}</td>
                  <td>{{$new->author}}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
      </table>
  </div> --}}

</div>

    {{-- @foreach($news as $new) --}}

  {{-- @foreach($news as $new) --}}
{{-- Delete/Remove Modal --}}
{{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="delNews" action="/deleteNew/{{$new->id}}" method="POST" enctype="multipart/form-data">  
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <span id="Newsdel">Do you want to remove this news? This cannot be undone</span>
                <button type="submit" id="deleteModalBtn" class="btn btn-danger" data-id="{{ $new->id }}">Delete</button>  
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </div>  
</div>  --}}
    {{-- @endforeach --}}

    {{-- @foreach($news as $new) --}}
{{-- Edit/Update Modal --}}
{{-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="editNew" method="POST" action="/editNew/{{$new->id}}">  
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <span id="Newsedit">Update Content of News</span>
                <div class="form-group">
                  <label class="col-form-label" for="new-title">Title:</label>
                  <input type="text" class="form-control" name="editedtitle"></input>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="new-author">Author:</label>
                  <input type="text" class="form-control" name="editedauthor"></input>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="new-date">Date:</label>
                  <input type="text" class="form-control" name="editeddate"></input>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="new-content">Content:</label>
                  <textarea class="form-control" rows="10" name="editedcontent"></textarea>
                </div>
                <button type="submit" id="editModalBtn" class="btn btn-success" data-id="{{$new->id}}">Save</button>  
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </div>  
</div>  --}}
    {{-- @endforeach --}}

    {{-- @foreach($news as $new) --}}
{{-- Create/Add Modal --}}
{{-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addNews" method="POST" action="/createnew" enctype="multipart/form-data">
              {{ csrf_field() }}
              <span id="Newsadd">Set Content of News</span>
              <div class="form-group">
                <label for="news-title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="news-title" name="title">
              </div>
              <div class="form-group">
                <label for="news-author" class="col-form-label">Author:</label>
                <input type="text" class="form-control" id="news-author" name="author">
              </div>
              <div class="form-group">
                <label for="news-date" class="col-form-label">Date:</label>
                <input type="text" class="form-control" id="news-date" name="date">
              </div>
              <div class="form-group">
                <label for="news-content" class="col-form-label">Content:</label>
                <textarea class="form-control" id="news-content" name="content" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="news-image">Featured Image:</label>
                <input type="file" class="form-control-file" id="news-image" name="image">
              </div>
              <button type="submit" id="addModalBtn" class="btn btn-success">Save</button> 
              <input type="hidden" value="{{ Session::token() }}" name="_token"> 
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
    </div>  
</div>  --}}
   {{--  @endforeach --}}

    {{-- @endforeach --}}

@endsection
