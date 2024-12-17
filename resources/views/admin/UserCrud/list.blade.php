<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <!-- Shipment Card -->
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <!-- Header -->
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Users</h2>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('users.create') }}" class="btn btn-dark fs-6 rounded-pill px-3 py-2">
                            <i class="bi bi-plus mx-1"></i>Add User
                        </a>
                    @endif
                </div>

                <!-- Shipment Table -->
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                @if (Auth::user()->role == 'editor')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-secondary">{{ $user->name }}</td>
                                    <td class="text-secondary">{{ $user->email }}</td>
                                    <td class="text-secondary">{{ $user->role }}</td>
                                    @if (Auth::user()->role == 'editor')
                                        <td class="d-flex justify-content-evenly align-items-center">
                                            <div class="edit">
                                                <!-- Edit Button -->
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <!-- Delete Button -->
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
