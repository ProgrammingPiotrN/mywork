@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Pending order list') }}</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Invoice') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Payment') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $item)
            
            <tr>
                <td>{{ $item->order_date }}</td>
                <td>{{ $item->invoice_no }}</td>
                <td>{{ $item->amount }} PLN</td>
                <td>{{ $item->payment_method }}</td>
                <td><span class="badge badge-pill badge-primary">{{ $item->status }}</span></td>
              <td width="25%">
                <a href="{{ route('pending.orders.details', $item->id) }}" class="btn btn-eye">{{ __('Details') }}</a> 
                <a href="{{ route('coupon.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </section>
  
  </div>

@endsection