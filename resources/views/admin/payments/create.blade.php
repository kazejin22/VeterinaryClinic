@extends('layouts.admin')

@section('content')
    <h1>Tambah Payment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.payments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="appointment_id">Pilih Appointment:</label>
            <select name="appointment_id" class="form-control" required>
                @foreach(App\Models\Appointment::all() as $appointment)
                    <option value="{{ $appointment->id }}">#{{ $appointment->id }} - {{ $appointment->service_name ?? 'No Service' }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
        </div>

        <div class="form-group">
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan Payment</button>
    </form>
@endsection
