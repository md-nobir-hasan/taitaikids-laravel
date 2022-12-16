@extends('frontend.layouts.app')
@push('custom-css')
@endpush
@section('page_conent')
    <div class="cart-wrapper mini-cart" id="mini-cart">
    <div class="cart-header d-flex">
        <span class="close-icon"><i class="fa fa-arrow-right"></i></span>
        <p>YOUR CART</p>
    </div>
    <div class="content">
        <div class="loader"></div>
    </div>
</div>
<div class="main-content-wrapper">
    <div class="after-top-bar">
        <div class="wrapper-container p-top-5">
            <div  class="breadcrumb">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                                        <li><a href="https://www.babycare.com.bd/">Home</a></li>
                                        <li  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemtype="http://schema.org/Thing" itemprop="item" href="https://www.babycare.com.bd/checkout/cart"><span itemprop="name">Shopping Cart</span></a><meta itemprop="position" content="1" /></li>
                                        <li  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemtype="http://schema.org/Thing" itemprop="item" href="https://www.babycare.com.bd/checkout/checkout"><span itemprop="name">Checkout</span></a><meta itemprop="position" content="2" /></li>
                                    </ul>
            </div>
        </div>
    </div>
    <div class="wrapper-container checkout-page">
                <form class="checkout-content column-row d-flex flex-wrap" id="checkout-form" action="https://www.babycare.com.bd/checkout/onepagecheckout" method="post">
            <div class="column-grid-9">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="page-section">
                            <div class="section-head">
                                <h3>Shipping / Delivery info</h3>
                            </div>
                            <div class="address">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="firstname" type="text" id="input-firstname" value="" placeholder="First Name*" >
                                                                    </div>
                                <div class="form-group">
                                    <label for="name">Telephone</label>
                                    <input type="tel" id="input-telephone" name="telephone" value=""  class="form-control" placeholder="Telephone*" >
                                                                    </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" id="input-email" name="email" value="" class="form-control" placeholder="E-Mail">
                                                                    </div>
                                <div class="form-group">
                                    <label for="name">Address</label>
                                    <input type="text" id="input-address" name="address_1" value="" class="form-control" placeholder="Address*" >
                                                                    </div>
                                <div class="form-group">
                                    <label for="input-city">City</label>
                                    <input type="text" id="input-city" name="city" value="" placeholder="City*">
                                                                    </div>
                                <div class="form-group">
                                    <label for="name">Zone</label>
                                    <select name="zone_id" id="input-zone" class="form-control">
                                                                                <option value="322" selected>Inside Dhaka</option>
                                                                                <option value="321" >Outside Dhaka</option>
                                                                                <option value="4232" >Sub Urban Dhaka</option>
                                                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="land-mark">Special Note / Instruction</label>
                                    <textarea class="form-control"  name="comment" value="" placeholder="Comment" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="row row-payment-delivery-order">
                            <div class="col-md-7">
                                <div class="payment-methods">
                                    <div class="page-section">
                                        <div class="section-head">
                                            <h3>Payment Method</h3>
                                        </div>
                                                                                <div class="radio">
                                            <label>
                                                                                                                                                <input type="radio" name="payment_method" value="cod" checked="checked" />
                                                                                                Cash On Delivery                                                                                            </label>
                                        </div>
                                                                                <div class="radio">
                                            <label>
                                                                                                <input type="radio" name="payment_method" value="city_bank" />
                                                                                                VISA / Mastercard / AMEX                                                                                            </label>
                                        </div>
                                                                                <div class="radio">
                                            <label>
                                                                                                <input type="radio" name="payment_method" value="bkash" />
                                                                                                bKash                                                                                            </label>
                                        </div>
                                                                                <div class="radio">
                                            <label>
                                                                                                <input type="radio" name="payment_method" value="nagad" />
                                                                                                Nagad                                                                                            </label>
                                        </div>
                                                                            </div>

                                </div>
                                <div class="babycare-balance" id="bcbalance">
                                    <div class="page-section">
                                        <div class="section-head">
                                            <h3>Babycare Balance</h3>
                                        </div>
                                                                                <div>
                                            <label for="input-credit"> Pay with Babycare Balance</label>
                                            <input class="form-control ichange" id="input-credit" name="credit" type="text" placeholder="Credit to use (Max )" value="">
                                        </div>
                                                                                                                        <div>
                                            <label for="input-reward"> Pay with Reward Point</label>
                                            <input id="input-reward" class="form-control ichange" name="reward" type="text" placeholder="Points to use (Max 0)" value="">
                                        </div>
                                                                            </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 delivery-methods">
                                <div class="page-section">
                                    <div class="section-head">
                                        <h3>Delivery Method</h3>
                                    </div>
                                                                                                                                                                                    <div class="radio-inline">
                                        <label>
                                                                                                                                    <input type="radio" name="shipping_method" value="flat.26" checked="checked" />
                                                                                        Inside Dhaka Delivery for Dakhshinkhan, Donia, Jatrabari, Postogola, Uttorkhan, Jurain, Demra. - ৳ 75                                        </label>
                                    </div>
                                    <input type="hidden" name="flat.26.title" value="Inside Dhaka Delivery for Dakhshinkhan, Donia, Jatrabari, Postogola, Uttorkhan, Jurain, Demra.">
                                                                        <div class="radio-inline">
                                        <label>
                                                                                        <input type="radio" name="shipping_method" value="flat.28" />
                                                                                        Inside Dhaka-Metro Area  - ৳ 50                                        </label>
                                    </div>
                                    <input type="hidden" name="flat.28.title" value="Inside Dhaka-Metro Area ">
                                                                        <div class="radio-inline">
                                        <label>
                                                                                        <input type="radio" name="shipping_method" value="flat.33" />
                                                                                        Outside Dhaka Courier Pickup (2 Kg+) - ৳ 250                                        </label>
                                    </div>
                                    <input type="hidden" name="flat.33.title" value="Outside Dhaka Courier Pickup (2 Kg+)">
                                                                        <div class="radio-inline">
                                        <label>
                                                                                        <input type="radio" name="shipping_method" value="flat.31" />
                                                                                        Outside Dhaka Home Delivery (2 Kg+) - ৳ 200                                        </label>
                                    </div>
                                    <input type="hidden" name="flat.31.title" value="Outside Dhaka Home Delivery (2 Kg+)">
                                                                        <div class="radio-inline">
                                        <label>
                                                                                        <input type="radio" name="shipping_method" value="flat.32" />
                                                                                        Outside Dhaka Home Delivery (2.5 Kg+) - ৳ 250                                        </label>
                                    </div>
                                    <input type="hidden" name="flat.32.title" value="Outside Dhaka Home Delivery (2.5 Kg+)">
                                                                                                                                                                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12" id="dis-gift-code">
                                <div class="page-section">
                                    <div class="section-head">
                                        <h3>Discount /  Gift Card</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group" id="discount-code">
                                                <label for="input-voucher">Gift Cards</label>
                                                <input type="text" name="voucher" placeholder="Gift Voucher" id="input-voucher" class="form-control" />
                                                <button type="button" id="button-voucher" data-loading-text="Loading..."  class="btn btn-primary">Apply</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" id="gift-cart">
                                                <label for="input-coupon">Discount Code</label>
                                                <input type="text" name="coupon" placeholder="Promo Code" id="input-coupon" class="form-control" />
                                                <button type="button" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="page-section order-info">
                                    <div class="section-head">
                                        <h3>Order Summary</h3>
                                    </div>
                                    <table class="buy-product-table checkout-data">
                                        <thead>
                                        <tr>
                                            <td>Product Name</td>
                                            <td class="text-right">Total</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                <tr>
                                            <td>
                                                <span class="name">Munchkin Color Me Hungry Splash  Toddler Dining Set - Purple</span>
                                                <span class="cross">X</span>
                                                <span class="quantity">1 </span>
                                                <div class="options">
                                                                                                    </div>
                                                <i class="reward-point"> Reward Points: 22</i>                                                                                            </td>
                                            <td class="price text-right">৳ 1,870   </td>
                                        </tr>
                                                                                                                        <tr>
                                            <td class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right">৳ 1,870</td>
                                        </tr>
                                                                                <tr>
                                            <td class="text-right"><strong>Inside Dhaka Delivery for Dakhshinkhan, Donia, Jatrabari, Postogola, Uttorkhan, Jurain, Demra.:</strong></td>
                                            <td class="text-right">৳ 75</td>
                                        </tr>
                                                                                <tr>
                                            <td class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right">৳ 1,945</td>
                                        </tr>
                                                                                </tbody>
                                    </table>
                                                                        <div class="" style="margin-bottom: 10px">I have read and agree to the <a href="https://www.babycare.com.bd/conditions" target="_blank"><b>Terms and Conditions</b></a>, <a href="https://www.babycare.com.bd/privacy-policies" target="_blank"><b>Privacy Policy</b></a> and <a href="https://www.babycare.com.bd/return-refund" target="_blank"><b>Refund and Return Policy</b></a>                                                                                <input type="checkbox" name="agree" value="1" />
                                                                            </div>
                                                                        <div class="clearfix"></div>
                                    <button id="button-confirm" class="btn submit-btn" type="submit" disabled>Confirm Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-grid-3">
                <div class="payment-method">
                    <div class="category-title bg-title">
                        <h3>PAYMENT METHOD</h3>
                    </div>
                    <div class="accept-system d-flex justify-content-between">
                        <div class="system">
                            <img src="catalog/view/theme/babycare/image/icon/cod.png" alt="Cash on Delivery">
                            <h5>Cash on Delivery</h5>
                        </div>
                        <div class="system">
                            <img src="catalog/view/theme/babycare/image/icon/card.png" alt="Online Payment">
                            <h5>Online Payment</h5>
                        </div>
                        <div class="system">
                            <img src="catalog/view/theme/babycare/image/icon/mobile.png" alt="Mobile Payment">
                            <h5>Mobile Payment</h5>
                        </div>
                        <div class="system">
                            <img src="catalog/view/theme/babycare/image/icon/sod.png" alt="">
                            <h5>Swipe on Delivery</h5>
                        </div>
                    </div>
                    <div class="pay-us-info">
                        <h4>Pay With</h4>
                        <div class="payment-way d-flex justify-content-between flex-wrap">
                            <div class="pay-way-img">
                                <img src="catalog/view/theme/babycare/image/icon/master-card.png" alt="Master Card Logo">
                            </div>
                            <div class="pay-way-img">
                                <img src="catalog/view/theme/babycare/image/icon/visa.png" alt="Visa Card Logo">
                            </div>
                            <div class="pay-way-img">
                                <img src="catalog/view/theme/babycare/image/icon/amex.png" alt="AMEX Card Logo">
                            </div>
                            <div class="pay-way-img">
                                <img src="catalog/view/theme/babycare/image/icon/bkash.png" alt="BKash Logo">
                            </div>
                            <div class="pay-way-img">
                                <img src="catalog/view/theme/babycare/image/icon/tk-pic.png" alt="Bangladeshi Taka">
                            </div>
                        </div>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-phone-volume"></i> Call Us: 0963-888-88-00 <br><span>or</span><br>E-mail: info@babycarebd.com
                        <div class="why-choose-us">
                            <div class="single-item">
                                <img src="catalog/view/theme/babycare/image/icon/rocket.png" alt="Quick Delivery">
                                <h4>Quick Delivery</h4>
                            </div>
                            <div class="single-item">
                                <img src="catalog/view/theme/babycare/image/icon/mask-group-1.png" alt="Easy Return & Refund">
                                <h4>Easy Return & Refund</h4>
                            </div>
                            <div class="single-item">
                                <img src="catalog/view/theme/babycare/image/icon/24-hour.png" alt="Superior Customer Service">
                                <h4>Superior Customer Service</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('custom-js')
