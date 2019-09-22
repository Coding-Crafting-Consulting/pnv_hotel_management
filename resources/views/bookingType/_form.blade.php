@if($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <div>{!! $error !!}</div>
    @endforeach
  </div>
@endif


<form
  action="{!! $action !!}"
  method="post"
  enctype="multipart/form-data"
>
  @csrf

  @if($bookingType['id'] != NULL)
    @method('PATCH')
    <input type="hidden" name="id" value="{!! $bookingType['id'] !!}">
  @endif 
  
  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="label">Booking type:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        id="label"
        type="text"
        class="form-control"
        name="label"
        value="{!! old ('label',isset($bookingType)?$bookingType['label']:NULL) !!}"
      >
    </div>
  </div>


  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="online_flateform_id">Online plateform:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <select name="online_plateform_id" class="form-control" id="online_plateform_id">
        <option value=""></option>
        @foreach ($onlinePlateforms as $onlinePlateform)
          <option
            value="{!! $onlinePlateform['id'] !!}"
            {!!
                old (
                  'online_plateform_id',
                  isset($bookingType) && $bookingType['online_plateform_id'] == $onlinePlateform['id'] ? 'selected' : NULL 
                )
            !!}
          >
            {!! $onlinePlateform['label'] !!}
          </option>
        @endforeach

      </select>
    </div>
  </div> 

  <!-- button Save -->
  <div class="row">
    <div class="col-md-3 col-lg-4"></div>

    <div class="col-md-9 col-lg-8">
      <a
        href="{!! route('bookingTypes.index') !!}"
        class="btn btn-sm btn-outline-dark my-margin-right-8 my-margin-bottom-8"
      >
        <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
        <span>Back to list of booking types</span>
      </a>

      <button
        type="submit"
        class="btn btn-sm btn-success my-margin-bottom-8"
      >
        <i class="fas fa-check-circle my-margin-right-12"></i>
        <span>Save</span>
      </button>
    </div>
  </div>

</form>