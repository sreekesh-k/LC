@extends('layout')
@section('title', 'Main')
@section('content')
    <div class="container">
        <div class='mt-5'>
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if (session()->has('Error'))
                <div class="alert alert-danger">{{ session('Error') }}</div>
            @endif
            @if (session()->has('Success'))
                <div class="alert alert-success">{{ session('Success') }}</div>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td><a href="{{ route('edit', ['item' => $item]) }}">edit</a></td>
                        <td><a href="{{ route('delete', ['item' => $item]) }}">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('create') }}">create</a>
    </div>
@endsection
