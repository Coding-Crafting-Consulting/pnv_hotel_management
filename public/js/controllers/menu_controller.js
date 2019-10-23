(() => {
  const application = Stimulus.Application.start();

  const applyClasses = (
      pathname,
      object,
      childObjectClass,
      classes
    ) => {

      let $object = $(object);
      let $childObjects = $object.find(childObjectClass);


      switch (true) {

        case pathname == "/" && $(object).attr('data-pathname') == "/":
          $object.addClass("is-selected");
          $childObjects.addClass(classes);
          break;


        case pathname == "/" && $(object).attr('data-pathname') != "/":
        case $(object).attr('data-pathname') == "/":

          $object.removeClass("is-selected");
          $childObjects.removeClass(classes);
          break;


        case pathname.includes($(object).attr('data-pathname')):
          $object.addClass("is-selected");
          $childObjects.addClass(classes);
          break;

        default:
          $object.removeClass("is-selected");
          $childObjects.removeClass(classes);
          break;

      }

    };


  application.register("menu", class extends Stimulus.Controller {

    static get targets() {
      return [ "specific" ];
    }

    connect() {

      this.data.set("pathname", window.location.pathname);
      let pathname = this.data.get("pathname");

      $('[data-pathname]')
        .not('[data-target="menu.specific"]')
        .each(

          function(){

            for (
              let className of [
                  '.my-sidebar-action-icon',
                  '.my-sidebar-action-label'
                ]
            ) {

                applyClasses(
                  pathname,
                  this,
                  className,
                  'bg-warning text-dark'
                );
            
            }

          }

        );


      for (let specificTarget of this.specificTargets) {

        let classes = specificTarget.getAttribute("data-classes");

        $(specificTarget)
          .find('.my-sidebar-action-icon')
          .addClass(classes);

        applyClasses(
          pathname,
          specificTarget,
          '.my-sidebar-action-label',
          classes
        );


        if ($(specificTarget).hasClass("is-selected")) {

          let $notSpecific = $('[data-pathname]')
              .not('[data-target="menu.specific"]');


          for (
            let className of [
                '.my-sidebar-action-icon',
                '.my-sidebar-action-label'
              ]
          ) {

              $notSpecific
                .find(className)
                .removeClass("bg-warning text-dark");
          
          }

        }

      }
      
    }

  })
})()