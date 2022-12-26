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
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WXRDR8R');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '472292044430428');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=472292044430428&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
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

    <div class="toastr-div">

    </div>
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
                    <i class="fa fa-bookmark text-light" aria-hidden="true"></i>
                </div>
                <span class="text text-light">Offers</span>
            </a>
            {{-- href="https://m.me/babycare.bangladesh" --}}
            <a href="javascript::void(0)" class="bottom-item barnd">
                <div class="bottom-item-icon">
                    <i class="fa-brands fa-facebook-messenger text-light"></i>
                </div>
                <span class="text text-light">Messenger</span>
            </a>
            <div class="bottom-item cart mc-toggler" id="cart_mobile">
                <a href="{{ route('checkout') }}">
                    <div class="bottom-item-icon">
                        <i class="fa fa-shopping-cart text-light"></i>
                    </div>
                    <span class="text text-light">Cart</span>
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    {{-- jquery  --}}
    <script>
        //  Toaster object 
        var toastr = {
            count: 0,
            toaster_append(msg, class_name) {
                $('.toastr-div').append(`<div class="toastr ${class_name}">
                                                    <span class="toaster-msg">${msg}</span>
                                                </div>`);
            },
            success(msg) {
                let class_name = 'toastr' + this.count;
                console.log(this);
                this.toaster_append(msg, class_name);

                $('.' + class_name).fadeIn(1000);
                setTimeout(() => {
                    $('.' + class_name).fadeOut(1000);
                }, 2500);
                this.count++;
            },
            error(msg) {
                let class_name = 'toastr' + this.count;
                this.toaster_append(msg, class_name);

                $('.' + class_name).css({
                    backgroundColor: 'red'
                });
                $('.' + class_name).fadeIn(1000);
                setTimeout(() => {
                    $('.' + class_name).fadeOut(1000);
                }, 2500);
                this.count++;
            }
        }
        // End Toaster object 
    </script>
    {{-- End jquery  --}}
    <script>
        //load  add to card product
        let count_mobile = document.querySelector('.count-mobile');
        let count = document.querySelectorAll('.count');
        let counts = document.querySelector('.count');
        if (localStorage.getItem('product_storage')) {
            let product_number = Object.keys(JSON.parse(localStorage.getItem('product_storage'))).length;
            count_mobile.innerText = product_number;
            counts.innerText = product_number + ' item(s)';
        }
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

            //add to card
            let add_to_card_btn = document.querySelectorAll('.add-to-cart');

            add_to_card_btn.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    let product_id = this.getAttribute('id');
                    let title = document.querySelector(`.title${product_id}`).textContent;
                    let img = document.querySelector(`.img${product_id}`).getAttribute('src');
                    let price = document.querySelector(`.price${product_id}`).textContent;
                    let dis_price = document.querySelector(`.dis-price${product_id}`).textContent;

                    if (localStorage.getItem('product_storage')) {
                        let product_storage = JSON.parse(localStorage.getItem('product_storage'));
                        if (product_storage[product_id]) {
                            toastr.error('This product already added to your card')
                        } else {
                            product_storage[product_id] = {
                                'title': title,
                                'img': img,
                                'price': price,
                                'dis_price': dis_price
                            };
                            localStorage.setItem('product_storage', JSON.stringify(
                                product_storage));
                            count.forEach(item => {
                                item.innerText = Object.keys(product_storage).length +
                                    ' item(s)';
                            })
                            count_mobile.innerText = Object.keys(product_storage).length;
                            toastr.success('This product added to your card')
                        }
                    } else {
                        let product_storage = {};
                        product_storage[product_id] = {
                            'title': title,
                            'img': img,
                            'price': price,
                            'dis_price': dis_price
                        };
                        localStorage.setItem('product_storage', JSON.stringify(product_storage));
                        count.forEach(item => {
                            item.innerText = Object.keys(product_storage).length +
                                ' item(s)';
                        });
                        count_mobile.innerText = Object.keys(product_storage).length;
                        toastr.success('This product added to your card')
                    }
                });
            });

        });
    </script>




    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WXRDR8R" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Global site tag (gtag.js) - Google Analytics -->

    {{-- //gtag() configuration --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'MEASUREMENT_ID');
    </script>

    @stack('custom-js')
</body>
<!-- Mirrored from www.babycare.com.bd/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Dec 2022 18:12:30 GMT -->

</html>
