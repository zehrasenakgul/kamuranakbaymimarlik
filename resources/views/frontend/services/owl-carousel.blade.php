<section class="projects section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="section-number">.01</div>
                <div class="section-subtitle">Kamuran Akbay Mimarlık</div>
                <div class="section-title ">Tasarım ve İnovasyon</div>
            </div>
        </div>
        <div class="projects-carousel owl-theme owl-carousel">
            @foreach ($services as $item)
                <div class="projects-single">
                    <div class="projects-img">
                        <a href='{{ url('tasarim-ve-inovasyon/' . $item->slug) }}'> <img
                                src="{{ url('storage/' . $item->image) }}" alt="{{ $item->name }}"></a>
                    </div>
                    <div class="projects-content">
                        <div class="projects-title"><a
                                href="{{ url('tasarim-ve-inovasyon/' . $item->slug) }}">{{ $item->name }}</a></div>
                        <div class="projects-arrow"> <a href="{{ url('tasarim-ve-inovasyon/' . $item->slug) }}"><span
                                    class="ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
