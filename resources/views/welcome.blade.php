@extends('layouts.app')

@section('site-title', 'One to One RelationShip')


@section('header-title', 'ONE TO ONE RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">View All Data</h3>
            <a href="{{ route('create') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Add New</a>
            <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right" style="margin-top: -40px; margin-right: 100px;">Ticket</a>
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
                    @foreach($persons as $key=>$person)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $person->name }}</td>
                            <td>
                                <a href="{{ route('edit', $person->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button onclick="deletePerson({{ $person->id }})" class="btn btn-danger" type="button">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $person->id }}" action="{{ route('destroy', $person->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <a href="{{ route('show', $person->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deletePerson(id) {
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
