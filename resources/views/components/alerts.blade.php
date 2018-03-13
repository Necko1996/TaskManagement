@if ( $flash = session('success-message'))
    <div id="success-message" class="alert alert-success success-message" role="alert">
        {{ $flash }}
    </div>
@elseif( $flash = session('error-message'))
    <div id="error-message" class="alert alert-danger error-message" role="alert">
        {{ $flash }}
    </div>
@endif