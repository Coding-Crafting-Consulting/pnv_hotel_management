@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.header',
    ['title' => $vipCard["user"]["title"]["label"]
    .' '.$vipCard["user"]["first_name"]
    .' '. $vipCard["user"]["middle_name"]
    .' '. $vipCard["user"]["last_name"]
    ]
  )

@endsection


@section('content')

  <div class="d-none my-margin-top-40 my-margin-bottom-19" id=""></div>

  <div class="my-margin-top-40 my-frame">
    <div class="my-padding-bottom-12">
      Id: {!! $vipCard["user_id"] !!}
    </div>
    <div class="my-padding-bottom-12">
      User Id: {!! $vipCard["id"] !!}
    </div>
    <div class="my-padding-bottom-12">
      Point: {!! $vipCard["point"] !!}
    </div>

    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('vipCards.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of vip cards</span>
        </a>
      </div>
      
      <div class="my-padding-bottom-8">
        <a href="{!! route('vipCards.edit', $vipCard["id"]) !!}" class="btn btn-sm btn-outline-primary">
          <i class="far fa-edit my-margin-right-12"></i>
          <span>Edit</span>
        </a>
      </div>
    </div>

  </div>

@endsection