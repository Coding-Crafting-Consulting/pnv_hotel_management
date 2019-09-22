$(function(){

  $('.my-booking-purpose-delete').on('click', function(e) {
    e.preventDefault();

    $bookingPurposeDelete = $(this);
    $bookingPurpose = $bookingPurposeDelete.closest('.my-booking-purpose');
    bookingPurposeLabel = $bookingPurpose.find('.my-filter-target').text();


    $.ajax({
      
      url: $bookingPurposeDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $bookingPurposeDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${bookingPurposeLabel}"</i> has successfully been deleted`);

          $bookingPurpose.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${bookingPurposeLabel}"</i>`);

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

