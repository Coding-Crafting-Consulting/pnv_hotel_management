@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',
    ['title' => "Online booking plateforms", 'route' => route('onlinePlateforms.create'), 'buttonLabel' => "Add an online plateform"]
  )

@endsection


@section('content')

  <div class="row">

    @foreach($onlinePlateforms as $onlinePlateform)

      <div class="col-md-6 col-lg-4 my-padding-bottom-19 my-filter-object my-online-plateform">
        <div class="my-frame">
          <div class="my-padding-bottom-12 my-filter-target">
            {!! $onlinePlateform["label"] !!}
          </div>
          
          <div class="d-flex flex-wrap">

            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('onlinePlateforms.show', $onlinePlateform["id"]) !!}" class="btn btn-sm btn-outline-dark">
                <i class="fas fa-eye my-margin-right-12"></i>
                <span>Detail</span>
              </a>
            </div>
            
            <div class="my-padding-right-8 my-padding-bottom-8">
              <a href="{!! route('onlinePlateforms.edit', $onlinePlateform["id"]) !!}" class="btn btn-sm btn-outline-primary">
                <i class="far fa-edit my-margin-right-12"></i>
                <span>Edit</span>
              </a>
            </div>

            <div class="my-padding-bottom-8">
              <button
                class="btn btn-sm btn-danger my-online-plateform-delete"
                data-token="{!! csrf_token() !!}"
                data-url="{!! route('onlinePlateforms.destroy', $onlinePlateform['id']) !!}"
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