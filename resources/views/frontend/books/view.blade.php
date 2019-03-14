@extends('layouts.frontend')
@section('content')
@include('includes.breadcrumb')
{{-- <button onclick="testalert()"></button> --}}
<script>
    function testalert(){
    new PNotify({
        title: 'Success!',
        text: 'That thing that you were trying to do worked.',
        type: 'success'
    });
    }
</script>
<div class="row">
    <div class="col-sm-3"    >
        <div class="form-group overflow zoom">
    <img src="{{$book->cover}}" alt="" class="img img-fluid ">
  
    </div>
    Author:<br>
    <h4>{{$book->author}}</h4> 
    <br> 
    <div class="card border-secondary mb-3" style="max-width: 20rem;">
  <div class="card-header">Buy this book</div>
  <div class="card-body">
    <form action="{{route('carts.add')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="item_id" value="{{$book->id}}">
        <input type="hidden" name="customer_id" value="{{Auth::id()}}">
        <div class="form-group">
            <label for="">Select quantity</label>
            <select name="quantity" id="" required class="form-control" >
                <option value="" default hidden>-- Select quantity --</option>
                @for($i = 1;$i <= 10;$i ++)
                <option>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Add to cart</button>
        </div>
    </form>
    </div>
</div>
    </div>

    <div class="col-sm-9">
    <h2>{{$book->title}}</h2>
    <h4>Price: {{$book->price}}</h4>
   
    <div class="form-group">
    @if(!App\ItemFavorite::isAlreadyAddedToFavorite($book->id) ) 
    <a href="{{route('favorites.add',$book->id)}}"  class="text-danger" data-toggle="tooltip" data-placement="top" title="Add on favorites"><i class="fa fa-heart"></i></a> 

    @else  
    <a   class="btn text-danger disabled" data-toggle="tooltip" data-placement="top" title="Add on favorites"><i class="fa fa-heart"></i></a> 
    @endif
    </div>
 
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link show active" data-toggle="tab" href="#home"><i class="fas fa-clipboard-list"></i> Description</a>
  </li>
  <li class="nav-item">
    <a class="nav-link show" data-toggle="tab" href="#profile"><i class="fa fa-comments"></i> Ratings and Reviews</a>
  </li> 
</ul>
<div id="myTabContent" class="tab-content">
    <br>
  <div class="tab-pane fade active show" id="home">
   
  {!! $book->description !!}
  </div>
  <div class="tab-pane fade" id="profile">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div> 
</div>
    </div>
</div>

@endsection