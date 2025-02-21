<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="bi-cup-hot"></i>
            @lang('app.appName')
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            @auth
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="{{ route('admin.orders.index') }}">
                            @lang('app.orders')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="{{ route('admin.reviews.index') }}">
                            @lang('app.reviews')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="{{ route('admin.customers.index') }}">
                            @lang('app.customers')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.verifications.index') }}">
                            @lang('app.verifications')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.notifications.index') }}">
                            @lang('app.notifications')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.gifts.index') }}">
                            @lang('app.gifts')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">
                            @lang('app.products')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">
                            @lang('app.categories')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            @lang('app.users')
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link link-primary" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                            <i class="bi-box-arrow-right"></i> @lang('app.logout')
                        </a>
                    </li>
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout">
                        @csrf
                    </form>
                </ul>
            @endauth
        </div>
    </div>
</nav>
