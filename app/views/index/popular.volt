{% for p in popular_items %}
    <div class="item">
        <div class="thumbnail">
            <a href="{{ p.id }}"><img src="{{ img.medium(p.thumbnail) }}"></a>
            <div class="caption">
                <h5><a href="#">{{ p.name|e }}</a></h5>
            </div>
            <div class="info">
                <span class="price">{{ f.money(p.price) }}</span>
                <a class="seller pull-right" href="#">{{ p.seller|e }}</a>
            </div>
        </div>
    </div>
{% endfor %}
