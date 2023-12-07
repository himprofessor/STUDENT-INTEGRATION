<div class="modal fade" id="confirmView{{ $activities->id }}" tabindex="-1" role="dialog"
    aria-labelledby="confirmViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class=" text-wrap">
                    <h3 class="mt-4">{!! $activities->title !!}</h3>
                    <p>{!! $activities->description !!}</p>
                </div>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControls{{ $activities->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($activities->media as $key => $medium)
                            <div class="carousel-item @if ($key === 0) active @endif">
                                <div class="row-md-10 mx-auto">
                                    <img src="{{ asset('storage/' . $medium->image) }}" alt="student activity"
                                        class="img-thumbnail mb-2 @if ($key !== 0) disabled @endif"
                                        style="width: 500px; height: 300px;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControls{{ $activities->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControls{{ $activities->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="d-flex flex-wrap w-100" id="smallCards">
                    @foreach ($activities->media as $key => $medium)
                        <div class="col-md-2 mb-3">
                            <div class="card small-card @if ($key !== 0) disabled @endif"
                                data-bs-target="#carouselExampleControls{{ $activities->id }}"
                                data-bs-slide-to="{{ $key }}">
                                <img src="{{ asset('storage/' . $medium->image) }}" alt="student activity"
                                    class="img-thumbnail mb-2" style="width: 100%; height: 150px; object-fit: cover;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const smallCards = document.querySelectorAll('#confirmView{{ $activities->id }} .small-card');
        const carousel = new bootstrap.Carousel(document.querySelector(
            '#carouselExampleControls{{ $activities->id }}'));

        // Helper function to enable the corresponding small card
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
                // Enable the clicked card and disable others
                smallCards.forEach(otherCard => {
                    if (otherCard === this) {
                        otherCard.classList.remove('disabled');
                        otherCard.removeAttribute('disabled');
                    } else {
                        otherCard.classList.add('disabled');
                        otherCard.setAttribute('disabled', 'true');
                    }
                });
                // Go to the corresponding image in the carousel
                carousel.to(index);
            });
        });

        // Event listener to disable all small cards except the active one when the carousel slides
        const carouselElement = document.querySelector('#carouselExampleControls{{ $activities->id }}');
        carouselElement.addEventListener('slide.bs.carousel', function(event) {
            const activeIndex = event.to;
            enableSmallCard(activeIndex);
        });

        // Event listener to enable the corresponding small card when clicking on the "Previous" or "Next" button
        const prevButton = document.querySelector('.carousel-control-prev');
        const nextButton = document.querySelector('.carousel-control-next');

        if (!prevButton.hasEventListener) {
            prevButton.addEventListener('click', function() {
                const activeItem = carouselElement.querySelector('.carousel-item.active');
                const allItems = Array.from(activeItem.parentElement.children);
                const activeIndex = allItems.indexOf(activeItem);
                // const activeIndex = carousel._activeIndex;
                console.log(activeIndex);
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
    #confirmView{{ $activities->id }} .small-card.disabled {
        /* Add your disabled style here */
        opacity: 0.5;
        cursor: not-allowed;
    }

    /*responsive on mobile phone*/
    @media (max-width: 767px) {

        /* display one column on mobile phone*/
        #smallCards {
            flex-direction: column;
        }

        #carouselExampleControls{{ $activities->id }} {
            display: none;
        }

        /* don't show the slideshow on mobile phone*/
        #confirmView{{ $activities->id }} .small-card.disabled {
            opacity: 1;
            cursor: auto;
        }
    }
</style>
