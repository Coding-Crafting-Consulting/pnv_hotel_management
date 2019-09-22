$(window).resize(function(){
  resizeIconsAndLabels('my-vip-card-user-icon', 'my-vip-card-user-label');
  resizeIconsAndLabels('my-vip-card-user-point', 'my-vip-card-user-point-label');
});


$(function(){

  resizeIconsAndLabels('my-vip-card-user-icon', 'my-vip-card-user-label');
  resizeIconsAndLabels('my-vip-card-user-point', 'my-vip-card-user-point-label');


  $('.my-vip-card-delete').on('click', function(e) {
    e.preventDefault();

    $vipCardDelete = $(this);
    $vipCard = $vipCardDelete.closest('.my-vip-card');
    vipCardLabel = $vipCard.find('.my-filter-target').text();


    $.ajax({
      
      url: $vipCardDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $vipCardDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $vipCard.remove();
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${vipCardLabel}"</i> has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${vipCardLabel}"</i>`);
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

