@extends('adminlte::page')

@section('title', 'Discount')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<p> {{ $discount->code }} </p>
@stop

