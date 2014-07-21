$ ->

  # Custom font loading using webfontloader component.
  $(document).ready ->
    WebFont.load
      google:
        families: [
          "Lato:300,400,700,300italic,400italic,700italic"
        ]

    # Enable custom font for these elements.
    elements = [
      "h1"
      "h2"
      "h3"
      "h4"
      "h5"
      "h6"
      "a"
      "p"
      "button"
      "label"
    ]

    style = "<style>"
    index = 0

    while index < elements.length
      style += ".wf-active " + elements[index]
      style += ", "  if index < elements.length - 1
      index++

    style += " { font-family: 'Lato'; }"
    style += "</style>"

    # Attach custom font css after fonts are loaded.
    $("head").append(style)
