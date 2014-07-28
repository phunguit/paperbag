$ ->
  $(document).ready ->

    # Screen sizes
    screenSmallMin = 768;
    currentScreen = $("body").innerWidth();

    # Enable sticky search bar on small screen or larger
    if currentScreen >= screenSmallMin
      header = $(".header")
      header.addClass("affix-top")
      header.attr("data-spy", "affix")
      header.attr("data-offset-top", header.height())

    return
  return
