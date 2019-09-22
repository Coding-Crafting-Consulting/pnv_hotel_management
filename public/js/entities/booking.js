$(function(){

  $('.my-booking-delete').on('click', function(e) {
    e.preventDefault();

    $bookingDelete = $(this);
    $booking = $bookingDelete.closest('.my-booking');
    $bookingPurpose = $booking.closest('.my-booking-purpose');


    $.ajax({
      
      url: $bookingDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $bookingDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $booking.remove();

          if($bookingPurpose.find('.my-booking').length < 1) {
            $bookingPurpose.remove();
          }
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`Reservation has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete this reservation</i>`);

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

