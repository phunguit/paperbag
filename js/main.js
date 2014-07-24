(function() {
  $(function() {
    $(document).ready(function() {
      WebFont.load({
        google: {
          families: ["Source+Sans+Pro:300,400,700,300italic,400italic,700italic"]
        }
      });
      $("head").append("<style>.wf-active * { font-family: 'Source Sans Pro'; }</style>");
    });
  });

  $(function() {
    $(document).ready(function() {
      $(".masonry").each(function() {
        var container;
        container = $(this);
        container.imagesLoaded(function() {
          container.masonry({
            itemSelector: ".item"
          });
        });
        $.get(container.attr("data-url"), function(data) {
          container.html(data);
        });
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
