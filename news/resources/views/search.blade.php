@extends('layouts.app')

@section('content')

<div class="container">
  <form action="/search" method="POST" role="search">
      {{ csrf_field() }}
      <div class="input-group">
          <input type="text" class="form-control" name="q"
              placeholder="Search news"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
          </span>
      </div>
  </form>

  <div class="container">
      @if(isset($details))
          <p> The Search results for your query <b> {{ $query }} </b> are :</p>
      <h2>News details</h2>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Date</th>
              </tr>
          </thead>
          <tbody>
              @foreach($details as $new)
              <tr>
                  {{-- <td>{{$new->title}}</td>
                  <td>{{$new->author}}</td> --}}
                  <th scope="row">{{ $new->title }}</th>
                  <td>{{ $new->author }}</td>
                  <td>{{ $new->date }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
      @elseif(isset($message))
      <p>{{ $message }}</p>
      @endif
  </div>

</div>

	{{-- @if(isset($results))
  <div class="container">
      <p>Search results for: <strong>{{ $input }}</strong></p>
      
      <table class="table table-striped">
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

@endsection