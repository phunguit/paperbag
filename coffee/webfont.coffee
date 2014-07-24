$ ->

  # Custom font loading using webfontloader component
  $(document).ready ->
    WebFont.load
      google:
        families: [
          "Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        ]

    elements = [
      "a"
      "button"
      "form"
      "h1"
      "h2"
      "h3"
      "h4"
      "h5"
      "h6"
      "p"
      "span"
      "table"
    ]

    style = "<style>"
    index = 0

    while index < elements.length
      style += ".wf-active " + elements[index]
      style += ", " if index < elements.length - 1
      index++

    style += " { font-family: 'Source Sans Pro'; } </style>"
    $("head").append style

    return
  return
