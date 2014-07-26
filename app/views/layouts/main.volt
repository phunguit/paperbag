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

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url() }}" class="navbar-brand"><span class="hidden-xs">{{ site_slogan|e }}</span><img class="visible-xs" src="{{ url('img/symbol.png') }}"></a>
        </div>

        <div class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url() }}">{{ t.register }}</a></li>
                <li><a href="{{ url() }}">{{ t.signin }}</a></li>
                <li><a href="{{ url() }}">{{ t.help }}</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="header affix" role="banner" data-spy="affix" data-offset-top="500">
    <div class="container">
        <form class="form form-search" role="search" action="{{ url() }}">
            <div class="form-group hidden-xs">
                <a href="{{ url() }}"><img src="{{ url('img/logo.png') }}"></a>
            </div>

            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control input-lg" placeholder="{{ t.search_items }}">
                    <span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></span>
                </div>
            </div>

            <div class="form-group hidden-xs">
                <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target=".nav-grid-collapse">{{ t.browse_all }}</button>
            </div>
        </form>
    </div>

    <div class="collapse nav-grid-collapse">
        <div class="container">
            <nav class="nav-grid" role="navigation">
                {% for c in categories %}
                    <div class="col-sm-4">
                        <div class="nav-item">
                            <a href="{{ url() }}"><img src="{{ img.tiny(c.image) }}"></a>
                            <ul>
                                <li><a href="{{ url() }}">{{ c.category|e }}</a></li>
                                <li><small>{{ c.total_items }} {{ t.items_from }} {{ c.total_users }} {{ t.users }}</small></li>
                            </ul>
                        </div>
                    </div>
                {% endfor %}
            </nav>
        </div>
    </div>
</header>

<main class="main" role="content">
    {% if not (banner is empty) %}
        <div class="banner">
            <a href="{{ url(banner.target|escape_attr) }}"><img class="img-responsive" src="{{ url(banner.banner) }}"></a>
        </div>
    {% endif %}

    <div class="container">
        {% block content %}{% endblock %}
    </div>
</main>

<footer class="footer" role="contentinfo">
    <div class="container">
        <ul class="list-inline">
            {% for l in links %}
                <li><a href="{{ url(l.target|escape_attr) }}"><img src="{{ url(l.icon) }}">{{ l.name|e }}</a></li>
            {% endfor %}
        </ul>

        <ul class="list-inline">
            <li><a href="{{ url() }}">{{ t.success_stories }}</a></li>
            <li><a href="{{ url() }}">{{ t.how_to_buy }}</a></li>
            <li><a href="{{ url() }}">{{ t.how_to_sell }}</a></li>
            <li><a href="{{ url() }}">{{ t.money_withdrawal }}</a></li>
            <li><a href="{{ url() }}">{{ t.terms_and_conditions }}</a></li>
            <li><a href="{{ url() }}">{{ t.privacy_policy }}</a></li>
            <li><a href="{{ url() }}">{{ t.help }}</a></li>
        </ul>

        <p>{{ start_year }} - {{ current_year }} &copy; {{ site_author }}</p>
    </div>
</footer>

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bundle.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

</body>
</html>
