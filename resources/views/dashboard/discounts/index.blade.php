@extends('adminlte::page')

@section('title', 'Discounts')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Dashboard</h1>
    <a href="{{ route("dashboard.discounts.create") }}" class="btn btn-success btn-lg">
        <i class="fas fa-plus"></i>
        Create
    </a>
    </div>
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Percentage</th>
                <th>Expiry Date</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
            <tr>
                <td>{{ $discount->id }}</td>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->quantity }}</td>
                <td>{{ $discount->percentage }}</td>
                <td>{{ $discount->expiry_date }}</td>
                <td>{{ $discount->created_at }}</td>
                <td>{{ $discount->updated_at }}</td>
                <td>
                    <a href="{{ route("dashboard.discounts.show", $discount->id) }}" class="btn btn-outline-primary">View</a>
                    <form action="{{ route("dashboard.discounts.destroy", $discount->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button theme="outline-danger" type="submit" label="Delete"/>
                    </form>
                    <a href="{{ route("dashboard.discounts.edit", $discount->id) }}" class="btn btn-outline-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $discounts->links() }}
@stop

