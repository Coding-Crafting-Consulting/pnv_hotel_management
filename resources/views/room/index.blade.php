@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',
    ['title' => "Rooms", 'route' => route('rooms.create'), 'buttonLabel' => "Add a room"]
  )

@endsection


@section('content')

  @foreach($roomSizes as $roomSize)

    @if (count($roomSize->rooms) > 0)
      <div class="my-room-size">
        <h4 class="my-margin-bottom-19 my-margin-top-40 my-border-bottom">
          <strong>
            <em>{!! $roomSize->label !!}</em>
          </strong>
        </h4>


        <div class="row">
        
          @foreach($roomSize->rooms as $room)

            <div class="col-md-6 col-lg-4 my-padding-bottom-19 my-filter-object my-room">
              <div class="my-frame">
                <div class="my-padding-bottom-12 my-filter-target">
                  Room: {!! $room["number"] !!}
                </div>
                
                <div class="d-flex flex-wrap">

                  <div class="my-padding-right-8 my-padding-bottom-8">
                    <a href="{!! route('rooms.show', $room["id"]) !!}" class="btn btn-sm btn-outline-dark">
                      <i class="fas fa-eye my-margin-right-12"></i>
                      <span>Detail</span>
                    </a>
                  </div>

                  @auth
                    <div class="my-padding-right-8 my-padding-bottom-8">
                      <a
                        href="{!! route('bookings.create', ['roomId'=>$room->id]) !!}"
                        class="btn btn-sm btn-warning"
                      >
                        <i class="far fa-hand-pointer my-margin-right-12"></i>
                        <span>Book</span>
                      </a>
                    </div>
                  @endauth
                  
                  @if (Auth::check() && Auth::user()->hasAdminRights())
                    <div class="my-padding-right-8 my-padding-bottom-8">
                      <a href="{!! route('rooms.edit', $room["id"]) !!}" class="btn btn-sm btn-outline-primary">
                        <i class="far fa-edit my-margin-right-12"></i>
                        <span>Edit</span>
                      </a>
                    </div>

                    <div class="my-padding-bottom-8">
                      <button
                        class="btn btn-sm btn-danger my-room-delete"
                        data-token="{!! csrf_token() !!}"
                        data-url="{!! route('rooms.destroy', $room['id']) !!}"
                      >
                        <i class="far fa-trash-alt my-margin-right-12"></i>
                        <span>Delete</span>
                      </button>
                    </div>
                  @endif

                </div>
              </div>
            </div>

          @endforeach

        </div>

      </div>

    @endif

  @endforeach

@endsection