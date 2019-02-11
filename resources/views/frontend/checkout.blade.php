@extends('layouts.frontend')
@section('content') 

  <div class="row">
    <div class="col-sm-8"> 

    <h1><i class="fa fa-money"></i> Payment</h1>
    <br>
<form action="{{route('place_order')}}" method="POST">
{{csrf_field()}}
    <div class="card">
      <div class="card-header">
        Your address
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="">Select County:</label>
          <select id="country" required name="country" class='form-control js-example-basic-single'><option  value="{{isset(Auth::user()->address->country) }}" selected>{{isset(Auth::user()->address->country) ? Auth::user()->address->country : '--- country ---' }}</option></select>
        </div>
        <div class="form-group">
          <label for="">Select Region:</label>
          <select id="region" required name="region" class='form-control'><option value="{{isset(Auth::user()->address->region)  }}" >{{isset(Auth::user()->address->region) ? Auth::user()->address->region : '--- region ---' }}</option></select>
        </div>


        <div class="form-group">
          <label for="">Select City:</label>
      <select id="city" required name="city"  class='form-control'> 
      <option value="{{isset(Auth::user()->address->city)}} " >{{isset(Auth::user()->address->city) ? Auth::user()->address->city : '--- city ---'}}</option>
      
      </select>
      <br>
      <input type="text"  id="other_city"  placeholder="Enter city" class='form-control' style="display:none">
        </div>   


        <div class="form-group">
        <label for="">House number / Building number:</label>
        <input type="text" value="{{Auth::user()->address->house_number}}" required name="house_number" class="form-control" placeholder="House no. Street no.">
      </div>

      <div class="form-group">
        <label for="">Street:</label>
        <input type="text" value="{{Auth::user()->address->street}}"  required name="street" class="form-control" placeholder="Enter Street">
      </div>

      <div class="form-group"  id="barangay" style="display:none">
        <label for="">Barangay:</label>
        <input type="text" required value="{{Auth::user()->address->barangay}}"   name="barangay"  class="form-control" placeholder="Barangay">
      </div>
      <div class="form-group">
        <label for="">Zip/Postal Code:</label>
        <input type="text"  name="zip" value="{{Auth::user()->address->zip}}"   class="form-control" placeholder="Zip Code">
      </div>

      </div>
    </div>

<Br>
    <div class="card">
    <div class="card-header">
      Preffered Payment Method
    </div>
    <div class="card-body">
    <div class="form-group">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" required value="visa" name="payment_method" class="custom-control-input" checked="">
      <label class="custom-control-label" for="customRadio1"> <img src="https://cdn0.iconfinder.com/data/icons/flat-design-business-set-3/24/payment-method-visa-512.png" class="img img-sm" alt="">
   </label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" required value="paypal"  name="payment_method" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2"><img src="https://www.freeiconspng.com/uploads/paypal-icon-8.png" class="img img-sm" alt=""></label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio3" required value="cod"  name="payment_method" class="custom-control-input">
      <label class="custom-control-label" for="customRadio3">Cash on Delivery (COD)</label>
    </div>
  </div>
    </div>
    
    </div>
    
    
<Br>

<div class="card"> 
    <div class="card-body">
     <button class="btn btn-success btn-lg" type="submit">Place order</button>
    </div>
</div>
</div>
    
</form>

    <div class="col-sm-4">
    <div class="card"> 
      <div class="card-header">
        Payment summary
      </div>
        <table class="table table-sm table-bordered" style="margin:0">
        <thead>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
        </thead>
        @foreach($data as $cart)
          <tr> 
            <td style="width:40px" ><img src="{{$cart->book->cover}}" class="img img-fluid" alt=""></td>
            <td>{{$cart->quantity}}</td>
            <td ><span class="price">{{$cart->book->price}}</span></td>
          </tr>
          @endforeach
        </table>
      <div class="card-footer text-right">
        Sub total : <span class="price">{{$total}}</span><br>
        Shipping fee: {{$shipping_fee}}<br>
        Total: {{$total + $shipping_fee}}
      </div>
    </div>
    </div>
  </div>

  <script>
  
  $(document).ready(function() { 

    
    $('#country').on("change",function(){ 
        var selected = $(this).val(); 
        if(selected == 'ph'){
          $('#barangay').show();
        }else{
          
          $('#barangay').hide();
        }
    })
    
    $('#city').on("change",function(){ 
        var selected = $(this).val();
        if(selected == 'other'){
          $('#other_city').show();
          $('#other_city').attr('required',true);
          $('#other_city').attr('name','city');
        }else{
          
          $('#other_city').hide();
          $('#other_city').attr('required',false);
          $('#other_city').attr('name','');
        }
    })
});
  </script>
@endsection