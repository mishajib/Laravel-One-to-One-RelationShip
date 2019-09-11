@extends('layouts.app')

@section('site-title', 'One to One RelationShip')


@section('header-title', 'ONE TO ONE RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">View All Ticket</h3>
            <a href="{{ route('ticket.create') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Add New</a>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px; margin-right: 100px;">Back</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if (!empty($tickets))
                        @foreach($tickets as $key=>$ticket)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $ticket->movie_ticket_id }}</td>
                                <td>
                                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <button onclick="deleteTicket({{ $ticket->id }})" class="btn btn-danger" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $ticket->id }}" action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No data found!!</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deleteTicket(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
