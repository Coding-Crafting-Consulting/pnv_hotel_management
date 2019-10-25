(() => {
  const application = Stimulus.Application.start()

  application.register("form", class extends Stimulus.Controller {

    submit(e) {
      e.preventDefault();

      let $form = $(e.target);
      let $_methods = $form.find('[name="_method"]');
      
      let method = $_methods.length > 0 ?
          $_methods.val() :
          this.data.get('method');


      let data = {}

      $('[name]')
        .not('meta')
        .not('[name="_method"]')
        .each((index, inputField) => {

          data[$(inputField).attr('name')] = $(inputField).val();

        });


      $.ajax({
        
        url: this.data.get('action'),
        type: method,
        data: data,
        

        success: (url) => {
          Turbolinks.clearCache;
          
          Turbolinks.visit(
            this.data.has('redirect') ?
              this.data.get('redirect') :
              url
          );
        },
        

        error: (error) => {
          alert(error.responseJSON.message);
        },


        complete: () => {
        }

      });


    }

  })
})()