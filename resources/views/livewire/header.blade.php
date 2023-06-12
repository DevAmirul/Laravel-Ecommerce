<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area ">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>

                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789"><span class="icon label-before fa fa-phone"></span>

                                    Hotline:
                                    {{ $settings->phone }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789"><span class="icon label-before fa fa-phone"></span>

                                    Hotline:
                                    {{ $settings->phone2 }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789"><span
                                        class="icon label-before fa fa-envelope-o"></span>Mail:
                                    {{ $settings->email }}
                                </a>
                            </li>
                        </ul>
                        </di v>
                    </div>
                </div>
                <div class="container">
                    <div class="mid-section main-info-area">
                        <div class="wrap-logo-top left-section">
                            <a href="/" class="link-to-home"><img class="logo-img"
                                    src="https://e7.pngegg.com/pngimages/480/581/png-clipart-logo-e-commerce-digital-marketing-brand-trade-ecommerce-text-service.png"
                                    alt="mercado"></a>
                        </div>
                        @livewire('search-component')
                        @livewire('count')
                    </div>
                </div>
                <div class="nav-section header-sticky">
                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item {{ (request()->is('/')) ? 'active-icon' : '' }}">
                                    <a href="{{ route('/') }}" class="link-term mercado-item-title"><i
                                            class="fa fa-home" aria-hidden="true"></i></a>
                                </li>
                                <li class="menu-item {{ (request()->is('shop')) ? 'active-icon' : '' }}">
                                    <a href="{{ route('shop') }}" class="link-term mercado-item-title">Shop</a>
                                </li>
                                @foreach ($categories as $category )
                                <li
                                    class="menu-item {{ request()->path() == ('category/'.$category->slug) ? 'active-icon' : 'no'}}">
                                    <a href="{{ route('category',['slug' => $category->slug]) }}"
                                        class="link-term mercado-item-title">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>