$ ->

  # Custom font loading using webfontloader component
  $(document).ready ->
    WebFont.load
      google:
        families: [
          "Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        ]

    $("head").append("<style>.wf-active * { font-family: 'Source Sans Pro'; }</style>")

    return
  return
