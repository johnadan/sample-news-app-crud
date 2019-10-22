<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=1">

        <title>News Public</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
               /* align-items: center;*/
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            /*img {
              height: 50vh;
              width: 50vw;  
            }*/

            .card-img-top {
              width: 50%;
              height: 70%;
              object-fit: cover;
            }

        </style>
    </head>
    <body>
    
        <div class="flex-center position-ref full-height px-2">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-10 col-md-10">
                        <div class="content">
                            <div class="title">
                                News Public
                            </div>
                        </div>

                       @foreach($news as $new)

                        <div class="card-deck">
                          <div class="card my-5">
                            <img src="<?php echo asset("storage/$new->image")?>" class="card-img-top" alt="news image">
                            <div class="card-body py-5 px-5">
                              {{-- <h5 class="card-title">Title</h5> --}}
                              <h5 class="card-title"><strong>{{ $new->title }}</strong></h5>
                              {{-- <h6>Author</h6> --}}
                              <h6>by {{ $new->author }}</h6>
                              {{-- <p class="card-text">Content. <a href="">Learn more..</a></p> --}}
                              {{-- <p class="card-text">{{ $new->content }} <a href="{{ url('/news/{id}') }}">See more..</a></p> --}}

                              {{-- <p class="card-text">{{ $new->content }} <a href="{{ route('news.show', $new->id) }}">See more..</a></p> --}}
                              <p class="card-text"><a href="{{ route('news.show', $new->id) }}">See full article..</a></p>
                            </div>
                            <div class="card-footer">
                              {{-- <small class="text-muted">Date</small> --}}
                              <small class="text-muted">Posted on {{ $new->date }}</small>
                            </div>
                          </div>
                        </div>  
                         @endforeach
                    </div>     
                </div>
            </div> 
        </div>
    </body>
</html>
