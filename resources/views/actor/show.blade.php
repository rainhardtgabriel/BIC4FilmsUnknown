@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <actor :passed-actor="{{$actor}}"  ></actor>
        </div>
    </section>
@endsection
