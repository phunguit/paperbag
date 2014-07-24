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

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="{{ url() }}" class="navbar-brand">
                <span class="hidden-xs">{{ site_slogan|e }}</span>
                <img class="visible-xs" src="{{ url('img/symbol.png') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url() }}">{{ t.register }}</a></li>
                <li class="disabled"><a href="{{ url() }}">{{ t.signin }}</a></li>
                <li><a href="{{ url() }}">{{ t.help }}</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <header class="header" role="banner">
        <form class="form form-search" role="search" action="{{ url() }}">
            <div class="form-group">
                <a href="{{ url() }}">
                    <img src="{{ url('img/logo.png') }}" width="146" height="60">
                </a>
            </div>

            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control input-lg" placeholder="{{ t.search_items }}">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                </div>
            </div>

            <div class="form-group">
                <a class="btn navbar-btn btn-primary btn-lg" href="{{ url() }}">{{ t.browse_all }}</a>
            </div>
        </form>
        <nav>
        </nav>
    </header>
</div>

<main class="main" role="content">
    <div class="container">
        {% block content %}{% endblock %}
    </div>
</main>

<footer class="footer" role="contentinfo">
</footer>

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bundle.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

</body>
</html>
