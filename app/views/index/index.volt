{% extends 'layouts/main.volt' %}

{% block title %}{{ site_slogan|e }}{% endblock %}

{% block content %}
    {% if current_banner %}
        <div class="banner">
            <div class="container">
                <div class="text-center">
                    <a href="{{ url() }}"><img src="{{ url(current_banner.banner) }}" class="img-responsive"></a>
                </div>
            </div>
        </div>
    {% endif %}

    <div id="main">
        <div class="container">
            <div class="heading text-center">
                <h3>{{ t.popular_items }}</h3>
            </div>
        </div>

        <div class="container hidden-sm hidden-xs">
            <div class="masonry" data-url="{{ url('index/popular') }}">
                <div class="text-center">
                    <h4>{{ t.please_wait }}</h4>
                </div>
            </div>
        </div>

        <div class="list-view visible-sm visible-xs">
            <div class="container">
                <table>
                    <tbody>
                    {% for p in popular_items %}
                        <tr>
                            <td>
                                <a href="{{ p.id }}"><img src="{{ img.small(p.thumbnail) }}"></a>
                            </td>
                            <td>
                                <h4><a href="#">{{ p.name|e }}</a></h4>
                                <p class="price">{{ f.money(p.price) }}</p>
                                <a class="seller" href="{{ p.id }}">{{ p.seller|e }}</a>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="board">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <h3>{{ t.top_sellers }}</h3>
                    </div>
                </div>

                <div class="row">
                    {% for u in top_sellers %}
                        <div class="col-md-4">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{ img.small(u.photo) }}">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ u.name|e }}</h4>
                                    <p>{{ u.location|e }}</p>
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </div>
{% endblock %}
