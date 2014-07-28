$ ->

  # Enable cascading grid layout library
  $(document).ready ->
    screenSmallMin = 768;
    currentScreen = $("body").innerWidth();

    $(".masonry").each ->
      container = $(this)

      # Disable masonry grid on extra small screen
      if currentScreen < screenSmallMin
        container.addClass("masonry-disabled")
        return

      # Initialize masonry grid after all images have been loaded
      container.addClass("masonry-active")
      container.imagesLoaded ->
        container.masonry
          itemSelector: ".item",
          columnWidth: ".grid-sizer",
          gutter: ".gutter-sizer",
          isFitWidth: true

        # Close loading bar after layout complete
        container.children(".loading-bar").hide();
        return

      return
    return
  return
