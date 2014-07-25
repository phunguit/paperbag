$ ->

  # Initialize masonry grid component
  $(document).ready ->
    $(".masonry").each ->
      container = $(this)

      # Initialize masonry grid after all images have been loaded
      container.imagesLoaded ->
        container.masonry
          itemSelector: ".item"
        return

      return
    return
  return
