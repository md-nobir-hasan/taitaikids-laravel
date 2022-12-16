<div class="menu-wrapper" id="side_nav">
    <div class="logo">
        <a href="#">
            {{-- <img src="{{asset('assets/images/default/site-logo.png')}}"
                    alt="Babycare" title="Babycare" height="60px"> --}}
            <h1> {{ $site_info->name }}</h1>
        </a>
    </div>
    <div class="menu-nav">
        <nav class="nav">
            <ul class="responsive-menu">
                @foreach ($categories as $category)
                    <li class="has-child">
                        {{-- <i class="fa-solid fa-child"></i> --}}
                        <a href="">
                            <span>{{$category->title}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="overlay"></div>
</div>
