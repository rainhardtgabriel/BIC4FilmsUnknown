@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>Edit film</h1>
        </div>
        <film-form :is-editable="true" :current-film="{{$film}}"></film-form>
    </section>
@endsection
