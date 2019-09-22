@if($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <div>{!! $error !!}</div>
    @endforeach
  </div>
@endif


<form
  action="{!! $action !!}"
  method="post"
  enctype="multipart/form-data"
>
  @csrf

  @if($booking['id'] != NULL)
    @method('PATCH')
    <input type="hidden" name="id" value="{!! $booking['id'] !!}">
  @endif 


  @if(Auth::check() && Auth::user()->hasAdminRights())

    <div class="row my-padding-bottom-19">
      <div class="col-md-3 col-lg-4 my-padding-bottom-8">
        <label for="booking_type_id">Booking type:<label>
      </div>

      <div class="col-md-9 col-lg-8 my-padding-bottom-8">
        <select name="booking_type_id" class="form-control" id="booking_type_id">

          @foreach ($bookingTypes as $bookingType)
            <option
              value="{!! $bookingType['id'] !!}"
              {!!
                  old (
                    'booking_type_id',
                    isset($booking) && $booking['booking_type_id'] == $bookingType['id'] ? 'selected' : NULL 
                  )
              !!}
            >
              @if($bookingType['online_plateform_id'])
                {!! $bookingType->onlinePlateform->label !!}
              
              @else
                {!! $bookingType['label'] !!}
              
              @endif
            </option>
          @endforeach

        </select>
      </div>
    </div>


  @elseif(Auth::check())

    <!-- Value 7 = Website -->
    <input type="hidden" name="booking_type_id" value="7">

  
  @endif


  @if(Auth::check() && Auth::user()->hasAdminRights())
  
    <div class="row my-padding-bottom-19">
      <div class="col-md-3 col-lg-4 my-padding-bottom-8">
        <label for="user_id">User:<label>
      </div>

      <div class="col-md-9 col-lg-8 my-padding-bottom-8">
        <select name="user_id" class="form-control" id="user_id">

          @foreach ($users as $user)
            <option
              value="{!! $user['id'] !!}"
              {!!
                  old (
                    'user_id',
                    isset($booking) && $booking['user_id'] == $user['id'] ? 'selected' : NULL 
                  )
              !!}
            >
              {!! $user->fullName() !!}
            </option>
          @endforeach

        </select>
      </div>
    </div>


  @elseif(Auth::check())

    <input type="hidden" name="user_id" value="{!! Auth::id() !!}">

  
  @endif


   <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="room_id">Room nr.:<label>
    </div>

    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      @isset($room)
        {!! $room->number !!}
        <input type="hidden" name="room_id" value="{!! $room->id !!}">

      @else  
      
        <select name="room_id" class="form-control" id="room_id">

          @foreach ($rooms as $room)
            <option
              value="{!! $room['id'] !!}"
              {!!
                  old (
                    'room_id',
                    isset($booking) && $booking['room_id'] == $room['id'] ? 'selected' : NULL 
                  )
              !!}
            >
              {!! $room->number !!}
            </option>
          @endforeach

        </select>


      @endisset
    </div>
  </div>
      
  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="entry_date">Entry date:<label>
    </div>

    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        placeholder="yyyy-mm-dd"
        id="entry_date"
        type="text"
        autocomplete="off"
        class="form-control datepicker"
        name="entry_date"
        value="{!! old ('entry_date',isset($booking)?$booking['entry_date']:NULL) !!}"
      >
    </div>
  </div> 
  
  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="exit_date">Exit date:<label>
    </div>

    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        placeholder="yyyy-mm-dd"
        id="exit_date"
        type="text"
        autocomplete="off"
        class="form-control datepicker"
        name="exit_date"
        value="{!! old ('exit_date',isset($booking)?$booking['exit_date']:NULL) !!}"
      >
    </div>
  </div> 


  @if(Auth::check() && Auth::user()->hasAdminRights())

    <div class="row my-padding-bottom-19">
      <div class="col-md-3 col-lg-4 my-padding-bottom-8">
        <label for="room_is_paid">Is paid: <label>
      </div>
      
      <div class="col-md-9 col-lg-8 my-padding-bottom-8">
        <input
          type="checkbox"
          id="room_is_paid"
          name="is_paid"
          @if (isset($booking) && $booking->is_paid)
            checked="checked"
          @endif
          value="1"
        >
      </div>
    </div>

  @endif


  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label  >Booking purpose:<label>
    </div>

    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <select name="booking_purpose_id" class="form-control" id="booking_purpose_id">

        @foreach ($bookingPurposes as $bookingPurpose)
          <option
            value="{!! $bookingPurpose['id'] !!}"
            {!!
                old (
                  'booking_purpose_id',
                  isset($booking) && $booking['booking_purpose_id'] == $bookingPurpose['id'] ? 'selected' : NULL 
                )
            !!}
          >
            {!! $bookingPurpose['label'] !!}
          </option>
        @endforeach

      </select>
    </div>
  </div>


  <!-- button Save -->

  <div class="row">
    <div class="col-md-3 col-lg-4"></div>

    <div class="col-md-9 col-lg-8">

      {{-- if user has admin rights and is not editing him/herself --}}
      @if (Auth::check() && Auth::user()->hasAdminRights() && Auth::id() != $user->id)

        <a
          href="{!! route('bookings.index') !!}"
          class="btn btn-sm btn-outline-dark my-margin-right-8 my-margin-bottom-8"
        >
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of bookings</span>
        </a>


      @else

        <a
          href="{!! url('/') !!}"
          class="btn btn-sm btn-outline-dark my-margin-right-8 my-margin-bottom-8"
        >
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to the welcome page</span>
        </a>


      @endif


      <button
        type="submit"
        class="btn btn-sm btn-success my-margin-bottom-8"
      >
        <i class="fas fa-check-circle"></i>
        <span>Save</span>
      </button>
    </div>
  </div>

</form>