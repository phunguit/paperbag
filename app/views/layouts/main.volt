<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{% block title %}{% endblock %} | {{ site_name|e }}</title>

    <meta name="description" content="{{ site_description|escape_attr }}">
    <meta name="site_keywords" content="{{ site_keywords|escape_attr }}">
    <meta name="site_author" content="{{ site_author|escape_attr }}">

    <link rel="icon" type="image/png" href="{{ url('favicon.png') }}">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('apple-touch-icon-precomposed.png') }}">

    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <script src="{{ url('js/modernizr.js') }}"></script>
</head>
<body>
<header class="navbar navbar-default" id="header" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url() }}" class="navbar-brand">{{ site_name|e }}</a>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url() }}">{{ t.register }}</a></li>
                <li class="disabled"><a href="{{ url() }}">{{ t.signin }}</a></li>
                <li><a href="{{ url() }}">{{ t.help }}</a></li>
            </ul>
        </nav>
    </div>
</header>

<main role="main">
    <div class="container">
        {% block content %}{% endblock %}
    </div>
</main>

<footer id="footer" role="contentinfo">

</footer>

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bundle.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
</body>
</html>
