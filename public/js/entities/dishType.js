$(function(){

  $('.my-dish-type-delete').on('click', function(e) {
    e.preventDefault();

    $dishTypeDelete = $(this);
    $dishType = $dishTypeDelete.closest('.my-dish-type');
    dishTypeLabel = $dishType.find('.my-filter-target').text();


    $.ajax({
      
      url: $dishTypeDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $dishTypeDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${dishTypeLabel}"</i> has successfully been deleted`);

          $dishType.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${dishTypeLabel}"</i>`);

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

