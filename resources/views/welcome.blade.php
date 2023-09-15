@extends('template.master')

@section('page-title', 'Welcome to Dashboard Page')

@section('page-content')

    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-12">
            <div class="card shadow rounded p-3">
                <h1 class="text-primary">{{ __('Welcome to Dashboard Pages') }}</h1>
            </div>
        </div>
    </div>

@endsection
