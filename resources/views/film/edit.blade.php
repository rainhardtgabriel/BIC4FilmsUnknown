@extends('layouts.app')


@section('content')
    <section class="section">
        <film-form :is-editable="true" :current-film="{{$film}}"></film-form>
    </section>
@endsection
