<section class="projects section-padding">
    <div class="container">
        <div class="row">
            <div class="slide-container">
                @php
                    $say = 0;
                @endphp
                @foreach ($projectImages as $item)
                    @php
                        $say++;
                    @endphp
                    <div class="slide  @if ($say == 2) active @endif"
                        style="background-image: url('{{ url('storage/' . $item->image) }}');">
                        <h3>{{ $item->project->name }}</h3>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
<script>
    const slides = document.querySelectorAll('.slide');
    const clearActives = () => {
        slides.forEach(slide => slide.classList.remove('active'));
    };
    const setActive = e => {
        clearActives();
        e.target.classList.add('active');
    };
    slides.forEach(slide => {
        slide.addEventListener('click', setActive);
    });
</script>
