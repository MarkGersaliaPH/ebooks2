@extends('layouts.frontend')
@section('content')

<h1>Cart</h1>
<br>
<table class="table table-hover table-striped table-bordered">
    <thead class="table-dark">
        <th colspan='2'>Book</th>
        <th>Quantity</th>
        <th>Price</th>
    </thead>
    <tbody> 
        @forelse($data as $data)

        <tr>
            <td style="width:30px"><img src="{{$data->book->cover}}" style="width:30px" alt=""></td>
            <td>{{$data->book->title}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->book->price}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3">
                no data found
            </td>
        </tr>
        @endforelse
        <tr></tr>
    </tbody>
</table>
@endsection