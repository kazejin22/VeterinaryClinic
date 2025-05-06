@extends('layouts.admin')

@section('content')
    <h1>Edit Payment</h1>

    <form action="{{ route('admin.payments.update', $payment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="appointment_id">Appointment</label>
            <select name="appointment_id" id="appointment_id" class="form-control">
                @foreach($appointments as $appointment)
                    <option value="{{ $appointment->appointment_id }}" {{ $payment->appointment_id == $appointment->appointment_id ? 'selected' : '' }}>
                        {{ $appointment->appointment_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
            </select>
        </div>

        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
