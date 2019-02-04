@extends('layouts.frontend')
@section('content')

<div class="container">  

<div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
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
                <a href="{{route('pages.books.view',$book->id)}}">
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
                                        <a href="{{route('pages.books.view',$book->id)}}">
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
@endsection