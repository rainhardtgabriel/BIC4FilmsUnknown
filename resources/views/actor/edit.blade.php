@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>Edit actor</h1>
        </div>
        <actor-form :is-editable="true" :current-actor="{{$actor}}"></actor-form>
    </section>
@endsection
