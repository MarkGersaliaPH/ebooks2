@extends('layouts/cms')
@section('content')
<div class="margin-bottom">
<div class="form-group"> <h1><strong class="text-muted">Order for book: </strong> {{$book->title}}</h1> 
</div> 

<table class="table table-bordered table-hover">
    <thead>
        <th>Customer</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Ordered on</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
            <td>{{$order->customer->name}}</td> 
            <td>{{$order->quantity}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                <button  data-toggle="modal" data-target="#exampleModal" onclick="showModal({{$order->id}})" class="btn btn-info">Details</button>
            </td>
            </tr> 
        @endforeach
    </tbody>
</table>









<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-m1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header    bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Book Archives</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <div class="modal-body">  
          <h1 id="customer-name"></h1>
          <div class="form-group">
          Order status : <div id="status" class="badge badge-warning"></div>
          </div>
          <div class="card bg-dark text-white">
              <div class="card-header">Delivery Address</div>
              <div class="card-body">

              <h2 id="address"></h2>
              </div>
          </div>

          <br>
          <div class="card">
              <div class="card-header">Order Summary</div> 

              <div id="order-summary"></div> 
          </div>
      </div> 
    </div> 
  </div>
</div>


<script> 
        function showModal(id){
            $.ajax({
                method:"GET",
                url:"/api/order/view/" + id,
                success:function(response){ 
                    
                    console.log(response)
                    $("#customer-name").html(response.customer.name)
                    $("#status").html(response.order.status)
                    $('#address').html( 
                        response.customer.address.house_number + ", " +
                        response.customer.address.street + ", " + 
                        response.customer.address.city + ", " +
                        response.customer.address.region + " " + "<br>" +
                        "Zip code:" +
                        response.customer.address.zip
                        )

                        var total =  parseInt(response.order.quantity * response.book.price);
                    var shipping_fee =  parseInt(50);

                    $('#order-summary').html(
                        "<table class='table table-bordered' style='margin:0'>" +
                            "<thead>" +
                                "<th>Book</th>" +
                                "<th>Price</th>" +
                                "<th>Quantity</th>" +
                                "<th>Total</th>" +
                            "</thead>" +
                            "<tbody>" +
                            "<tr>" +
                            "<td>" +
                            response.book.title +
                            "</td>" +
                            "<td>" +
                            response.book.price +
                            "</td>" + 
                            "<td>" +
                            response.order.quantity +
                            "</td>" + 
                            "<td>" +
                            total +
                            "</td>" + 
                            "</tr>" +
                            "<tr>" + 
                            "<td colspan='3'>" +
                            "Sub Total:" +
                            "</td>" +
                            "<td>" + 
                            total +
                            "</td>" +
                            "</tr>" +
                            "<tr>" + 
                            "<td colspan='3'>" +
                            "Shipping Fee:" +
                            "</td>" +
                            "<td>" + 
                            shipping_fee +
                            "</td>" +
                            "</tr>" +
                            "<tr>" + 
                            "<td colspan='3'>" +
                            "Total:" +
                            "</td>" +
                            "<td>" +  
                            (total + shipping_fee )+ 
                            "</td>" +
                            "</tr>" +
                            "<tr>" + 
                            "<td colspan='3'>" +
                            "Payment method:" +
                            "</td>" +
                            "<td>" +  
                            response.order.payment_method+ 
                            "</td>" +
                            "</tr>" +
                            
                            "</tbody>" +
                        "</table>"
                    )
                }
            })
        } 
</script>



@endsection