<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:30px">
        <div class="container">
  <a class="navbar-brand" href="#">E-books</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div></div>
</nav>



<!--Container-->
<div class="container">  
        <div class="text-center">
            <h1>E-Books</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repudiandae ullam impedit aliquam est. At ducimus voluptatem consectetur suscipit, assumenda laboriosam nisi animi neque veritatis distinctio modi facilis numquam labore?</p> 
        </div> 
    <div class="row">
        <!--Start include wrapper-->
        <div class="include-wrapper">
            <!--SECTION START-->
            <section class="row"> 
            @foreach($books as $book)
            <div class="col-sm-2" style="margin-bottom:10px">
            <div class="card border-0 rounded-0 text-white overflow zoom">
            <div class="ratio_right-cover-2 image-wrapper">
            <center>
                <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                    <img class="img-fluid"
                            src="{{$book->cover}}"
                            alt="Image description" style="height:230px;width:100%">
                </a>
            </center>
            </div>
            </div>
                  <!--title-->
                  <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0 text-white">{{$book->category}}</a>

                                        <!--title and description-->
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <p class=" text-white my-1">{{$book->title}}</p>
                                        </a>
                                        <h6>{{$book->price}}</h6>
                                    </div>
                                    <!--end title-->
            </div>
            @endforeach
            </section>
            <!--END SECTION-->
        </div>
    </div>  
</div>

    </body>
</html>
