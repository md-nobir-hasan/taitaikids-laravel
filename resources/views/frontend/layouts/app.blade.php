@php
    $categories = App\Models\Category::all();
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $site_info->title ?? 'E-WEB - MD NOBIR HASAN' }} </title>
    <base />
    <meta name="description" content="ebusiness" />
    <meta name="keywords" content="ebusiness Care, ebusiness Shop , ebusiness Care Product Online , Online Shopping " />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ $site_info->logo }}" rel="icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @stack('custom-css')
</head>


<body class="common-home">
    {{-- notification  --}}
    @include('frontend.partials.notification')
    {{-- End notification  --}}

    {{-- menu navbar toggle  --}}
    <div class="menu-nav-bar">
        <div class="wrapper-container">
            <div id="nav-toggler"><span></span></div>
        </div>
    </div>
    {{-- End menue navbar toggle  --}}

    <!-- Topbar Start -->
    @include('frontend.partials.navbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('frontend.partials.side-menue')
    <!-- Navbar End -->

    {{-- Shopping card  --}}
    @include('frontend.partials.shopping-card')
    {{-- End shopping card  --}}

    {{-- Shopping card  --}}
    @include('frontend.partials.mini-cart')
    {{-- End shopping card  --}}

    @yield('page_conent')

    <footer class="footer">
        <div class="wrapper-container">
            <div class="footer-content d-flex flex-wrap">
                <div class="footer-widget footer-contact-info">
                    <h4 class="title">Contact Us</h4>
                    <ul>
                        <li><i class="fa fa-phone"></i><a href="tel:{{ $site_contact_info->phone }}">Call Us:
                                {{ $site_contact_info->phone }}</a></li>
                        <li><i class="fa fa-envelope"></i><a
                                href="mailto:{{ $site_contact_info->email }}">{{ $site_contact_info->email }}</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h4 class="title">Customer Care</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Shipping &amp; Delivery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h4 class="title">Company Information</h4>
                    <ul>
                        <li><a href="#">Refund and Return Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Cashback Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="copy-right">
                    <p><strong>{{ $site_info->name }}</strong> | All Rights Reserved</a></p>
                </div>
            </div>
        </div>
    </footer>
    <div class="overlay"></div>
    <div class="footer-bottom-bar">
        <div class="bottom-bar d-flex flex-wrap justify-content-around">
            <a href="#" class="bottom-item offer">
                <div class="bottom-item-icon">
                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                </div>
                <span class="text">Offers</span>
            </a>
            {{-- href="https://m.me/babycare.bangladesh" --}}
            <a href="javascript::void(0)" class="bottom-item barnd">
                <div class="bottom-item-icon">
                    <i class="fa-brands fa-facebook-messenger"></i>
                </div>
                <span class="text">Messenger</span>
            </a>
            <div class="bottom-item cart mc-toggler" id="cart_mobile">
                <a href="{{ route('checkout') }}">
                    <div class="bottom-item-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <span class="text">Cart</span>
                    <span class="value count-mobile">0</span>
                </a>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>


    <div class="fb-customerchat" attribution=setup_tool page_id="377420772353763" theme_color="#005662">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
     <script>
        window.addEventListener('load', function() {


            // side navbar tigger 
            let side_nav_tigger = document.querySelector('.menu-nav-bar');
            let check = false;
            side_nav_tigger.addEventListener('click', function() {
                let side_nav = document.getElementById('side_nav');
                if (check) {
                    side_nav.style.left = '-360px';
                    check = false;
                } else {
                    side_nav.style.left = '0';
                    check = true;
                }
            });

        });
    </script>
    @stack('custom-js')
</body>
<!-- Mirrored from www.babycare.com.bd/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Dec 2022 18:12:30 GMT -->

</html>
