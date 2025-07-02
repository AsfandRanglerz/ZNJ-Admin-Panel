@extends('admin.layout.app')

@section('title', 'index')

@section('content')

    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Deleted Events</h4>

                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">

                                    <table class="table" id="table_id_talent">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">User Email</th>
                                                <th scope="col">User Role</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">From</th>
                                                <th scope="col">To</th>
                                                <th scope="col">Venue Title & Email</th>
                                                {{-- <th scope="col">Venue Email</th> --}}
                                                <th scope="col">Entertainers Email</th>




                                                {{-- <th scope="col">Accept</th>
                                                <th scope="col">Reject</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events as $event)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $event->user->name }}</td>
                                                <td>{{ $event->user->email }}</td>
                                                <td>{{ $event->user->role }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->date }}</td>
                                                <td>{{ $event->from }}</td>
                                                <td>{{ $event->to }}</td>

                                                <!-- Loop through event venues -->
                                                <td>
                                                    @foreach($event->eventVenues as $eventVenue)
                                                        {{ $eventVenue->title }}
                                                        <br>,
                                                        {{ $eventVenue->user->email }}
                                                        <br>
                                                    @endforeach
                                                </td>

                                                <!-- Loop through entertainer details -->
                                                <td>
                                                    @foreach($event->entertainerDetails as $eventVenue)
                                                        {{ $eventVenue->user->email }}
                                                        @if (!$loop->last)
                                                            , <!-- Add a comma if it's not the last iteration -->
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table_id_talent').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
