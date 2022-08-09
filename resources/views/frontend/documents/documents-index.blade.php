<section class="services section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="section-number">.02</div>
                <div class="section-title">Belgelerimiz</div>
            </div>
        </div>
        <div class="row">
            @foreach ($documents as $item)
                <div class="col-md-4">
                    <div class="services2 mb-60">
                        <div class="services2-img">

                            <a data-fancybox="images" href="{{ asset('storage/' . $item->image) }}"
                                data-caption="{{ $item->name }}">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}"class="w-100"></a>
                        </div>
                        <div class="title-box">
                            <h3 class="mb-0">{{ $item->name }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
