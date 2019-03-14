@extends('layouts.uikit')
@section('content')
<div class="margin-bottom">  
<button class="btn btn-danger " data-toggle="modal" data-target="#archivesModal"><i class="fa fa-archive"></i> Book archived</button>
<button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add</button>
</div>  
<div class="box">
<table class="table table-bordered table-hover table-sm">
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
                <td><a href="{{route('books.delete',$book->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
        @empty
            <tr>
                <td colspan='4'>No data found</td>
            </tr>
        @endforelse
    </tbody>
</table> 
</div>






<!-- Modal -->
<div class="modal right fade" id="exampleModal" tabindex="-m1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header    bg-primary text-white">
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



<!-- Modal -->
<div class="modal right fade" id="archivesModal" tabindex="-m1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="exampleModalLabel">Book Archives</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-sm table-striped">
      <thead>
        <th colspan="2">Book</th>
        <th>Deleted on</th>
        <th></th>
      </thead>
      <tbody> 
      @foreach($books_archive as $archive)
      <tr>
      <td>
      
      <img src="{!! $archive->cover !!}" alt="" style="width:30px">
      </td>
      <td>
        {{$archive->title}}
      </td>
      <td>
        {{$archive->deleted_at}}
      </td>
      <td>
        <a href="{{route('books.restore',$archive->id)}}" class="btn btn-outline btn-success ">
        <i class="fas fa-sync-alt"></i> Restore
        </a>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
      </div> 
    </div> 
  </div>
</div>
@endsection