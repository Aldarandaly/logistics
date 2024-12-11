<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <style>
        .form-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h1 {
            font-weight: 700;
            color: #333;
        }

        button {
            background-color: #007bff;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @extends('layouts.navBar')

    @section('content')
        <div class="container">
            <div class="form-container mx-auto col-md-6">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-exclamation-circle"></i> {{ session('success') }}
                    </div>
                @endif
                <h1 class="text-center mb-4">Contact Us</h1>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Write your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    @endsection
</body>

</html>
