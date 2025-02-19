<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi-cup-hot"></i>
            @lang('app.appName')
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link link-primary" href="{{ route('products.index') }}">
                        <i class="bi-search"></i> @lang('app.search')
                    </a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('products.index', ['category' => $category->slug]) }}" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $category->getName() }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($category->children as $child)
                                <li><a class="dropdown-item" href="{{ route('products.index', ['category' => $child->slug]) }}">{{ $child->getName() }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('app.language')
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="{{ route('locale', 'en') }}" class="dropdown-item {{ app()->getLocale() == 'en' ? 'fw-bold' : '' }}">English</a></li>
                        <li><a href="{{ route('locale', 'ru') }}" class="dropdown-item {{ app()->getLocale() == 'ru' ? 'fw-bold' : '' }}">Русский</a></li>
                    </ul>
                </li>
                @auth('customer_web')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('products.index', ['category' => $category->slug]) }}" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth('customer_web')->user()->getName() }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('orders.index') }}">@lang('app.orders')</a></li>
                            <li><a class="dropdown-item" href="{{ route('reviews.index') }}">@lang('app.reviews')</a></li>
                            <li><a class="dropdown-item" href="{{ route('notifications.index') }}">@lang('app.notifications')</a></li>
                            <li><a class="dropdown-item" href="{{ route('gifts.index') }}">@lang('app.gifts')</a></li>
                            <li><a class="dropdown-item" href="{{ route('favorites.index') }}">@lang('app.favorites')</a></li>
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">@lang('app.logout')</a></li>
                        </ul>
                    </li>
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-primary" href="{{ route('login') }}">
                            <i class="bi-box-arrow-in-right"></i> @lang('app.login')
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
