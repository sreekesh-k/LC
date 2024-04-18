@extends('layout')
@section('title', 'Main')
@section('content')
    <div class="container">
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
                        <td><a href="{{ route('edit') }}">edit</a></td>
                        <td><a href="{{ route('delete') }}">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('create') }}">create</a>
    </div>
@endsection
