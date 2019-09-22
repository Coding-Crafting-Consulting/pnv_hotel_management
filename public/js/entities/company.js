$(window).resize(function(){
  resizeIconsAndLabels('my-company-user-icon', 'my-company-user-label');
});


$(function(){

  resizeIconsAndLabels('my-company-user-icon', 'my-company-user-label');


  $('.my-company-delete').on('click', function(e) {
    e.preventDefault();

    $companyDelete = $(this);
    $company = $companyDelete.closest('.my-company');
    companyLabel = $company.find('.my-filter-target').text();


    $.ajax({
      
      url: $companyDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $companyDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {

          $company.remove();
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${companyLabel}"</i> has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${companyLabel}"</i>`);
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

