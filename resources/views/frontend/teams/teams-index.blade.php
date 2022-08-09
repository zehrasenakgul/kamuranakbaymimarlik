<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="section-number">.04</div>

                <div class="section-subtitle">Başarılı Kadromuz</div>
                <div class="section-title">Ekibimiz</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
                @foreach ($teams as $item)
                    <div class="item">
                        <div class="img">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                        </div>
                        <div class="info">
                            <h6>{{ $item->name }}</h6>
                            <p>{{ $item->title }}</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <ul class="list-unstyled text-center ">
                                        <li>
                                            <div class="text">
                                                <p><span class="ti-headphone-alt"></span>
                                                    <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text">
                                                <p><span class="ti-email"></span>
                                                    <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
