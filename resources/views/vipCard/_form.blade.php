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
  class="my-margin-top-40"
>
  @csrf

  @if($vipCard['id'] != NULL)
    @method('PATCH')
    <input type="hidden" name="id" value="{!! $vipCard['id'] !!}">
  @endif 
  
  <div class="row my-padding-bottom-19">
  
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="vip_card_user_id">User:<label>
    </div>

    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">

      @if($vipCard->id)

        <input type="hidden" name="user_id" value="{!! $vipCard->user_id !!}">

        <span>
          {!! $vipCard->user->title->label !!}
          {!! $vipCard->user->first_name !!}
          {!! $vipCard->user->middle_name !!}
          {!! $vipCard->user->last_name !!}
        </span>
      

      @else
      
        <select name="user_id" class="form-control" id="vip_card_user_id">
          
          @foreach ($users as $user)
            <option
              value="{!! $user['id'] !!}"
              {!!
                  old (
                    'user_id',
                    isset($vipCard) && $vipCard['user_id'] == $user['id'] ? 'selected' : NULL )
              !!}
            >
              {!! $user->title->label !!}
              {!! $user->first_name !!}
              {!! $user->middle_name !!}
              {!! $user->last_name !!}
            </option>
          @endforeach

        </select>


      @endif

    </div>
  
  </div>
  

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="vip_card_name">Point:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        id="vip_card_name"
        type="number"
        class="form-control"
        name="point"
        value="{!! old ('point',isset($vipCard)?$vipCard['point']:0) !!}"
      >
    </div>
  </div>


  <!-- button Save -->
  <div class="row">
    <div class="col-md-3 col-lg-4"></div>

    <div class="col-md-9 col-lg-8">
      <a
        href="{!! route('vipCards.index') !!}"
        class="btn btn-sm btn-outline-dark my-margin-right-8 my-margin-bottom-8"
      >
        <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
        <span>Back to list of VIP cards</span>
      </a>

      <button
        type="submit"
        class="btn btn-sm btn-success {!! isset($vipCard['image']) ? ' my-margin-right-8 ' : '' !!}my-margin-bottom-8"
      >
        <i class="fas fa-check-circle my-margin-right-12"></i>
        <span>Save</span>
      </button>

    </div>
  </div>

</form>