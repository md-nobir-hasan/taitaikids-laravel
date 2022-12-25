@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .card {
            font-size: 15px;
        }

        #cart_show input {
            width: 20px;
            text-align: center;
            border: 1px solid #cd9f9f;
        }

        #cart_show button {
            width: 21px;
            text-align: center;
            border: 1px solid #cd9f9f;
        }

        #cart_show img {
            max-height: 50px;
        }

        .header {
            font-weight: bold;
        }
        .total-div span{
            font-weight: bold;
            font-size: 17px;
        }
    </style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container p-top-15">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                {{-- cart product show  --}}
                <div class="card text-center mt-4">
                    <div class="card-header">
                        <h1>Your all selected products</h1>
                    </div>
                    <div class="card-body" id="cart_show">

                    </div>
                </div>

                {{-- checkout form  --}}

                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center"> Fill up the form </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter your full name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">Phone No.<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                            @if (isset($shippings))
                                <div class="col-md-4 mb-3">
                                    <label for="shipping_id" class="form-label">Delivery Charge<span
                                            class="text-danger">*</span></label>
                                    <select name="shipping_id" class="form-select" id="shipping_id" required>
                                        <option value="">Select shipping area</option>
                                        @foreach ($shippings as $shipping)
                                            <option value="{{ $shipping->id ?? old('shipping') }}">
                                                {{ $shipping->type . '(' . $shipping->price . '৳)' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="3"
                                    placeholder="Enter your full address" required></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-md-11 m-auto">

                                <button class="btn btn-info w-100">Confirm Order</button>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection

@push('custom-js')
    <script>
        var d = document;
        let card_body = document.getElementById("cart_show");
        let cart_product = JSON.parse(localStorage.getItem('product_storage'));
        let appends = `<div class="row mb-2 header">
                            <div class="col-3">
                                <span>Image</span>
                            </div>
                            <div class="col-3 text-start">
                                <span>Price</span>
                            </div>
                            <div class="col-2 p-0 text-start">
                                <span>Qty</span>
                            </div>
                            <div class="col-2">
                                <span>Total</span>
                            </div>
                           
                    </div>`;

        for (let item in cart_product) {
            appends += `<div class="row mb-2 ">
                        <div class="col-3">
                           <img src="${cart_product[item].img}" alt="">
                        </div>
                        <div class="col-2 m-auto">
                             <span class='price${item}'>${cart_product[item].dis_price}</span>৳
                         </div>
                        <div class="col-3 m-auto">
                            <div class="input-group">
                                <button class="btn btn-sm btn-outline-primary plus-btn" id='${item}' type="button">+</button>
                                <input type="number" name='product[${item}][qty]' value="1" step="1">
                                <button class="btn btn-sm btn-outline-danger minus-btn" id='${item}' type="button">-</button>
                              </div>
                        </div>
                        <div class="col-2 m-auto">
                           <span class="total-price${item} total-count">${cart_product[item].dis_price}</span>৳
                         </div>
                         <div class="col-2 m-auto">
                            <span class='text-danger remove-product' id='${item}' role='button'><i class="fa-solid fa-trash"></i></span>
                         </div>
                    </div>`;


        }
        appends += `<div class='row total-div'>
                        <div class='col-md-12'>
                            <hr>
                        </div>
                        <div class='col-7 text-end'>
                            <span>Total Price:</span>
                        </div>
                        <div class='col-5 text-start' >
                            <span id='toal'></span>
                        </div>
                        
                    </div>`;
        card_body.innerHTML = appends;
        let plus_btn = document.querySelectorAll('.plus-btn');
        let minus_btn = document.querySelectorAll('.minus-btn');
        let total_count = document.querySelectorAll('.total-count');
        let total_element = document.getElementById('toal');

        totalPriceCount();
        increment(plus_btn);
        decrement(minus_btn);

        function increment(element) {
            element.forEach(item => {
                item.addEventListener('click', function(event) {
                    if (Number(this.nextElementSibling.value) > 4) {
                        alert("You can't select more than 5 product")
                    } else {
                        let id = this.getAttribute('id');
                        let price = Number(d.querySelector(`.price${id}`).textContent);
                        let total_priceE = d.querySelector(`.total-price${id}`);
                        let qty = Number(this.nextElementSibling.value) + 1;
                        this.nextElementSibling.value = qty;
                        let total_price = price * qty;
                        total_priceE.textContent = total_price;
                        totalPriceCount();
                    }
                });
            });
        }

        function decrement(element) {
            element.forEach(item => {
                item.addEventListener('click', function(event) {
                    if (Number(this.previousElementSibling.value) < 2) {
                        alert("You have to select at least one product")
                    } else {
                        let id = this.getAttribute('id');
                        let price = Number(d.querySelector(`.price${id}`).textContent);
                        let total_priceE = d.querySelector(`.total-price${id}`);
                        let qty = Number(this.previousElementSibling.value) - 1;
                        this.previousElementSibling.value = qty;
                        let total_price = price * qty;
                        total_priceE.textContent = total_price;
                        totalPriceCount();
                    }
                });
            })
        }
       
        function totalPriceCount() {
            let total = 0;
            total_count.forEach((element, index) => {
                total += Number(element.textContent);
            });
            total_element.textContent = total;
        }

        //remove product from cart 
        let remove = d.querySelectorAll('.remove-product');
        let cart_store = JSON.parse(localStorage.getItem('product_storage'));
        remove.forEach((item, index) => {
            item.addEventListener('click', function() {
                let id = item.getAttribute('id');
                if (cart_store[id]) {
                    item.parentElement.parentElement.remove();
                    delete cart_store[id];
                    localStorage.setItem('product_storage', JSON.stringify(cart_store));
                    count_mobile.innerText = Object.keys(cart_store).length;
                    counts.innerText = Object.keys(cart_store).length + ' item(s)';
                }

            });
        });
        
    </script>
@endpush
