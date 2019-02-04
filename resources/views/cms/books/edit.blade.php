@extends('layouts/cms')
@section('content')
 <div class="page-heading">
 <h1>View {{$book->title}}</h1>
 Posted on: {{$book->created_at->diffForHumans()}}<br>
 Last updated: {{$book->updated_at->diffForHumans()}}<br>
 

 <div class="form-group">
<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal">Preview</button> 
</div>
 </div>
<form action="{{route('books.update')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$book->id}}">
        {{csrf_field()}}
            <div class="form-group">
                <strong>File</strong>
                <input type="text" name="file" value="{{$book->file or ''}}" class="form-control form-control-lg">   
            </div>
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" value="{{$book->title or ''}}" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <strong>Price</strong>
                <input type="text" name="price" value="{{$book->price or ''}}" class="form-control form-control-lg">
            </div>
            <div class="form-group">
            <img src="{!! $book->cover !!}" alt="" style="width:80px">
            </div>
            <div class="form-group">
                <strong>Cover</strong><br>
                <input type="text" name="cover" value="{{$book->cover or ''}}" placeholder="Enter image url here" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <strong>Author</strong>
                <input type="text" name="author" value="{{$book->author or ''}}" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <strong>Category</strong>
                <input type="text" name="category" value="{{$book->category or ''}}" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <strong>Description</strong>
                <textarea name="description" class="form-control form-control-lg" id="" cols="30" rows="10"> {{$book->description or ''}}</textarea>
            </div> 
            
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button> 
    
    </form>


 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">  
      
      <div class="holds-the-iframe"> 
      <iframe src="{{$book->file or ''}}" style="height: 800px;width:100%;" frameborder="0"></iframe>
        </div>
      </div> 
    </div>
  </div>
</div>

@endsection