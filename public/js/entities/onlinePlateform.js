$(function(){

  $('.my-online-plateform-delete').on('click', function(e) {
    e.preventDefault();

    $onlinePlateformDelete = $(this);
    $onlinePlateform = $onlinePlateformDelete.closest('.my-online-plateform');
    onlinePlateformLabel = $onlinePlateform.find('.my-filter-target').text();


    $.ajax({
      
      url: $onlinePlateformDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $onlinePlateformDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${onlinePlateformLabel}"</i> has successfully been deleted`);

          $onlinePlateform.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${onlinePlateformLabel}"</i>`);

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

