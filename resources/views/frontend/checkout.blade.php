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

        .total-div span {
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
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart_show">
                                    <tr>
                                        <td colspan="4">There are no products</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
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
                                                {{ $shipping->type . '(' . en2bn($shipping->price) . '৳)' }}</option>
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
        let appends = ``;

        for (let item in cart_product) {
            appends += ` <tr>
                            <td><img src="${cart_product[item].img}" alt=""></td>
                            <td> <span class='price'>${cart_product[item].dis_price}</span>৳</td>
                            <td>
                                <div class="input-group justify-content-center">
                                    <button class="btn btn-sm btn-outline-primary plus-btn"
                                        type="button">+</button>
                                    <input type="text" name='product[${item}][qty]' value="১" class='qty'>
                                    <button class="btn btn-sm btn-outline-danger minus-btn"
                                        type="button">-</button>
                                </div>
                            </td>
                            <td> <span
                                    class="total-price">${cart_product[item].dis_price}</span>৳
                            </td>
                            <td><span class='text-danger remove-product' role='button'><i
                                        class="fa-solid fa-trash"></i></span></td>
                        </tr>`;


        }

        card_body.innerHTML = appends;
        // let plus_btn = document.querySelectorAll('.plus-btn');
        // let minus_btn = document.querySelectorAll('.minus-btn');
        let total_count = document.querySelectorAll('.total-count');
        let total_element = document.getElementById('toal');

        // totalPriceCount();


        // increment(plus_btn);
        // decrement(minus_btn);

        //qty increment
        $('.plus-btn').on('click', function() {
            let index = $(this).index('.plus-btn');
            let qty = Number(bn2en($('.qty').eq(index).val())) + 1;
            if (qty > 5) {
                toastr.error("You can't select more than 5 product");
            } else {
                let price = Number(bn2en($('.price').eq(index).text()));
                let total_price = qty * price;
                $('.qty').eq(index).val(en2bn(String(qty)));
                $('.total-price').eq(index).text(en2bn(String(total_price)));
            }
        })

        //qty decrement
        $('.minus-btn').on('click', function() {
            let index = $(this).index('.minus-btn');
            let qty = Number(bn2en($('.qty').eq(index).val())) - 1;
            if (qty < 1) {
                toastr.error("You have to select at least one product");
            } else {
                let price = Number(bn2en($('.price').eq(index).text()));
                let total_price = qty * price;
                $('.qty').eq(index).val(en2bn(String(qty)));
                $('.total-price').eq(index).text(en2bn(String(total_price)));
            }
        })

        // function increment(element) {
        //     element.forEach(item => {
        //         item.addEventListener('click', function(event) {
        //             if (Number(this.nextElementSibling.value) > 4) {
        //                 alert("You can't select more than 5 product")
        //             } else {
        //                 let id = this.getAttribute('id');
        //                 let price = Number(d.querySelector(`.price${id}`).textContent);
        //                 let total_priceE = d.querySelector(`.total-price${id}`);
        //                 let qty = Number(this.nextElementSibling.value) + 1;
        //                 this.nextElementSibling.value = qty;
        //                 let total_price = price * qty;
        //                 total_priceE.textContent = total_price;
        //                 totalPriceCount();
        //             }
        //         });
        //     });
        // }


        // function decrement(element) {
        //     element.forEach(item => {
        //         item.addEventListener('click', function(event) {
        //             if (Number(this.previousElementSibling.value) < 2) {
        //                 alert("You have to select at least one product")
        //             } else {
        //                 let id = this.getAttribute('id');
        //                 let price = Number(d.querySelector(`.price${id}`).textContent);
        //                 let total_priceE = d.querySelector(`.total-price${id}`);
        //                 let qty = Number(this.previousElementSibling.value) - 1;
        //                 this.previousElementSibling.value = qty;
        //                 let total_price = price * qty;
        //                 total_priceE.textContent = total_price;
        //                 totalPriceCount();
        //             }
        //         });
        //     })
        // }

        // function totalPriceCount() {
        //     let total = 0;
        //     total_count.forEach((element, index) => {
        //         total += Number(element.textContent);
        //     });
        //     total_element.textContent = total;
        // }

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
