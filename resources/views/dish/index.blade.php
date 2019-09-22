@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.indexHeader',
    ['title' => "Dishes", 'route' => route('dishes.create'), 'buttonLabel' => "Add a dish"]
  )

@endsection


@section('content')

  @foreach($dishTypes as $dishType)

    @if (count($dishType->dishes) > 0)

      <div class="my-dish-type">

        <h4 class="my-margin-bottom-19 my-margin-top-40 my-border-bottom">
          <strong>
            <em>{!! $dishType->label !!}</em>
          </strong>
        </h4>


        <div class="row my-entity-images-all-formats">
        
          @foreach($dishType->dishes as $dish)

            <div class="col-sm-6 col-lg-4 my-padding-bottom-19 my-filter-object my-entity my-dish">
              <div class="my-frame d-flex flex-wrap flex-fill align-items-start justify-content-between">

                <div class="my-padding-bottom-8 my-padding-right-19">
                  <div class="my-padding-bottom-12 my-filter-target my-entity-name">
                    <strong>{!! $dish["name"] !!}</strong>
                  </div>
    
                  @if ($dish->description && strlen($dish->description))    
                    <div class="my-padding-bottom-12">
                      <p class="text-justify my-entity-description">
                        <em>{!! str_replace("\n","<br>", $dish->description) !!}</em>
                      </p>
                    </div>
                  @endif

                  <div class="my-padding-bottom-12">
                    <div class="my-entity-price">
                      @if (!$dish->is_available)    
                        <i class="text-danger">DISH IS NOT AVAILABLE</i>

                      @elseif ($dish->price)    
                        VNĐ {!! $dish->price !!}
                      
                      @else
                        <i class="text-info">Ask us for the price</i>
                      
                      @endif
                    </div>
                  </div>
                  
                  
                  @if (Auth::check() && Auth::user()->hasAdminRights())
                    <div class="d-flex flex-wrap">

                      <div class="my-padding-right-8 my-padding-bottom-8">
                        <a href="{!! route('dishes.edit', $dish["id"]) !!}" class="btn btn-sm btn-outline-primary">
                          <div class="d-flex align-items-center">
                            <div class="my-margin-right-12 my-action-button-icon">
                              <i class="far fa-edit"></i>
                            </div>

                            <div class="my-action-button-label text-left">
                              Edit
                            </div>
                          </div>
                        </a>
                      </div>

                      <div class="my-padding-bottom-8">
                        <button
                          class="btn btn-sm btn-danger my-dish-delete"
                          data-token="{!! csrf_token() !!}"
                          data-url="{!! route('dishes.destroy', $dish['id']) !!}"
                        >
                          <div class="d-flex align-items-center">
                            <div class="my-margin-right-12 my-action-button-icon">
                              <i class="far fa-trash-alt"></i>
                            </div>

                            <div class="my-action-button-label text-left">
                              Delete
                            </div>
                          </div>
                        </button>
                      </div>
                  
                    </div>
                  @endif

                </div>


                @isset($dish['image'])    
                  
                  <div class="my-entity-image my-dish-image">
                    <img src="{!! Storage::url($dish->image) !!}" class="my-padding-bottom-8 mx-auto d-block">

                    @if (Auth::check() && Auth::user()->hasAdminRights())
                      <div class="my-padding-bottom-8 text-center">
                        <button
                          class="btn btn-sm btn-danger my-dish-discard-picture"
                          data-token="{!! csrf_token() !!}"
                          data-url="{!! route('dishes.discardPicture', $dish['id']) !!}"
                        >
                          <i class="far fa-trash-alt"></i>
                          <i class="far fa-image my-margin-right-12"></i>
                          <span>Discard picture</span>
                        </button>
                      </div>
                    @endif

                  </div>
                
                @endisset

              </div>
            </div>

          @endforeach

        </div>


        <div class="row my-entity-images-landscape">
        </div>

        <div class="row my-entity-images-portrait">
        </div>

        <div class="row my-entity-images-landscape-no-description">
        </div>

        <div class="row my-entity-images-portrait-no-description">
        </div>

        <div class="row my-entity-no-image">
        </div>

        <div class="row my-entity-no-image-no-description">
        </div>

      </div>

    @endif

  @endforeach

@endsection