$ ->

  # Initialize Masonry grid layout system.
  $(document).ready ->

    # Enable masonry grid on medium screen or above
    if $(window).width() >= 940
      $(".masonry").each ->
        container = $(this)

        # Load content by using ajax request
        $.get container.attr("data-url"), (data) ->
          container.html data

          # Initialize masonry grid after all images have loaded
          container.imagesLoaded ->
            container.masonry
              itemSelector: ".item"
