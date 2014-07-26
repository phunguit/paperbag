{% extends 'layouts/main.volt' %}

{% block title %}{{ site_slogan|e }}{% endblock %}

{% block content %}
    <div class="masonry">
        {% for i in popular_items %}
            <div class="item">
                <div class="thumbnail">
                    <a href="{{ url() }}"><img src="{{ img.medium(i.thumbnail) }}"></a>
                    <div class="caption">
                        <ul class="list-unstyled">
                            <li><h4>{{ i.name|e }}</h4></li>
                            <li><h3>{{ f.money(i.price) }}</h3></li>
                            <li><a href="{{ url() }}"><small>#{{ i.seller|e }}</small></a><small class="pull-right">{{ i.views }} {{ t.views }}</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
{% endblock %}
