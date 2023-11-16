@extends('frontend.layout.header')


@section('content')
    <div class="container">
        <form action="/weblogin" method="post">
            @csrf
            <input type="email" name="email" placeholder="Useremail@domain.com">
            <input type="password" name="password" placeholder="Password">
            <button>Login</button>
        </form>
    </div>
@endsection
