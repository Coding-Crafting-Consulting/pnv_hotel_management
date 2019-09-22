$(window).on('load resize', function(){

  $('.my-dish-type').each(function(){
    resizeImages($(this));
  });

});


$(function(){

  $('.my-dish-delete').on('click', function(e) {
    e.preventDefault();

    $dishDelete = $(this);
    $dish = $dishDelete.closest('.my-dish');
    $dishType = $dish.closest('.my-dish-type');
    dishLabel = $dish.find('.my-filter-target').text();


    $.ajax({
      
      url: $dishDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $dishDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $dish.remove();

          if($dishType.find('.my-dish').length < 1) {
            $dishType.remove();
          }
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${dishLabel}"</i> has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${dishLabel}"</i>`);

        }

      },
      

      error: function (error) {
        
        $('#my-entity-delete-status')
          .addClass('my-entity-delete-status-ko')
          .removeClass('d-none')
          .text(error.responseJSON.message);
      
      },


      complete: function () {
        resizeLayout();
      }

    });
  });


  $('.my-dish-discard-picture').on('click', function(e) {
    e.preventDefault();

    $('.my-frame').removeClass('my-margin-top-40');
    
    $dishDiscardPicture = $(this);
    $dish = $dishDiscardPicture.closest('.my-dish');
    $dishType = $dish.closest('.my-dish-type');


    $.ajax({
      
      url: $dishDiscardPicture.attr('data-url'),
      method: 'patch',
      
      data: {
        _token: $dishDiscardPicture.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $dish.find('.my-dish-image').remove();
          $dishDiscardPicture.remove();
          $dishType.find('.my-entity-images-all-formats').append($dish);

          $('#my-entity-delete-status, #my-dish-discard-picture-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`Picture has successfully been deleted`);


          resizeImages($dishType);
          resizeLayout();

        } 


        else {
          
          $('#my-entity-delete-status, #my-dish-discard-picture-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete the picture`);

        }

      },
      

      error: function (error) {
        
        $('#my-entity-delete-status, #my-dish-discard-picture-status')
          .addClass('my-entity-delete-status-ko')
          .removeClass('d-none')
          .text(error.responseJSON.message);
      
      }

    });
  });

});

