@extends('layouts.app')


@section('content')
<section class="section">
    <div class="container">
        <film :passed-film="{{$film}}"></film>
    </div>
</section>
@endsection