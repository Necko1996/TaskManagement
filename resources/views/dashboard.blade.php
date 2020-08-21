@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
