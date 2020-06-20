@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="{{asset('img/Logo.png')}}" width="550">
                <h1 class="title has-text-centered">
                    {{ env('APP_TITLE', 'Sample application') }}
                </h1>
            </div>
        </div>
    </section>
@endsection
