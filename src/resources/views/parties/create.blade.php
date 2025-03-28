@extends('layouts.app')

@section('title', 'Create Party')

@section('content')
    <div class="container">
        <h1 class="my-4">Create a New Party</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('parties.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="Phone_no" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="Phone_no" name="Phone_no" value="{{ old('Phone_no') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create Party</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection