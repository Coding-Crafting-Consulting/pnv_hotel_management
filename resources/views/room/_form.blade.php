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

  @if($room['id'] != NULL)
    @method('PATCH')
    <input type="hidden" name="id" value="{!! $room['id'] !!}">
  @endif 
  
  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="room_room_size_id">Room size:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <select name="room_size_id" class="form-control" id="room_room_size_id">
        
        @foreach ($roomSizes as $roomSize)
          <option
            value="{!! $roomSize['id'] !!}"
            {!!
                old (
                  'room_size_id',
                  isset($room) && $room['room_size_id'] == $roomSize['id'] ? 'selected' : NULL )
            !!}
          >
            {!! $roomSize['label'] !!}
          </option>
        @endforeach

      </select>
    </div>
  </div>

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="number">Room-N°:<label>

    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        id="number"
        type="number"
        class="form-control"
        name="number"
        value="{!! old ('number',isset($room)?$room['number']:NULL) !!}"
      >
    </div>
  </div>

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="room_is_available">Smoking allowed:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        type="checkbox"
        id="room_is_available"
        name="is_smoking"
        @if (isset($room) && $room->is_smoking)
          checked="checked"
        @endif
        value="1"
      >
    </div>
  </div>

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="room_price">Price:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        id="room_price"
        type="number"
        class="form-control"
        name="price"
        value="{!! old ('price',isset($room)?$room['price']:NULL) !!}"
      >
    </div>
  </div>

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="room_is_available">Room is available:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        type="checkbox"
        id="room_is_available"
        name="is_available"
        @if (isset($room) && $room->is_available)
          checked="checked"
        @endif
        value="1"
      >
    </div>
  </div>

  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label for="bed_number">Quantity of beds:<label>
    </div>
    
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      <input
        id="bed_number"
        type="number"
        class="form-control"
        name="beds"
        value="{!! old ('beds',isset($room)?$room['beds']:NULL) !!}"
      >
    </div>
  </div>
  
  <div class="row my-padding-bottom-19">
    <div class="col-md-3 col-lg-4 my-padding-bottom-8">
      <label>Equipment:<label>
    </div>
  
    <div class="col-md-9 col-lg-8 my-padding-bottom-8">
      
      <div class="d-flex flex-wrap">
        @foreach($equipments as $equipment)

          <div class="my-padding-bottom-8 my-padding-right-40">
            <div class="d-flex align-items-center">
              <input
                type="checkbox"
                class="my-margin-right-19 my-room-equipment-icon"
                id="equipment_id_{!! $equipment->id !!}"
                name="equipment_id[]"
                value="{!! $equipment->id !!}"

                @if(in_array($equipment->id, $roomEquipmentIds))
                  checked="checked"
                @endif
              >

              <label for="equipment_id_{!! $equipment->id !!}" class="my-room-equipment-label">
                {!! $equipment->label !!}
              </label>
            </div>
          </div>
        
        @endforeach
      </div>
      
    </div>
  </div>

  <!-- button Save -->
  <div class="row">
    <div class="col-md-3 col-lg-4"></div>

    <div class="col-md-9 col-lg-8">
      <a
        href="{!! route('rooms.index') !!}"
        class="btn btn-sm btn-outline-dark my-margin-right-8 my-margin-bottom-8"
      >
        <i class="far fa-arrow-alt-circle-left my-margin-right-12"></i>
        <span>Back to list of rooms</span>
      </a>
      <button type="submit" class="btn btn-sm btn-success my-margin-bottom-8">
        <i class="fas fa-check-circle my-margin-right-12"></i>
        <span>Save</span>
      </button>

    </div>
  </div>

</form>