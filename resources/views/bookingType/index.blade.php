@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',
    ['title' => "Booking types", 'route' => route('bookingTypes.create'), 'buttonLabel' => "Add a booking type "]
  )

@endsection

@section('content')

  <div class="row">

    @foreach($bookingTypes as $bookingType)

      <div class="col-md-6 col-lg-4 my-padding-bottom-19 my-filter-object my-booking-type">
        <div class="my-frame">
          <div class="my-padding-bottom-12 my-filter-target">
            @if ($bookingType->online_plateform_id == NULL)
              {!! $bookingType["label"] !!}
            @else
              {!! $bookingType->onlinePlateform->label !!}
            @endif
          </div>
          
          <div class="d-flex flex-wrap">

            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('bookingTypes.show', $bookingType["id"]) !!}" class="btn btn-sm btn-outline-dark">
                <i class="fas fa-eye my-margin-right-12"></i>
                <span>Detail</span>
              </a>
            </div>
            
            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('bookingTypes.edit', $bookingType["id"]) !!}" class="btn btn-sm btn-outline-primary">
                <i class="far fa-edit my-margin-right-12"></i>
                <span>Edit</span>
              </a>
            </div>

            <div class="my-padding-bottom-8">
              <button
                class="btn btn-sm btn-danger my-booking-type-delete"
                data-token="{!! csrf_token() !!}"
                data-url="{!! route('bookingTypes.destroy', $bookingType['id']) !!}"
              >
                <i class="far fa-trash-alt my-margin-right-12"></i>
                <span>Delete</span>
              </button>
            </div>

          </div>
        </div>
      </div>

    @endforeach

  </div>

@endsection