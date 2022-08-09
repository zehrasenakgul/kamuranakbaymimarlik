<section id="blog" class="blog section-padding" data-scroll-index="5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="section-number">.03</div>
                <div class="section-subtitle">Blog</div>
                <div class="section-title">Son Yazılarımız</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    @foreach ($blogs as $item)
                        <div class="item">
                            <div class="post-img">
                                <a href="{{ url('blog/' . $item->slug) }}">
                                    <div class="img"> <img src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->name }}"> </div>
                                </a>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <a href="{{ url('blog/' . $item->slug) }}"><span>{{ $item->category->name }}</span></a>
                                    <a
                                        href="{{ url('blog/' . $item->slug) }}">{{ date('d-m-Y', strtotime($item->created_at)) }}</a>
                                </div>
                                <h5><a href="{{ url('blog/' . $item->slug) }}">Luxurious And Ultra Modern Homes In The
                                        World</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
