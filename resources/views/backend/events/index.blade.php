@extends('backend.layouts.app')
@section('title', 'Events')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Events
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Events</a></li>
                                </ol>
                            </nav>
                        </div>



                    </div>
                    <div class="row">
                        {{-- <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 mb-2">
                            <div class="">
                                <form class="form-inline row px-4 pa_form_responsive" action="{{ route('backend.category.index') }}" method="GET">
                                    <input class="form-control form-control-sm pa_form_input" type="text"
                                        placeholder="Search By MRD/Name/Mobile" name="q"
                                        value="{{ request('q') ?? '' }}" minlength="3" maxlength="40">
                                    <input type="submit" value="Search" class="btn btn-success  ml-0 ml-lg-4 ml-md-4 ml-sm-4  search_btn_size pa_search_btn">
                                </form>
                                @if ($errors->has('q'))
                                    <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 mb-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
                <div class="">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Vanue</th>
                                        <th>Available Seats</th>
                                        <th>Book Tickets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                        <tr class="event-box" data-id="{{ $event->id }}">
                                            <td>{{ tableRowSrNo($loop->index, $events) }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ dd_format($event->date, 'd-m-Y') }}</td>
                                            <td>{{ $event->venue }}</td>
                                            <td class="seats">{{ $event->available_seats }}</td>
                                            <td>
                                                <button class="book-btn btn btn-primary" data-id="{{ $event->id }}"
                                                    {{ $event->available_seats == 0 ? 'disabled' : '' }}>
                                                    Book Ticket
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $events->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.book-btn').on('click', function() {
            const eventId = $(this).data('id');
            const row = $(`tr[data-id="${eventId}"]`);
            const button = $(this);

            $.ajax({
                url: `/event/${eventId}/ajax-book`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(res) {
                    if (res.success === true) {
                        row.find('.seats').text(res.available_seats); // ✅ Updates seats
                        Snackbar.show({
                            text: res.message,
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#1abc9c'
                        });

                        if (res.available_seats == 0) {
                            button.prop('disabled', true);
                        }
                    } else {
                        Snackbar.show({
                            text: res.message,
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e74c3c'
                        });
                    }
                },
                error: function() {
                    Snackbar.show({
                        text: 'An error occurred.',
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#e74c3c'
                    });
                }
            });
        });
    </script>
@endsection
