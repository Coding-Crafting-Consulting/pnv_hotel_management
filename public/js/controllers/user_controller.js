(() => {
  const application = Stimulus.Application.start()

  application.register("user", class extends Stimulus.Controller {
    static get targets() {
      return [ "detail" ];
    }

    show(e) {

      let $user = $(e.target).closest('.my-user');

      fetch($user.find("[data-url]").attr("data-url"))
        .then(response => response.text())
        
        .then(html => {
          $('.my-user').removeClass('d-none');
          $user.addClass('d-none');
          $(this.detailTarget).removeClass('d-none').html(html);
          $('main > article').animate({ scrollTop: 0 }, 600);
        });
    
    }


    hide() {
      $(this.detailTarget).addClass('d-none').html(null);
      $('.my-user').removeClass('d-none');
      $('html, body').animate({ scrollTop: 0 }, 600);
    }

  })
})()