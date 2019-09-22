$(function(){

  $('.my-booking-type-delete').on('click', function(e) {
    e.preventDefault();

    $bookingTypeDelete = $(this);
    $bookingType = $bookingTypeDelete.closest('.my-booking-type');
    bookingTypeLabel = $bookingType.find('.my-filter-target').text();


    $.ajax({
      
      url: $bookingTypeDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $bookingTypeDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${bookingTypeLabel}"</i> has successfully been deleted`);

          $bookingType.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${bookingTypeLabel}"</i>`);

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

