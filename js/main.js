(function() {
  $(function() {
    $(document).ready(function() {
      var elements, index, style;
      WebFont.load({
        google: {
          families: ["Source+Sans+Pro:300,400,700,300italic,400italic,700italic"]
        }
      });
      elements = ["a", "button", "form", "h1", "h2", "h3", "h4", "h5", "h6", "p", "small", "span", "strong", "table", "ul"];
      style = "<style>";
      index = 0;
      while (index < elements.length) {
        style += ".wf-active " + elements[index];
        if (index < elements.length - 1) {
          style += ", ";
        }
        index++;
      }
      style += " { font-family: 'Source Sans Pro'; } </style>";
      $("head").append(style);
    });
  });

  $(function() {
    $(document).ready(function() {
      var minWidth, viewportWidth;
      minWidth = 768;
      viewportWidth = $("body").innerWidth();
      $(".masonry").each(function() {
        var container, header;
        container = $(this);
        if (viewportWidth < minWidth) {
          container.addClass("masonry-disabled");
          return;
        }
        container.addClass("masonry-active");
        container.imagesLoaded(function() {
          container.masonry({
            itemSelector: ".item",
            columnWidth: ".grid-sizer",
            gutter: ".gutter-sizer",
            isFitWidth: true
          });
        });
        header = $(".header");
        header.addClass("affix-top");
        header.attr("data-spy", "affix");
        header.attr("data-offset-top", 300);
      });
    });
  });

  $(function() {
    var console, length, method, methods, noop;
    noop = function() {};
    methods = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"];
    length = methods.length;
    console = (window.console = window.console || {});
    while (length--) {
      method = methods[length];
      if (!console[method]) {
        console[method] = noop;
      }
    }
  });

}).call(this);
