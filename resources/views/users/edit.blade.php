@extends('layouts.app')

@section('title','Editar usuario')

@section('content')

@include('includes.validations-form')

<h1>Editar usuario</h1>
<ul>
  <form action="{{ route('users.update',$user->id)}}" method="post">    
    @method('PUT')    
    @include('users._partials.form')
  </form>
</ul>
@endsection