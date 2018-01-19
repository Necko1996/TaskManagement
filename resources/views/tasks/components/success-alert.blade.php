@if ( $flash = session('success-message'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
@endif