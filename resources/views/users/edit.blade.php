@extends('layouts.app')

@section('title','Editar usuario')

@section('content')

@if($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="errors">{{$error}}</li>
        @endforeach
</ul>        


@endif

<h1>Editar usuario</h1>
<ul>
  <form action="{{ route('users.update',$user->id)}}" method="post">
    <input type="hidden"name="_method" value="PUT">
    <!--usa o input ou diretiva para mudar o metodo para put @method('PUT')-->
    @csrf 
    <input type=text name="name" placeholder="Nome:" value="{{$user->name}}">
    <input type=email name="email" placeholder="E-mail:" value="{{$user->email}}">
    <input type=password name="password" placeholder="password:" value="{{$user->password}}">
    <button type="submit">enviar</button>

  </form>
</ul>
@endsection