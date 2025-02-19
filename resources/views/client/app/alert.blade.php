@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show fw-semibold my-3" role="alert">
        <i class="bi-check-circle-fill"></i> {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(isset($success))
    <div class="alert alert-success alert-dismissible fade show fw-semibold my-3" role="alert">
        <i class="bi-check-circle-fill"></i> {!! $success !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show fw-semibold my-3" role="alert">
        <i class="bi-x-circle-fill"></i> {!! session('error') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(isset($error))
    <div class="alert alert-danger alert-dismissible fade show fw-semibold my-3" role="alert">
        <i class="bi-x-circle-fill"></i> {!! $error !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif($errors->any())
    <div class="alert alert-danger alert-dismissible fade show fw-semibold my-3" role="alert">
        @foreach($errors->all() as $error)
            <div><i class="bi-x-circle-fill"></i>  {{ $error }}</div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
