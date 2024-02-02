<!-- Dialoge for view internship  -->
<div class="modal fade" id="confirmView{{ $internship->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class=" text-wrap">
                    <h4>{{$internship->internship_title }}</h4>
                </div>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControls{{ $internship->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($internship->media as $key => $medium)
                            <div class="carousel-item @if ($key === 0) active @endif">
                                <div class="row-md-10 mx-auto">
                                    <img src="{{ asset('storage/' . $medium->image) }}" alt="internship" class="large_img mb-1 @if ($key !== 0) disabled @endif" style="width: 100%; height: 350px; object-fit:cover; object-position:top">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{ $internship->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{ $internship->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="d-flex flex-wrap mb-2" id="smallCards">
                    @foreach ($internship->media as $key => $medium)
                        <div class="col-md-2 mb-1">
                            <div class="card small-card @if ($key !== 0) disabled @endif" data-bs-target="#carouselExampleControls{{ $internship->id }}" data-bs-slide-to="{{ $key }}">
                                <img src="{{ asset('storage/' . $medium->image) }}" alt="internship" class="small_img" style="width: 100%; height: 200px; object-fit:cover; object-position:top">
                            </div>
                        </div>
                    @endforeach
                </div>
                <span class="text-wrap">{!! $internship->internship_description !!}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- script  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const smallCards = document.querySelectorAll('#confirmView{{ $internship->id }} .small-card');
        const carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleControls{{ $internship->id }}'));

        function enableSmallCard(index) {
            smallCards.forEach((card, i) => {
                if (i == index) {
                    card.classList.remove('disabled');
                    card.removeAttribute('disabled');
                } else {
                    card.classList.add('disabled');
                    card.setAttribute('disabled', 'true');
                }
            });
        }
        smallCards.forEach((card, index) => {
            card.addEventListener('click', function() {
                smallCards.forEach(otherCard => {
                    if (otherCard === this) {
                        otherCard.classList.remove('disabled');
                        otherCard.removeAttribute('disabled');
                    } else {
                        otherCard.classList.add('disabled');
                        otherCard.setAttribute('disabled', 'true');
                    }
                });
                carousel.to(index);
            });
        });

        const carouselElement = document.querySelector('#carouselExampleControls{{ $internship->id }}');
        carouselElement.addEventListener('slide.bs.carousel', function(event) {
            const activeIndex = event.to;
            enableSmallCard(activeIndex);
        });

        const prevButton = document.querySelector('.carousel-control-prev');
        const nextButton = document.querySelector('.carousel-control-next');

        if (!prevButton.hasEventListener) {
            prevButton.addEventListener('click', function() {
                const activeItem = carouselElement.querySelector('.carousel-item.active');
                const allItems = Array.from(activeItem.parentElement.children);
                const activeIndex = allItems.indexOf(activeItem);
            });
            prevButton.hasEventListener = true;
        }

        if (!nextButton.hasEventListener) {
            nextButton.addEventListener('click', function() {
                const activeItem = carouselElement.querySelector('.carousel-item.active');
                const allItems = Array.from(activeItem.parentElement.children);
                const activeIndex = allItems.indexOf(activeItem);
                console.log(activeIndex);
            });
            prevButton.hasEventListener = true;
        }
    });
</script>
<style>
    #confirmView{{ $internship->id }} .small-card.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    @media (max-width: 767px) {
        .img-thumbnail{
            height: 900px;
        }
        #smallCards {
            flex-direction: column;
        }
        #carouselExampleControls{{ $internship->id }} {
            display: none;
        }
        #confirmView{{ $internship->id }} .small-card.disabled {
            opacity: 1;
            cursor: auto;
        }
    }
</style>