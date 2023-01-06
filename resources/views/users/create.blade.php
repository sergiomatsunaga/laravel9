@extends('layouts.app')

@section('title','Novo usuario')

@section('content')
@include('includes.validations-form')

<h1>Novo usuario</h1>
<ul>
  <form action="{{ route('users.store')}}" method="post">
    @include('users._partials.form')

  </form>
</ul>
@endsection