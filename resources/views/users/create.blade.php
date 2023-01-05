@extends('layouts.app')

@section('title','Novo usuario')

@section('content')

@if($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="errors">{{$error}}</li>
        @endforeach
</ul>        


@endif

<h1>Novo usuario</h1>
<ul>
  <form action="{{ route('users.store')}}" method="post">
    @csrf 
    <input type=text name="name" placeholder="Nome:" value="{{old('name')}}">
    <input type=email name="email" placeholder="E-mail:" value="{{old('email')}}">
    <input type=password name="password" placeholder="password:" value="{{old('password')}}">
    <button type="submit">enviar</button>

  </form>
</ul>
@endsection