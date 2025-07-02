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

                                    <h4>Events</h4>



                                </div>

                                {{-- @dd($data) --}}

                            </div>

                            {{-- @dd($data) --}}

                            <div class="card-body table-striped table-bordered table-responsive">

                                <a class="btn btn-primary mb-3"

                                href="{{route('admin.user.index')}}">Back</a>

                                <a class="btn btn-success mb-3"

                                       href="{{route('recruiter.event.add.index',$data['user_id'])}}">Add Event</a>

                                <table class="table" id="table_id_events">

                                    <thead>

                                        <tr>

                                            <th>Sr.</th>

                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>About</th>
                                            <th>Description</th>
                                            <th>Event Type</th>
                                            <th>Joining Type</th>
                                            {{-- <th>Hiring Entertainer Status</th> --}}
                                            <th>Seats</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Feature Ads</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Created at</th>
                                            <th scope="col">Actions</th>
                                            {{-- <th scope="col">Action</th> --}}

                                        </tr>

                                    </thead>

                                    <tbody>

                                     @foreach($data['recruiter_event'] as $event)

                                            {{-- @dd($entertainer->title) --}}

                                            <tr>

                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $event->title }}</td>
                                                <td>
                                                    <img src="{{ asset($event->cover_image) }}" alt="" height="50"
                                                        width="50" class="image">
                                                </td>

                                                <td>{{ $event->about_event }}</td>

                                                <td>{{ $event->description }}</td>

                                                <td>{{ $event->event_type }}</td>

                                                <td>{{ $event->joining_type }}</td>

                                                {{-- <td>{{ $event->hiring_entertainers_status }}</td> --}}

                                                <td>{{ $event->seats }}</td>

                                                <td>${{ $event->price }}</td>

                                                <td>{{ $event->date }}</td>

                                                @if (isset($event->eventFeatureAdsPackage->title))

                                                @if (str_contains($event->eventFeatureAdsPackage->title,'Silver'))

                                                    <th>

                                                        <button type="button" class="btn btn-secondary"

                                                            style="background-color: silver; border-color: silver">{{ $event->eventFeatureAdsPackage->title }}</button>

                                                    </th>

                                                @elseif (str_contains($event->eventFeatureAdsPackage->title,'Gold'))

                                                    <th>

                                                        <button type="button" class="btn btn-secondary"

                                                            style="background-color: gold; border-color: gold">{{ $event->eventFeatureAdsPackage->title }}

                                                            </button>

                                                    </th>

                                                @else

                                                    <th>

                                                        <button type="button" class="btn btn-secondary" style="background-color: purple; border-color: purple">{{ $event->eventFeatureAdsPackage->title }}</button>

                                                    </th>

                                                @endif

                                                @else

                                                <th><button class="btn btn-danger">Unfeatured</button></th>

                                               @endif



                                                @if( explode(':',$event->from)[0]>=12)

                                                <td>{{ $event->from }} PM</td>

                                                @else

                                                 <td>{{ $event->from }} AM</td>

                                                @endif

                                                @if( explode(':',$event->to)[0]>=12)

                                                <td>{{ $event->to }} PM</td>

                                                @else

                                                 <td>{{ $event->to }} AM</td>

                                                @endif

                                               <td>{{ $event->created_at }}</td>



                                                <td

                                                style="display: flex;align-items: center;justify-content: center;column-gap: 8px">

                                                <a class="btn btn-success"

                                               href="{{route('recruiter.event_entertainers.index',['user_id'=>$data['user_id'],'event_id'=>$event->id])}}">Entertainer</a>

                                               <a class="btn btn-primary"

                                               href="{{route('recruiter.event_venues.index', ['user_id'=>$data['user_id'],'event_id'=>$event->id])}}">Venue</a>



                                                <a class="btn btn-info"

                                               href="{{route('recruiter.event.edit.index', ['user_id'=>$data['user_id'],'event_id'=>$event->id])}}">Edit</a>

                                                        <form method="get" action="{{ route('recruiter.event.delete', $event->id) }}">

                                                            @csrf

                                                            <input name="_method" type="hidden" value="DELETE">

                                                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" >Delete</button>

                                                        </form>

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



@section ('scripts')

@if (\Illuminate\Support\Facades\Session::has('message'))

<script>

    toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');

</script>

@endif

<script>

    $(document).ready(function(){

        $('#table_id_events').DataTable()



    })

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">



$('.show_confirm').click(function(event) {

          var form =  $(this).closest("form");

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

