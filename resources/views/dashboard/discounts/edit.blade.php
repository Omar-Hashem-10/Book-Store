@extends('adminlte::page')

@section('title', 'Edit Discount')

@section('content_header')
    <h1>Edit Discount</h1>
@stop

@section('content')
    <form action="{{ route('dashboard.discounts.update', $discount->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="code" label="Code" type="text" value="{{ $discount->code }}"
                fgroup-class="col-md-6"/>

            <x-adminlte-input name="quantity" label="Quantity" type="number" value="{{ $discount->quantity }}"
                fgroup-class="col-md-6"/>

            <x-adminlte-input name="percentage" label="Percentage" type="text" value="{{ $discount->percentage }}"
                fgroup-class="col-md-6"/>

            <x-adminlte-input name="expiry_date" label="Expiry Date" type="datetime-local" value="{{ $discount->expiry_date }}"
                fgroup-class="col-md-6"/>


                <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>
                <x-adminlte-input name="discount_id" type="hidden" value="{{ $discount->id }}"
                fgroup-class="col-md-12"/>

        </div>
    </form>
@stop
