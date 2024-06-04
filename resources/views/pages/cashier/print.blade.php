<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.style')
    <style>
        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 1.6cm;
            }
        }
    </style>
</head>

<body class="bg-soft-blue">
    <section class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0">
                    <div class="card-body py-5 px-5">
                        <a href="." class="logo justify-content-center mb-5">
                            <img src="{{ url('assets/images/logo.png') }}" alt="Logo">
                            <span>NewsOnlen</span>
                        </a>

                        <p class="mb-1 text-secondary text-uppercase fw-medium fs-7">Detail Produk</p>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($transaction->details as $item)
                            <div class="row mt-2">
                                <div class="col-7">
                                    <p class="mb-0 text-dark fw-semibold">{{ $item->menu->name }}</p>
                                    <p class="mb-0 text-secondary fs-7">Rp. {{ number_format($item->price) }}</p>
                                </div>
                                <div class="col-5">
                                    <p class="mb-0 text-dark text-end fw-semibold">Rp.
                                        {{ number_format($item->price * $item->quantity) }}</p>
                                    <p class="mb-0 text-secondary text-end fs-7">{{ $item->quantity }}x</p>
                                </div>
                            </div>
                            @php
                                $subtotal += $item->price * $item->quantity;
                            @endphp
                        @endforeach

                        <hr class="my-4" style="border-style: dashed;">
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Subtotal</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Pajak</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. 12,000</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Total</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. {{ number_format($transaction->total) }}</p>
                        </div>
                        <hr class="my-4" style="border-style: dashed;">
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Cash</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. {{ number_format($transaction->pay) }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Kembali</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. {{ number_format($transaction->return) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.script')
    <script>
        window.print();
    </script>
</body>

</html>
