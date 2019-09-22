@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',
    ['title' => "Reservations", 'route' => route('bookings.create'), 'buttonLabel' => "Add a reservation"]
  )

@endsection


@section('content')

@foreach($bookingPurposes as $bookingPurpose)

@if (count($bookingPurpose->bookings) > 0)

<div class="my-booking-purpose">

   <h4 class="my-margin-bottom-19 my-margin-top-40 my-border-bottom">
    <strong>
      <em>{!! $bookingPurpose->label !!}</em>
    </strong>
  </h4> 


  <div class="row">

    @foreach($bookingPurpose->bookings as $booking)

      <div class="col-md-6 col-lg-4 my-padding-bottom-19 my-filter-object my-booking">
        <div class="my-frame">
          <div class="my-padding-bottom-12 my-filter-target">
            <div>Customer id: {!! $booking->user->id !!}</div>
            <div>Customer name: {!! $booking->user->first_name !!}
            {!! $booking->user->last_name !!}</div>
            <div>Room nr.: {!! $booking->room->number!!}</div>
            
          </div>

          <div class="d-flex flex-wrap">

            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('bookings.show', $booking["id"]) !!}" class="btn btn-sm btn-outline-dark">
                <div class="d-flex align-items-center">
                  <div class="my-margin-right-12 my-action-button-icon">
                    <i class="fas fa-eye"></i>
                  </div>

                  <div class="my-action-button-label text-left">
                    Detail
                  </div>
                </div>
              </a>
            </div>

            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('bookings.edit', $booking["id"]) !!}" class="btn btn-sm btn-outline-primary">
                <div class="d-flex align-items-center">
                  <div class="my-margin-right-12 my-action-button-icon">
                    <i class="far fa-edit"></i>
                  </div>

                  <div class="my-action-button-label text-left">
                    Edit
                  </div>
                </div>
              </a>
            </div>


          
              <div class="my-padding-bottom-8">
                <button
                  class="btn btn-sm btn-danger my-booking-delete"
                  data-token="{!! csrf_token() !!}"
                  data-url="{!! route('bookings.destroy', $booking['id']) !!}"
                >
                  <div class="d-flex align-items-center">
                    <div class="my-margin-right-12 my-action-button-icon">
                      <i class="far fa-trash-alt"></i>
                    </div>

                    <div class="my-action-button-label text-left">
                      Delete
                    </div>
                  </div>
                </button>
              </div>
           

          </div>
        </div>
      </div>

    @endforeach

  </div>

</div>

@endif

@endforeach

@endsection