$(window).resize(function(){
  resizeIconsAndLabels('my-room-equipment-icon', 'my-room-equipment-label');
});


$(function(){

  resizeIconsAndLabels('my-room-equipment-icon', 'my-room-equipment-label');
  

  $('.my-room-delete').on('click', function(e) {
    e.preventDefault();

    $roomDelete = $(this);
    $room = $roomDelete.closest('.my-room');
    $roomSize = $room.closest('.my-room-size');
    roomLabel = $room.find('.my-filter-target').text();


    $.ajax({
      
      url: $roomDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $roomDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $room.remove();

          if($roomSize.find('.my-room').length < 1) {
            $roomSize.remove();
          }
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${roomLabel}"</i> has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${roomLabel}"</i>`);

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

