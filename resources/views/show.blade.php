@extends('layouts.app')

@section('site-title', 'One to One RelationShip')


@section('header-title', 'ONE TO ONE RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Show Data</h3>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            @if (!empty($person))
                <h1>Name: {{ $person->name }}</h1>
            @else
                <h1>Name: No data found!</h1>
            @endif

            @if (!empty($person->ticket))
               <h3>Ticket ID: {{ $person->ticket->movie_ticket_id }}</h3>
            @else
                <h3>Ticket ID: No data found!</h3>
            @endif

            <a href="{{ route('edit', $person->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
