@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <films :all-Films="{{$film}}"></films>
        </div>
    </section>
@endsection
