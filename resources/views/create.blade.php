@extends('layout')
@section('title', 'Create')
@section('content')

    <div class="container">
        <form action="{{ route('create.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ItemName</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
    </div>
@endsection
