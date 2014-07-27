$ ->

  # Enable cascading grid layout library
  $(document).ready ->
    minWidth = 768;
    viewportWidth = $("body").innerWidth();

    $(".masonry").each ->
      container = $(this)

      # Disable masonry grid on xs screen
      if viewportWidth < minWidth
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
        return

      # Enable sticky search bar
      header = $(".header")
      header.addClass("affix-top")
      header.attr("data-spy", "affix")
      header.attr("data-offset-top", 300)

      return
    return
  return
