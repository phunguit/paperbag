{% extends 'layouts/main.volt' %}

{% block title %}{{ site_slogan|e }}{% endblock %}

{% block content %}
    <h2>{{ t.popular_items }}</h2>
    <div class="masonry">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        {% for i in popular_items %}
            <div class="item">
                <div class="thumbnail">
                    <a href="{{ url() }}"><img src="{{ img.medium(i.thumbnail) }}"></a>
                    <div class="caption">
                        <ul>
                            <li><h5>{{ i.name|e }}</h5></li>
                            <li><h4>{{ f.money(i.price) }}</h4></li>
                            <li><a href="{{ url() }}">#{{ i.seller|e }}</a><span class="pull-right">{{ i.views }} {{ t.views }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
{% endblock %}
