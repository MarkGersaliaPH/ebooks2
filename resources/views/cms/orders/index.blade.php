@extends('layouts/cms')
@section('content')
<div class="margin-bottom">
<div class="form-group"> <h1>Orders</h1> 
</div> 
<table class="table table-bordered table-sm table-hover">
    <thead class="bg-light">
    <th>#</th>
        <th colspan="2">Title</th>
        <th>Price</th> 
        <th>Orders</th> 
    </thead>
    <tbody>  
        @forelse($orders as $key=> $order)
        
        <tr>
        <td>{{$key + 1}}</td> 
        <td>
                <img src="{!! $order->cover !!}" alt="" style="width:30px"></td>
                <td><a href="{{route('order.book',$order->id)}}">{{$order->title}}</a></td> 
                <td>{{$order->price}}</td> 
                <td>{{App\Order::countOrder($order->id)}}</td> 
        @empty
            <tr>
                <td colspan='4'>No data found</td>
            </tr>
        @endforelse
    </tbody>
</table> 







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-m1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('books.add')}}" method="post"  enctype="multipart/form-data"  >
        {{csrf_field()}}
            <div class="form-group">
                <strong>File</strong>
                <input type="text" name="file" class="form-control">
            </div>
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <strong>Price</strong>
                <input type="text" name="price"  class="form-control">
            </div>
            <div class="form-group">
                <strong>Cover</strong><br>
                <input type="text" name="cover" placeholder="Enter image url here" class="form-control">
            </div>
            <div class="form-group">
                <strong>Author</strong>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
                <strong>Category</strong>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <strong>Description</strong>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    
    </form>
  </div>
</div>
@endsection