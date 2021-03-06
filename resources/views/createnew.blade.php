@extends('layouts.app')

@section('content')

<div class="card uper">
  <div class="card-header">
    Set Content of News
  </div>
  <div class="card-body">
    <!-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif -->

    <!-- @if (session('status'))
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
    @endif -->

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
      </div>
      <img src="images/{{ Session::get('image') }}">
    @endif

  

    @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

      <form id="addNews" method="POST" enctype="multipart/form-data" action="{{ route('news.store') }}">
          {{ csrf_field() }}
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
              <!-- <input type="text" class="form-control" id="news-date" name="date"> -->
              <div class="col-10">
                <input class="form-control" type="date" id="news-date" name="date">
              </div>
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
      <p class="mt-5"><a href="{{ route('home') }}">Back</p>
  </div>
</div>

@endsection