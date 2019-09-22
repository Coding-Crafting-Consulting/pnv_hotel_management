$(function(){

  $('.my-room-size-delete').on('click', function(e) {
    e.preventDefault();

    $roomSizeDelete = $(this);
    $roomSize = $roomSizeDelete.closest('.my-room-size');
    roomSizeLabel = $roomSize.find('.my-filter-target').text();


    $.ajax({
      
      url: $roomSizeDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $roomSizeDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${roomSizeLabel}"</i> has successfully been deleted`);

          $roomSize.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${roomSizeLabel}"</i>`);

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

});

