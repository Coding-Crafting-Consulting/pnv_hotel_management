@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => $room["number"]]
  )

@endsection


@section('content')

  <div class="d-none my-margin-bottom-19" id="my-room-discard-picture-status"></div>

  <div class="my-frame">
    <div class="my-padding-bottom-12">
      Id: {!! $room["id"] !!}
    </div>
    
    <div class="my-padding-bottom-12">
      Room size: {!! strtolower($room->roomSize->label) !!}
    </div>

    <div class="my-padding-bottom-12">
      Room-N°: {!! $room["number"] !!}
    </div>

    <div class="my-padding-bottom-12">
      Smoking is allowed: {!! $room["is_smoking"] ? 'yes' : 'no' !!}
    </div>

    <div class="my-padding-bottom-12">
      @if ($room->price)    
        <b>VNĐ {!! $room->price !!}</b>
      
      @else
        <i>Ask us for the price</i>
      
      @endif
    </div>

    <div class="my-padding-bottom-12">
      Room is available: {!! $room["is_available"] ? 'yes' : 'no' !!}
    </div>

    <div class="my-padding-bottom-12">
      Bed number: {!! $room["beds"] !!}
    </div>

    <!-- roomEquipment -->
    @if (count($room->equipments) > 0)
      <div class="my-padding-bottom-19">Equipment:</div>
      
      <div class="my-padding-bottom-19">
        <div class="d-flex flex-wrap">
          @foreach($room->equipments as $equipment)

            <div class="my-padding-bottom-8 my-padding-right-40">
              <div class="d-flex align-items-center text-info">
                <div class="my-margin-right-19 my-room-equipment-icon">
                  <i class="fas fa-check"></i>
                </div>
                 
                <div class="my-room-equipment-label">
                  <i>{!! $equipment->label !!}</i>
                </div>
              </div>
            </div>   
          @endforeach
        </div>
      </div>
    @endif<!-- endif roomEquiment -->

    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('rooms.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of rooms</span>
        </a>
      </div>
      
      @if(Auth::check() && Auth::user()->hasAdminRights())
        <div class="my-padding-bottom-8">
          <a href="{!! route('rooms.edit', $room['id']) !!}" class="btn btn-sm btn-outline-primary">
            <i class="far fa-edit my-margin-right-12"></i>
            <span>Edit</span>
          </a>
        </div>
      @endif

    </div>
  </div>

@endsection