@extends('layouts.app')

@section('content')
    <section class="section ">
        <div class="container has-text-centered">
        <example-component title="The films about the unkown">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            <p>Welcome <strong>{{ auth()->user()->name }}</strong> </p>
        </example-component><br>
        </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <img src="{{asset('img/Logo.png')}}" width="550">
                    <h1 class="title has-text-centered">
                    </h1>
                </div>
            </div>
        </section>
@endsection
