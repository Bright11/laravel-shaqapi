@extends('frontend.layout.header')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
@endpush
@section('content')
<div class="container">
    <table class="table">
        <button>Print</button>
        <div class="customer_item_invoice">

            <div>
                <h1>Shaq Express</h1>
                <h1>P.O.B: 1928 Accra Ghana</h1>
            </div>
            <div>
                <h1>{{ Auth::user()->name }}</h1>
                <h1>{{ Auth::user()->email }}</h1>
            </div>
        </div>
        <thead>
          <tr>
            <th scope="col">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Issued Date</th>
            <th scope="col">Expiring Date</th>
          </tr>
        </thead>
        <tbody>
         @forelse ($myitem as $item)

         <tr>
            <th scope="row">{{ $item->Product->name }}</th>
            <td>${{ $item->Product->amount }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->expiring_date }}</td>
            <td>{{ $item->issued_date }}</td>
          </tr>
         @empty

         @endforelse
          <tr>
            <td>Total ${{ $gettotal }}</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection


