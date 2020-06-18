@extends('layouts.app')


@section('content')
    <section class="section">
        <films :all-Films="{{$film}}"></films>
    </section>
@endsection
