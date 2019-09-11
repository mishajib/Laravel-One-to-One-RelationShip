@extends('layouts.app')

@section('site-title', 'One to One RelationShip')


@section('header-title', 'ONE TO ONE RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Insert Data</h3>
            <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="ticket" class="col-sm-2 col-form-label">Movie Ticket</label>
                    <div class="col-sm-10">
                        <input type="text" name="ticket" class="form-control" id="ticket" value="{{ $ticket->movie_ticket_id }}" placeholder="Ticket">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="person" class="col-sm-2 col-form-label">Person</label>
                    <div class="col-sm-10">
                        <select name="person" id="person" class="custom-select my-1 mr-sm-2">
                            <option selected disabled>Choose...</option>
                            @if (!empty($persons))
                                @foreach($persons as $person)
                                    <option {{ $ticket->person_id == $person->id ? 'selected':'' }} value="{{ $person->id }}">{{ $person->name }}</option>
                                @endforeach
                            @else
                                <option disabled>No data found!!</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <form/>
        </div>
    </div>
@endsection
