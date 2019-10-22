@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-10 col-md-10">
            <div class="content">
                <div class="title">
                    News Public
                </div>
            </div>

           {{-- @foreach($news as $new) --}}

            <div class="card-deck">
              <div class="card my-5">
                <img src="<?php echo asset("storage/$new->image")?>" class="card-img-top" alt="news image">
                <div class="card-body py-5 px-5">
                  {{-- <h5 class="card-title">Title</h5> --}}
                  <h5 class="card-title"><strong>{{ $new->title }}</strong></h5>
                  {{-- <h6>Author</h6> --}}
                  <h6>by {{ $new->author }}</h6>
                  {{-- <p class="card-text">Content. <a href="">Learn more..</a></p> --}}
                  <p class="card-text">{{ $new->content }} 
                </div>
                <div class="card-footer">
                  {{-- <small class="text-muted">Date</small> --}}
                  <small class="text-muted">Posted on {{ $new->date }}</small>
                </div>
              </div>
            </div>  
             {{-- @endforeach --}}
        </div>     
    </div>
</div> 


{{-- <h5><strong>{{ $new->title }}</strong></h5>


<h6>by {{ $new->author }}</h6>

<p>{{ $new->content }} 

<p>Posted on {{ $new->date }}</p>	

<hr> --}}

<a href="{{ url('/') }}" class="btn btn-info ml-5">Back to all news</a>
{{-- <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a> --}}

{{-- <div class="pull-right">
    <a href="#" class="btn btn-danger">Delete this task</a>
</div> --}}

@endsection