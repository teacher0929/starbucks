<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="bi-cup-hot"></i>
            @lang('app.appName')
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                @foreach(['Home', 'About', 'Contact'] as $link)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ $link }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
