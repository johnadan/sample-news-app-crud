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

                <button class="btn btn-warning mb-2" onclick="window.location='{{ url("/createnew") }}'">Add New</button>

                <button class="btn btn-secondary mb-2" onclick="window.location='{{ url("/search") }}'">Search</button>

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

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="window.location='{{ route('news.edit', $new->id) }}'"><i class="fa fa-edit"></i></button>
                    <form action="{{ route('news.destroy', $new->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      
                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-alt"></i></button>
                    </form>
                    
                  </td>
                </tr>

                @endforeach

              </tbody>
            </table>
        </div>
      </div>
  </div>

</div>

@endsection
