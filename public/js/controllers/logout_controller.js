(() => {
  const application = Stimulus.Application.start()

  application.register("logout", class extends Stimulus.Controller {

    logout(e) {

      e.preventDefault();

      $.ajax({
      
        url: this.data.get('url'),
        

        success: () => {
          Turbolinks.clearCache;
          Turbolinks.visit("/");
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