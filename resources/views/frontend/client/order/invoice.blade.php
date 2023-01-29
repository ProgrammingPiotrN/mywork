<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ __('Invoice') }}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: rgb(239, 178, 11);
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: rgb(239, 178, 11);
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <img src="{{ public_path('logo.svg') }}" alt="logo" style="height="160" width="160">
        </td>
        <td align="right">
            <pre class="font" >
               Sweet Dream Head Office
               {{ __('Email') }}: slodkiemarzenie@gmail.com <br>
               {{ __('Phone') }}: 1245454545 <br>
                Kalisz 62-800 <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="padding:0 5 0 5px;" class="font">
    <tr>
      <td>
        <p class="font" style="margin-left: 20px;">
         <strong>{{ __('Name') }}:</strong> {{ $order->name }} <br>
         <strong>{{ __('Email') }}:</strong> {{ $order->email }} <br>
         <strong>{{ __('Phone') }}:</strong> {{ $order->phone }} <br>

         @php
          $div = $order->area->area_name;
          $dis = $order->district->district_name;
          $state = $order->state->state_name;
         @endphp
          
         <strong>Adres dostawy:</strong> {{ $div }},{{ $dis }}.{{ $state }} <br>
         <strong>Kod pocztowy:</strong> {{ $order->post_code }}
       </p>
      </td>
      <td>
        <p class="font">
          <h3><span style="color: rgb(239, 178, 11);">{{ __('Invoice') }}:</span> #{{ $order->invoice_no}}</h3>
          {{ __('Order date') }}: {{ $order->order_date }} <br>
           {{ __('Delivery date') }}: {{ $order->delivered_date }} <br>
            {{ __('Payment type') }}: {{ $order->payment_method }} </span>
       </p>
      </td>
    </tr>
  </table>
  <br/>
<h3>{{ __('Products') }}</h3>


<table width="100%">
  <thead style="background-color: rgb(239, 178, 11); color:#FFFFFF;">
    <tr class="font">
      <th>{{ __('Image') }}</th>
      <th>{{ __('Name product') }}</th>
      <th>{{ __('Weight') }}</th>
      <th>{{ __('Product code') }}</th>
      <th>{{ __('Quantity') }}</th>
      <th>{{ __('Unit price') }}</th>
      <th>{{ __('Total') }}</th>
    </tr>
  </thead>
  <tbody>

     
    @foreach($orderItem as $item)
    <tr class="font">
      <td align="center">
          <img src="{{ public_path($item->product->thambnail_product)  }}" height="60px;" width="60px;" alt="">
      </td>
      <td align="center">{{ $item->product->name_product }}</td>
      <td align="center">

        @if($item->weight == NULL)
         ----
        @else
          {{ $item->weight }}
        @endif
          
      </td>
      <td align="center">{{ $item->product->code_product }}</td>
      <td align="center">{{ $item->qty }}</td>
      <td align="center">{{ $item->price }} PLN</td>
      <td align="center">{{ $item->price * $item->qty }} PLN</td>
    </tr>
    @endforeach
      
  </tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
  <tr>
      <td align="right" >
          <h2><span style="color: rgb(239, 178, 11);">Total:</span> {{ $order->amount }} PLN</h2>
      </td>
  </tr>
</table>
<div class="thanks mt-3">
  <p>{{ __('Thanks For Buying Products..') }}!!</p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>{{ __('Authority Signature') }}:</h5>
  </div>
</body>
</html>