@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => $equipment["label"]]
  )

@endsection


@section('content')

  <div class="my-frame">
    <div class="my-padding-bottom-12">
      Id: {!! $equipment["id"] !!}
    </div>

    @if (count($equipment->rooms) > 0)
      <div class="my-padding-bottom-19">
        <div class="d-flex flex-wrap">
          @foreach($equipment->rooms as $room)

            <div class="my-padding-bottom-8 my-padding-right-40">
              <div class="d-flex align-items-center text-info">
                <div class="my-margin-right-19 my-equipment-room-icon">
                  <i class="fas fa-bed"></i>
                </div>

                <div class="my-equipment-room-label">
                  <i>{!! $room->number !!}</i>
                </div>
              </div>
            </div>
          
          @endforeach
        </div>
      </div>
    @endif
    
    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('equipment.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of equipment</span>
        </a>
      </div>
      
      <div class="my-padding-bottom-8">
        <a href="{!! route('equipment.edit', $equipment["id"]) !!}" class="btn btn-sm btn-outline-primary">
          <i class="far fa-edit my-margin-right-12"></i>
          <span>Edit</span>
        </a>
      </div>

    </div>
  </div>

@endsection