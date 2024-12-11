<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('users.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To User List</p>
                    <h4 class="m-0 fw-bold">Update User</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label text-secondary fw-bold">Name</label>
                                <input type="text" class="form-control bg-body-secondary border-0" id="name"
                                    name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label text-secondary fw-bold">Email</label>
                                <input type="email" class="form-control bg-body-secondary border-0" id="email"
                                    name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label text-secondary fw-bold">Status</label>
                                <select class="form-control bg-body-secondary border-0" name="role" id="status"
                                    required>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>
                                        Editor
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i class="bi bi-save"></i>
                        Update</button>
                </form>
            </div>
        </div>
    @endsection


</body>

</html>
