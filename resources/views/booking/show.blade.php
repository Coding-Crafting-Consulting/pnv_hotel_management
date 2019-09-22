@extends('_layouts.app')




@section('content')

  <div class="d-none my-margin-bottom-19" id="my-user-discard-picture-status"></div>


  <div class="my-frame">

    <div class="row">
      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex">
          <b class="my-padding-right-19 my-booking-icon">Customer</b>
          <i>{!! $booking["user"]["first_name"] !!}
              {!! $booking["user"]["middle_name"] !!}
              {!! $booking["user"]["last_name"] !!}
          </i>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex">
          <b class="my-padding-right-19 my-booking-icon">Booking Id</b>
          <i>{!! $booking->id !!}</i>
        </div>
      </div>

      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex">
          <b class="my-padding-right-19">Room nr.</b>
          <i>{!! $booking->room->number !!}</i>
        </div>
      </div>
    </div>


    <div class="d-flex align-items-start my-padding-bottom-12">

      <div class="my-padding-right-19 my-booking-icon"> 
        <i class="far fa-calendar-plus"></i> 
      </div>
      
      <b>Entry Date</b>
      <div>
        {!! $booking->entry_date !!} 
      </div>

    </div>


    <div class="row">
      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex align-items-start">

          <div class="my-padding-right-19 my-user-icon">
            <i class="far fa-calendar-times"></i>
          </div>

          <b>Exit Date</b>
          <div class="my-user-label">
            {!! $booking->exit_date !!}  
          </div>

        </div>
      </div>

      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex align-items-start">

          <div class="my-padding-right-19 my-booking-icon">

            <i class="far fa-dot-circle"></i>
          </div>
          <b>Booking Purpose</b>
          <div class="my-user-label">
            {!! $booking->bookingPurpose->label !!}  
          </div>

        </div>
      </div>
    </div>


    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('bookings.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of bookings</span>
        </a>
      </div>

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('bookings.edit', $booking["id"]) !!}" class="btn btn-sm btn-outline-primary">
          <i class="far fa-edit my-margin-right-12"></i>
          <span>Edit</span>
        </a>
      </div>

    </div>
  </div>

@endsection