@extends('layouts.cashier')

@section('content')
    <div class="row g-4">
        <h2 class="text-dark fw-bold mb-4">Order List</h2>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($orders as $item)
            <div class="col-6 col-lg-3">
                <div class="card" type="button" data-bs-toggle="modal" data-bs-target="#changeStatus{{ $item->id }}">
                    <div class="card-body">
                        <p class="mb-0 text-secondary text-end fs-7">{{ $item->id }}</p>
                        <h5 class="text-dark mb-0">{{ $item->customer_name }}</h5>
                        <p class="mb-2 text-secondary fs-8">
                            {{ number_format($item->details->count()) }} Items
                        </p>
                        @if ($item->status == 'Waiting')
                            <span class="badge bg-warning">{{ $item->status }}</span>
                        @elseif ($item->status == 'Completed')
                            <span class="badge bg-primary">{{ $item->status }}</span>
                        @else
                            <span class="badge bg-danger">{{ $item->status }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="modal fade" id="changeStatus{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">Pesanan #{{ $item->id }}</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('cashier.order-list.status') }}" method="POST">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{ $item->id }}">
                                <div class="mb-3">
                                    <label for="status">Ubah Status</label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="Waiting">Waiting</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
