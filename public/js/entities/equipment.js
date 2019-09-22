$(window).resize(function(){
  resizeIconsAndLabels('my-equipment-room-icon', 'my-equipment-room-label');
});


$(function(){

  resizeIconsAndLabels('my-equipment-room-icon', 'my-equipment-room-label');
  

  $('.my-equipment-delete').on('click', function(e) {
    e.preventDefault();

    $equipmentDelete = $(this);
    $equipment = $equipmentDelete.closest('.my-equipment');
    equipmentLabel = $equipment.find('.my-filter-target').text();


    $.ajax({
      
      url: $equipmentDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $equipmentDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${equipmentLabel}"</i> has successfully been deleted`);

          $equipment.remove();

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${equipmentLabel}"</i>`);

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

