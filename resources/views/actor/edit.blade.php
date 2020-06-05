@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
        <actor-form :is-editable="true" :current-actor="{{$actor}}"></actor-form>
        </div>
    </section>
@endsection
