@extends('layouts/cms')
@section('content')
<div class="margin-bottom">
<div class="row">
<div class="col-sm-9"><h1>Books</h1></div>
<div class="col-sm-3">
<button class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Add</button></div>
</div>
</div> 
<table class="table table-bordered table-hover">
    <thead class="bg-light">
    <th>#</th>
        <th colspan="2">Title</th>
        <th>Price</th>
        <th>Author</th>
        <th>Category</th>
        <th>Created at</th>
        <th>Action</th>
    </thead>
    <tbody> 
        @forelse($books as $key=> $book)
        
        <tr>
        <td>{{$key + 1}}</td>
                <td>
                <img src="{!! $book->cover !!}" alt="" style="width:30px">
                </td>
                <td><a href="{{route('books.edit',$book->id)}}">{{$book->title}}</a></td>
                <td>{{$book->price}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->category}}</td>
                <td>{{$book->created_at}}</td>
                <td><a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">x</a></td>
            </tr>
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