     <!-- Slider -->
     <header class="header slider-fade">
         <div class="owl-carousel owl-theme">
             @foreach ($projects as $item)
                 <div class="item bg-img" data-overlay-dark="3"
                     @foreach ($item->images as $image) data-background="{{ asset('storage/' . $image->image) }}" @endforeach>
                     <div class="v-middle caption">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-12 text-center">
                                     <div class="o-hidden">
                                         <h6>Transport</h6>
                                         <h1>{{ $item->name }}</h1>
                                         <div class="butn-dark mt-30 mb-30">
                                             <a href="{{ url('projeler/' . $item->slug) }}"><span>Projeyi Gör <i
                                                         class="ti-arrow-right"></i></span></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </header>
