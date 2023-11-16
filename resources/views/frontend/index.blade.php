@extends('frontend.layout.header')


@section('content')
    <div class="container">
        <div class="items-div">
           @forelse ($item as $item)
           <div class="item">
            <h1>Product name</h1>
            <p>product description</p>
            <div class="cart-holder">
                <div class="buynow">
                    <a href="customeritem/{{ $item->id }}">Buy now</a>
                </div>
            </div>
            </div>
           @empty

           @endforelse
        </div>
    </div>
@endsection

