@extends('layouts.app')

@section('site-title', 'One to One RelationShip')


@section('header-title', 'ONE TO ONE RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Show Data</h3>
            <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <h1>Ticket: {{ $ticket->movie_ticket_id }}</h1>
            <h3>Person Name: {{ $ticket->person->name }}</h3>
            <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
