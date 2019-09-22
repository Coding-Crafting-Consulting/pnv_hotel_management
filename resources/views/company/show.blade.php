@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => $company["label"]]
  )

@endsection


@section('content')

  <div class="d-none my-margin-bottom-19" id="my-room-discard-picture-status"></div>

  <div class="my-frame">
    
    <div class="my-padding-bottom-19">
      Id: {!! $company["id"] !!}
    </div>

    @if (count($company->users) > 0)
      <div class="my-padding-bottom-19">
        <div class="d-flex flex-wrap">
          @foreach($company->users as $user)

            <div class="my-padding-bottom-8 my-padding-right-40">
              <div class="d-flex align-items-center text-info">
                <div class="my-margin-right-19 my-company-user-icon">
                  <i class="fas fa-user"></i>
                </div>

                <div class="my-company-user-label">
                  <i>
                    {!! $user->title->label !!}
                    {!! $user->last_name !!}
                    {!! $user->middle_name !!}
                    {!! $user->first_name !!}
                  </i>
                </div>
              </div>
            </div>
          
          @endforeach
        </div>
      </div>
    @endif

    <div class="d-flex flex-wrap">

      <div class="my-padding-right-8 my-padding-bottom-8">
        <a href="{!! route('companies.index') !!}" class="btn btn-sm btn-outline-dark">
          <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
          <span>Back to list of companies</span>
        </a>
      </div>
      
      <div class="my-padding-bottom-8">
        <a href="{!! route('companies.edit', $company["id"]) !!}" class="btn btn-sm btn-outline-primary">
          <i class="far fa-edit my-margin-right-12"></i>
          <span>Edit</span>
        </a>
      </div>

    </div>
  </div>

@endsection