<?php

namespace App\Http\Controllers;

use App\Person;
use App\Ticket;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persons = Person::all();
        return view('ticket.insert', compact('persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'ticket' => 'string|required',
            'person' => 'required'
        ])->validate();

        $ticket = new Ticket();
        $ticket->movie_ticket_id = $request->ticket;
        $ticket->person_id = $request->person;
        $ticket->save();
        Toastr::success('Ticket Successfully Saved :)', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $persons = Person::all();
        return view('ticket.edit', compact('ticket', 'persons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'ticket' => 'string|required',
            'person' => 'required'
        ])->validate();

        $ticket = Ticket::findOrFail($id);
        $ticket->movie_ticket_id = $request->ticket;
        $ticket->person_id = $request->person;
        $ticket->save();
        Toastr::success('Ticket Successfully Updated :)', 'Success');
        return redirect(route('ticket.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        Toastr::success('Ticket Successfully Deleted :)', 'Success');
        return back();
    }
}
