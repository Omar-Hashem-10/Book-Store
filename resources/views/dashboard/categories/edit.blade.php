@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" type="text" value="{{ $category->name }}"
                fgroup-class="col-md-6"/>
            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>
        </div>
    </form>
@stop
