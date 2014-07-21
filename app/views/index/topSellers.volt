{% for u in top_sellers %}
    <div class="item">
        <div class="thumbnail">
            <a href="{{ u.id }}"><img src="{{ img.medium(u.photo, 'user-photo.png') }}"></a>
            <div class="caption">
                <h5><a href="#">{{ u.name|e }}</a></h5>
            </div>
            <div class="info">
                <span class="price">{{ u.location|e }}</span>
                <a class="seller pull-right" href="#">{{ u.views }}</a>
            </div>
        </div>
    </div>
{% endfor %}
