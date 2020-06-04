@extends('layouts.app')


@section('content')
    <section class="section">
        <actors :all-Actors="{{$actor}}" >
        </actors>
    </section>
@endsection
