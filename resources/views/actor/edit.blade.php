@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
        </div>
        <actor-form :is-editable="true" :current-actor="{{$actor}}"></actor-form>
    </section>
@endsection
