$ ->

  # Initialize masonry grid component
  $(document).ready ->
    $(".masonry").each ->
      container = $(this)

      # Initialize masonry grid after all images have been loaded
      container.imagesLoaded ->
        container.masonry
          itemSelector: ".item",
          columnWidth: ".grid-sizer",
          gutter: ".gutter-sizer",
          isFitWidth: true
        return

      return
    return
  return
