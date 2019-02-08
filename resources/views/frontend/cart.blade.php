@extends('layouts.frontend')
@section('content')

<h1>Cart</h1>
<br>
<table class="table table-hover table-striped table-bordered">
    <thead class="table-dark">
        <th colspan='3'>Book</th> 
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </thead>
    <tbody>  
        @forelse($data as $data)

        <tr>
        <td>
        <a href="{{route('cart.remove',$data->id)}}"><i class="fas fa-trash-alt text-danger"></i></a>
        </td>
            <td style="width:30px"><img src="{{$data->book->cover}}" style="width:30px" alt=""></td>
            <td>{{$data->book->title}}</td>
            <td>{{$data->quantity}}</td>
            <td  class="price">{{number_format($data->book->price)}}</td>
            <td  class="price">{{number_format($data->book->price * $data->quantity)}}</td>
        </tr>
        <?php $cart_total += $data->book->price * $data->quantity ?>
        @empty
        <tr>
            <td colspan="5">
                no data found
            </td>
        </tr>
        @endforelse
        <tr> 
        <td  class="text-right" colspan='5'>Sub total: </td>
        <td class="text-right">
        <h4 class="price">{{ number_format($cart_total) }}</h4> 
        </td>
        
        </tr>
        <tr> 
        <td  class="text-right" colspan='5'>Shipping Fee: </td>
        <td class="text-right">
        <h4  class="price">{{$shipping_fee}}</h4> 
        </td
        </tr>
        <tr> 
        <td  class="text-right" colspan='5'>Total: </td>
        <td class="text-right">
        <h4 class="price">{{ number_format($cart_total + $shipping_fee) }}</h4> 
        </td> 
        </tr>
    </tbody>
</table>
<a href="{{route('checkout')}}" class="btn btn-success">
    Checkout
</a>

<button class="btn btn-outline-success">
    Continue Shopping
</button>
@endsection