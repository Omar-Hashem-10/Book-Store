@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <form action="{{ route('dashboard.categories.store') }}" method="POST">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" type="text" placeholder="Enter Category Name"
                fgroup-class="col-md-6"/>

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>

        </div>
    </form>
@stop
