<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Payment</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('payments.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Payment List</p>
                    <h4 class="m-0 fw-bold">Update Payment</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('payments.update', $payment->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="shipment_id" class="form-label text-secondary fw-bold">Shipment Id
                                </label>
                                <select class="form-control bg-body-secondary border-0" name="shipment_id" id="shipment_id">
                                    @foreach ($shipments as $shipment)
                                        <option value="{{ $shipment->id }}">{{ $shipment->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label text-secondary fw-bold">Amount
                                </label>
                                <input type="number" class="form-control bg-body-secondary border-0" id="amount"
                                    name="amount" value="{{ $payment->amount }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="status" class="form-label text-secondary fw-bold">Status</label>
                                <select class="form-control bg-body-secondary border-0" name="status" id="status">
                                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid
                                    </option>
                                    <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Unpaid
                                    </option>
                                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i
                                    class="bi bi-plus"></i>Create</button>
                        </div>
                </form>
            </div>
        </div>
    @endsection

</body>

</html>
