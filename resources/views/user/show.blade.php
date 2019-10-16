@extends('_layouts.none')

@section('content')

  <h3 class="text-center">
    {!! $user["title"]["label"].' '. $user["first_name"].' '.$user["last_name"].' '.$user["middle_name"] !!}
  </h3>

  <div class="d-none my-margin-bottom-19" id="my-user-discard-picture-status"></div>


  <div class="row">
    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex">
        <b class="my-padding-right-19 my-user-icon">Id</b>
        <i>{!! $user->id !!}</i>
      </div>
    </div>

    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex">
        <b class="my-padding-right-19">User type</b>
        <i>{!! $user->userType->label !!}</i>
      </div>
    </div>
  </div>


  <div class="d-flex align-items-start my-padding-bottom-12">

    <div class="my-padding-right-19 my-user-icon">
      <i class="fas fa-passport"></i>
    </div>

    <div>
      {!! $user->identificationType->label !!} n° {!! $user["identification_number"] !!} 
    </div>

  </div>


  <div class="row">
    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex align-items-start">

        <div class="my-padding-right-19 my-user-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>

        <div class="my-user-label">
          {!! $user->date_of_birth !!}  
        </div>

      </div>
    </div>

    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex align-items-start">

        <div class="my-padding-right-19 my-user-icon">
          <i class="fas fa-globe-asia"></i>
        </div>

        <div class="my-user-label">
          {!! $user->country->label !!}  
        </div>

      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex align-items-start">

        <div class="my-padding-right-19 my-user-icon">
          <i class="fas fa-phone"></i>
        </div>

        <div class="my-word-break my-user-label">
          {!! $user->phone !!}  
        </div>

      </div>
    </div>

    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex align-items-start">

        <div class="my-padding-right-19 my-user-icon">
          <i class="fas fa-at"></i>
        </div>

        <div class="my-word-break my-user-label">
          {!! $user->email !!}  
        </div>

      </div>
    </div>
  </div>


  <div class="my-margin-top-19 my-padding-top-19 my-border-top">
  </div>


  <div class="row">
    <div class="col-sm-6 my-padding-bottom-12">
      <div class="d-flex align-items-start">

        <div class="my-padding-right-19 my-user-icon">
          <i class="fas fa-map-signs"></i>
        </div>

        <div class="my-user-label">
          <i>{!! str_replace("\n","<br>", $user->address) !!}</i>
        </div>

      </div>
    </div>

    @isset($user['information'])
      <div class="col-sm-6 my-padding-bottom-12">
        <div class="d-flex align-items-start">

          <div class="my-padding-right-19 my-user-icon">
            <i class="fas fa-info-circle"></i>
          </div>

          <div class="my-user-label">
            <em>{!! str_replace("\n","<br>", $user->information) !!}</em>
          </div>

        </div>
      </div>
    @endisset
  </div>


  @if (count($user->companies) > 0)
    <div class="my-padding-bottom-19 my-margin-top-19 my-padding-top-19 my-border-top">
      <div class="d-flex flex-wrap">
        @foreach($user->companies as $company)

          <div class="my-padding-bottom-8 my-padding-right-40">
            <div class="d-flex align-items-start text-info">
              <div class="my-margin-right-19 my-user-company-icon">
                <i class="fas fa-industry"></i>
              </div>

              <div class="my-user-company-label">
                <i>{!! $company->label !!}</i>
              </div>
            </div>
          </div>
        
        @endforeach
      </div>
    </div>
  @endif
  
  <div class="d-flex flex-wrap">
    <button
      class="btn btn-sm btn-outline-dark"
      data-action="user#hide"
    >
      <i class="fas fa-eye-slash my-margin-right-12"></i>
      <span>Hide</span>
    </button>
  </div>

@endsection