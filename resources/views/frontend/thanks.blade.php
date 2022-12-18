@extends('frontend.layouts.app')
@push('custom-css')
<style>
    table{
        font-size: 16px;
    }
</style>
@endpush
@section('page_conent')
    
    <div class="main-content-wrapper">
        <div class="wrapper-container thanks-page">
           <div class="card">
            <div class="card-header text-center">
                <p><i class="fa-solid fa-hexagon-check"></i></p>
                <h1>Thank you</h1>
            </div>
            <div class="card-body">
                <h2 class="text-center">Your Order details</h2>
                <table class="table table-sm table-striped text-center text-sm">
                   <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Shipping</th>
                        <th>Total</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->product->title}}</td>
                            <td>{{$order->product->price}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->shipping->price}}</td>
                            <td>{{$order->total()}}</td>
                        </tr>
                    @endforeach
                   </tbody>
                </table>
            </div>
           </div>
        </div>
    </div>
@endsection

@push('custom-js')
<script>
    localStorage.clear();
</script>
@endpush