<!-- cart/show.blade.php -->

{{-- @extends('layouts.app') assuming you have a layout --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .empty-cart-message {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('uploads/23.jpg');
            background-size: cover;
            height: 100vh;
            background-attachment: fixed;
            background-position: center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }



        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar-collapse pt-4" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <h2 class="pt-4" style="margin-right: 20px;">Keranjang Belanja</h2>
            </div>
            <a class="btn-theme btn mr-3 text-light" style="background-color: #395B64; border-radius: 15px"
                href="{{ route('client.index') }}">Kembali</a>
        </div>


        @if (count($cartItems) > 0)
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>Rp.{{ number_format($item->qty * $item->price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('cart.remove', $item->rowId) }}" class="btn btn-danger btn-sm">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <input type="hidden" name="cart_items[{{ $item->id }}][produk_id]"
                                value="{{ $item->id }}">
                            <input type="hidden" name="cart_items[{{ $item->id }}][jumlah]"
                                value="{{ $item->qty }}">
                            <input type="hidden" name="cart_items[{{ $item->id }}][harga]"
                                value="{{ $item->price }}">
                            <input type="hidden" name="cart_items[{{ $item->id }}][total_harga]"
                                value="{{ $item->total }}">
                        @endforeach
                    </tbody>
                </table>
                <p>Total: Rp.{{ number_format(Cart::subtotal(), 0, ',', '.') }}</p>
                <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
            </form>
        @else
            <div class="empty-cart-message">
                <p>Keranjang Belanja Kosong.</p>
            </div>
        @endif

    </div>
</body>

</html>
{{-- @endsection --}}
