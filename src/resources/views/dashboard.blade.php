@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="my-4">Dashboard</h1>

        <!-- Display success message if it exists -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <div class="mb-4">
            <form action="{{ route('dashboard') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Widgets Row -->
        <div class="row">
            <!-- Widget 1: Total Parties -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Parties</h5>
                        <p class="card-text display-4">{{ \App\Models\Party::count() }}</p>
                        <a href="{{ route('parties.create') }}" class="text-white">Add New Party</a>
                    </div>
                </div>
            </div>

            <!-- Widget 2: Recent Party -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Party</h5>
                        @php
                            $recentParty = \App\Models\Party::latest()->first();
                        @endphp
                        <p class="card-text">
                            @if ($recentParty)
                                <a href="{{ route('parties.show', $recentParty) }}" class="text-white">{{ $recentParty->full_name }}</a>
                            @else
                                No parties yet
                            @endif
                        </p>
                        <a href="#" class="text-white">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Widget 3: Placeholder -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Stats</h5>
                        <p class="card-text">Some stats here</p>
                        <a href="#" class="text-white">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Table -->
        <div class="card">
            <div class="card-header">
                <h5>All Parties</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parties as $party)
                            <tr>
                                <td>{{ $party->id }}</td>
                                <td><a href="{{ route('parties.show', $party) }}">{{ $party->full_name }}</a></td>
                                <td>{{ $party->Phone_no }}</td>
                                <td>{{ $party->address }}</td>
                                <td>{{ $party->city }}</td>
                                <td>{{ $party->created_at ? $party->created_at->format('Y-m-d') : 'Not set' }}</td>
                                <td>
                                    <a href="{{ route('parties.edit', $party) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('parties.destroy', $party) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this party?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{$parties->links()}} --}}
            </div>
        </div>
    </div>
@endsection

<style>
    .w-5.h-5{
        width: 25px;
    }
</style>