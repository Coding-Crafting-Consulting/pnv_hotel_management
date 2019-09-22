@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',

    [
      'title'         =>  "Companies",
      'route'         =>  route('companies.create'),
      'buttonLabel'   =>  "Add a company",
      'forceDisplay'  =>  true
    ]
  )

@endsection


@section('content')

  <div class="row">

    @foreach($companies as $company)

      <div class="col-md-6 col-lg-4 my-padding-bottom-19 my-filter-object my-company">
        <div class="my-frame">
          <div class="my-padding-bottom-12 my-filter-target">
            {!! $company["label"] !!}
          </div>
          
          @if (Auth::check() && Auth::user()->hasAdminRights())
          
            <div class="d-flex flex-wrap">

              <div class="my-padding-right-8 my-padding-bottom-8">
                <a href="{!! route('companies.show', $company["id"]) !!}" class="btn btn-sm btn-outline-dark">
                  <i class="fas fa-eye my-margin-right-12"></i>
                  <span>Detail</span>
                </a>
              </div>
              
              <div class="my-padding-right-8 my-padding-bottom-8">
                <a href="{!! route('companies.edit', $company["id"]) !!}" class="btn btn-sm btn-outline-primary">
                  <i class="far fa-edit my-margin-right-12"></i>
                  <span>Edit</span>
                </a>
              </div>

              <div class="my-padding-bottom-8">
                <button
                  class="btn btn-sm btn-danger my-company-delete"
                  data-token="{!! csrf_token() !!}"
                  data-url="{!! route('companies.destroy', $company['id']) !!}"
                >
                  <i class="far fa-trash-alt my-margin-right-12"></i>
                  <span>Delete</span>
                </button>
              </div>

            </div>

          @endif
        
        </div>
      </div>

    @endforeach

  </div>

@endsection