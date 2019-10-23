@extends('layouts.app')

@section('content')

{{-- <style>
  .uper {
    margin-top: 40px;
  }
</style> --}}

<div class="card uper">
  <div class="card-header">
    Edit News
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form id="editNew" method="POST" action="{{ route('news.update', $new->id) }}">
      	{{ csrf_field() }}
        {{ method_field('PUT')}}

        <div class="form-group">
          <label class="col-form-label" for="new-title">Title:</label>
          <input type="text" class="form-control" name="editedtitle" value="{{ $new->title }}"></input>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="new-author">Author:</label>
          <input type="text" class="form-control" name="editedauthor" value="{{ $new->author }}"></input>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="new-date">Date:</label>
          <input type="text" class="form-control" name="editeddate" value="{{ $new->date }}"></input>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="new-content">Content:</label>
          <textarea class="form-control" rows="10" name="editedcontent">{{ $new->content }}</textarea>
        </div>
        <button type="submit" id="editModalBtn" class="btn btn-success" data-id="{{$new->id}}">Save</button>
      </form>
      <p class="mt-5"><a href="{{ route('home') }}">Back</p>  
  </div>
</div>

@endsection