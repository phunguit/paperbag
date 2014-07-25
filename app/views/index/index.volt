{% extends 'layouts/main.volt' %}

{% block title %}{{ site_slogan|e }}{% endblock %}

{% block content %}
    <div class="masonry">
        {% for i in popular_items %}
            <div class="item">
                <div class="thumbnail">
                    <a href="{{ url() }}"><img src="{{ img.medium(i.thumbnail) }}"></a>
                    <div class="caption">
                        <h4>{{ i.name|e }}</h4>
                        <ul class="list-unstyled">
                            <li><h3>{{ i.price|e }}</h3></li>
                            <li>{{ i.seller|e }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
{% endblock %}
