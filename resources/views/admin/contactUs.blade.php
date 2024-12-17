<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">ContactUs</h2>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                @if (Auth::user()->role == 'editor')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactUs as $item)
                                <tr>
                                    <td class="text-secondary">{{ $item->name }}</td>
                                    <td class="text-secondary">{{ $item->email }}</td>
                                    <td class="text-secondary">{{ $item->message }}</td>
                                    @if (Auth::user()->role == 'editor')
                                        <td class="d-flex justify-content-evenly align-items-center">
                                            <div class="delete">
                                                <form action="{{ route('ShowContactUs.destroy', $item->id) }}" method="POST"
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
