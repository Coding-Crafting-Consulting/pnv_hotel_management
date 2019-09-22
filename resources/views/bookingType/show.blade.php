@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => $bookingType["label"]]
  )

@endsection

 

@section('content')

  <div class="my-frame">

    @if ($bookingType->online_plateform_id == NULL)
      <div class="my-padding-bottom-12">
        Id: {!! $bookingType["id"] !!}
      </div>
    @else
      <div class="my-padding-bottom-12">
        Id: {!! $bookingType["id"] !!}
      </div>
      <div class="my-padding-bottom-12">
        Id: {!! $bookingType->onlinePlateform->label !!}
      </div>
    @endif
    
    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('bookingTypes.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of booking types</span>
        </a>
      </div>
      
      <div class="my-padding-bottom-8">
        <a href="{!! route('bookingTypes.edit', $bookingType["id"]) !!}" class="btn btn-sm btn-outline-primary">
          <i class="far fa-edit my-margin-right-12"></i>
          <span>Edit</span>
        </a>
      </div>

    </div>
  </div>

@endsection