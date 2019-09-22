(() => {
  const application = Stimulus.Application.start()

  application.register("hello", class extends Stimulus.Controller {
    static get targets() {
      return [ "name" ]
    }

    connect() {
      console.log(`Hello!`)
    }

    toto() {
      console.log(`Toto!`)
    }

    titi() {
      console.log(`Titi!`)
    }

    tata() {
      console.log(`Tata!`)
    }

  })
})()