@extends('layouts.app')

@section('title', 'Party Details')

@section('content')
    <div class="container">
        <h1 class="my-4">Party Details</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>{{ $party->full_name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $party->id }}</p>
                <p><strong>Full Name:</strong> {{ $party->full_name }}</p>
                <p><strong>Phone Number:</strong> {{ $party->Phone_no ?? 'Not provided' }}</p>
                <p><strong>Address:</strong> {{ $party->address ?? 'Not provided' }}</p>
                <p><strong>City:</strong> {{ $party->city ?? 'Not provided' }}</p>
                <p><strong>Created At:</strong> {{ $party->created_at ? $party->created_at->format('Y-m-d') : 'Not set' }}</p>
                <p><strong>Updated At:</strong> {{ $party->updated_at ? $party->updated_at->format('Y-m-d') : 'Not set' }}</p>
                @if ($party->deleted_at)
                    <p><strong>Deleted At:</strong> {{ $party->deleted_at->format('Y-m-d') }}</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('parties.edit', $party) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('parties.destroy', $party) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this party?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </div>
    </div>
@endsection