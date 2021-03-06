~function(global) {
  const Pax = {}
  Pax.baseRequire = typeof require !== "undefined" ? require : n => {
    throw new Error(`Could not resolve module name: ${n}`)
  }
  Pax.modules = {}
  Pax.files = {}
  Pax.mains = {}
  Pax.resolve = (base, then) => {
    base = base.split('/')
    base.shift()
    for (const p of then.split('/')) {
      if (p === '..') base.pop()
      else if (p !== '.') base.push(p)
    }
    return '/' + base.join('/')
  }
  Pax.Module = function Module(filename, parent) {
    this.filename = filename
    this.id = filename
    this.loaded = false
    this.parent = parent
    this.children = []
    this.exports = {}
  }
  Pax.makeRequire = self => {
    const require = m => require._module(m).exports
    require._deps = {}
    require.main = self

    require._esModule = m => {
      const mod = require._module(m)
      return mod.exports.__esModule ? mod.exports : {
        get default() {return mod.exports},
      }
    }
    require._module = m => {
      let fn = self ? require._deps[m] : Pax.main
      if (fn == null) {
        const module = {exports: Pax.baseRequire(m)}
        require._deps[m] = {module: module}
        return module
      }
      if (fn.module) return fn.module
      const module = new Pax.Module(fn.filename, self)
      fn.module = module
      module.require = Pax.makeRequire(module)
      module.require._deps = fn.deps
      module.require.main = self ? self.require.main : module
      if (self) self.children.push(module)
      fn(module, module.exports, module.require, fn.filename, fn.filename.split('/').slice(0, -1).join('/'), {url: 'file://' + (fn.filename.charAt(0) === '/' ? '' : '/') + fn.filename})
      module.loaded = true
      return module
    }
    return require
  }

  Pax.files["/Users/waffles/Code/Web/waffleiron/web/wp-content/themes/belgium/src/scripts/mod.js"] = file_$2fUsers$2fwaffles$2fCode$2fWeb$2fwaffleiron$2fweb$2fwp$2dcontent$2fthemes$2fbelgium$2fsrc$2fscripts$2fmod$2ejs; file_$2fUsers$2fwaffles$2fCode$2fWeb$2fwaffleiron$2fweb$2fwp$2dcontent$2fthemes$2fbelgium$2fsrc$2fscripts$2fmod$2ejs.deps = {}; file_$2fUsers$2fwaffles$2fCode$2fWeb$2fwaffleiron$2fweb$2fwp$2dcontent$2fthemes$2fbelgium$2fsrc$2fscripts$2fmod$2ejs.filename = "/Users/waffles/Code/Web/waffleiron/web/wp-content/themes/belgium/src/scripts/mod.js"; function file_$2fUsers$2fwaffles$2fCode$2fWeb$2fwaffleiron$2fweb$2fwp$2dcontent$2fthemes$2fbelgium$2fsrc$2fscripts$2fmod$2ejs(module, exports, require, __filename, __dirname, __import_meta) {
~function() {
//
// mod.js
// declare 

(async ({
  $,
}) => {
  $(document).ready(function() {

    let $subMenu = false
    let $dropdown = false

    $(window).hover(
      ({ target }) => {
        if ($(target).is('.sub-menu-enabled')) {
          console.log( $(target).parent().next() )

          $dropdown = $(target).parent().next()
          $subMenu = $(target)

          $subMenu.addClass('sub-menu-style')
          $dropdown.slideDown('fast')
          return
        }
        return
      },
      ({ target }) => {
        if ($subMenu || $dropdown) {
          if (!($(target).is('.dropdown-menu *')) && !($(target).is('.dropdown-menu')) && !($(target).is('.sub-menu-enabled'))) {
            $('.sub-menu-enabled').removeClass('sub-menu-style')
            $('.dropdown-menu').slideUp('fast')
          }
          return
        }
        return
      }
    )

    $('.fa-bars').on('click', function() {
      $('.mobile-dropdown').slideToggle('fast')
      $('.mobile-dropdown').click(function () {
        $(this).slideUp('fast')
      })
    })

    $('.carrousel').slick({
      dots: true,
      arrows: false,
    })

    $('.accordion-item').on('click', function() {
      $(this).find('.trans').toggleClass('trans-change')
      $(this).find('.accordion-title').toggleClass('text--orange')
      $(this).find('.accordion-content').slideToggle('fast')
    })
  })

})({
  // function defs
  $               : jQuery,
  // slctr           : s => document.querySelector(`${ s }`),
  // toggleBodyClass : c => document.body.classList.toggle(`${ c }`),
  // addBodyClass    : c => document.body.classList.add(`${ c }`),
  // removeBodyClass : c => document.body.classList.remove(`${ c }`),
})
}()}
  Pax.main = file_$2fUsers$2fwaffles$2fCode$2fWeb$2fwaffleiron$2fweb$2fwp$2dcontent$2fthemes$2fbelgium$2fsrc$2fscripts$2fmod$2ejs; Pax.makeRequire(null)()
  if (typeof module !== 'undefined') module.exports = Pax.main.module && Pax.main.module.exports
}(typeof global !== "undefined" ? global : typeof window !== "undefined" ? window : this)
//# sourceMappingURL=out.js.map
