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
    <meta name="keywords" content="{{ site_keywords|escape_attr }}">
    <meta name="author" content="{{ site_author|escape_attr }}">

    <link rel="apple-touch-icon-precomposed" href="{{ url('apple-touch-icon-precomposed.png') }}">
    <link rel="icon" type="image/png" href="{{ url('favicon.png') }}">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}">

    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <script src="{{ url('js/modernizr.js') }}"></script>
</head>
<body>

<header class="navbar navbar-default" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url() }}">{{ site_slogan|e }}</a>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url('register') }}">{{ t.register }}</a></li>
                <li class="disabled"><a href="{{ url('signin') }}">{{ t.signin }}</a></li>
                <li><a href="{{ url('help') }}">{{ t.help }}</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="search" data-spy="affix" data-offset-top="600">
    <form role="form">
        <div class="container">
            <div class="row">
                <div class="col-md-2 hidden-sm hidden-xs">
                    <a href="{{ url() }}"><img src="{{ url('img/logo.png') }}"></a>
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="{{ t.find_items }}">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle  hidden-sm hidden-xs" data-toggle="dropdown"><span class="glyphicon glyphicon-search"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{{ t.all_categories }}</a></li>
                                <li class="divider"></li>
                                {% for c in categories %}
                                    <li><a href="{{ c.id }}">{{ c.category|e }}</a></li>
                                {% endfor %}
                            </ul>
                            <button type="button" class="btn btn-default visible-sm visible-xs"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button type="button" class="btn btn-success btn-lg btn-block">{{ t.sell_item }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="brand visible-sm visible-xs">
    <div class="container">
        <div class="text-center">
            <a href="{{ url() }}"><img src="{{ url('img/brand.png') }}"></a>
        </div>
        <div class="text-center">
            <h1>{{ site_name|e }}</h1>
        </div>
    </div>
</div>

<nav class="menu" role="menu">
    <div class="container">
        <div class="row">
            {% for c in categories %}
                <div class="col-sm-4">
                    <a href="{{ c.id }}"><span class="glyphicon glyphicon-chevron-right"></span> {{ c.category|e }}</a>
                </div>
            {% endfor %}
        </div>
    </div>
</nav>

{% block content %}{% endblock %}

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bundle.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

</body>
</html>
