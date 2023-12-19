<!-- cart/show.blade.php -->

@extends('layouts.app') {{-- assuming you have a layout --}}

@section('content')
    <div class="container">
        <h2>Your Shopping Cart</h2>

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
                <p>Total: Rp.{{ number_format(Cart::subtotal(), 0, ',', '.')  }}</p>
                <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif

    </div>
@endsection
