<p>With Carousel Anything, any type of content, snippet, or component can be added and displayed as a grouped carousel. This LBCC version uses Swiper.js with a draggable scrollbar plus previous, next, and pause controls aligned in a shared control row.</p>

<div
    class="component-carousel-anything"
    data-lbcc-carousel-anything
    data-mobile-items="1"
    data-tablet-items="2"
    data-desktop-items="3"
    data-autoplay="true"
>
    <div class="swiper" data-lbcc-carousel-swiper>
        <div class="swiper-wrapper align-items-stretch">
            <div class="swiper-slide h-auto">
                <div class="swiper-slide-content h-100">
                    <?php
                    component_card(
                        'My Heading 2 Title',
                        '<div class="bg-yellow-300 rounded-2 p-3 mb-3"><h3 class="fs-6 my-0">Notification Title</h3></div><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros, sit amet volutpat elit congue id.</p>',
                        [
                            ['link' => '#', 'text' => 'Do Something', 'style' => 'btn-primary']
                        ],
                        '_resources/images/hero-backgrounds/hero-bg-3.jpg',
                        'white',
                        'button',
                        true
                    );
                    ?>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="swiper-slide-content h-100">
                    <?php
                    component_card(
                        'Explore Student Support',
                        '<p>Get connected to counseling, tutoring, wellness support, and services that help students stay on track.</p><ul class="mb-0"><li>Academic counseling</li><li>Learning support</li><li>Student wellness resources</li></ul>',
                        [
                            ['link' => '#', 'text' => 'Find Support Services'],
                            ['link' => '#', 'text' => 'Contact a Counselor']
                        ],
                        '',
                        'surface-water',
                        'arrow-link'
                    );
                    ?>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="swiper-slide-content h-100">
                    <?php
                    component_card_as_link(
                        '#',
                        'Discover Campus Life',
                        'Events, clubs, and spaces that help students connect on campus.',
                        'image-bg',
                        '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                        'Student Life'
                    );
                    ?>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="swiper-slide-content h-100">
                    <?php
                    component_card(
                        'Financial Aid Guidance',
                        '<p>Learn how to apply for grants, scholarships, and other funding opportunities at LBCC.</p>',
                        [
                            ['link' => '#', 'text' => 'Apply for Financial Aid', 'style' => 'btn-primary'],
                            ['link' => '#', 'text' => 'Scholarship Opportunities', 'style' => 'btn-outline-secondary']
                        ],
                        '_resources/images/hero-backgrounds/hero-bg-9.jpg',
                        'red-border',
                        'button'
                    );
                    ?>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="swiper-slide-content h-100">
                    <?php
                    component_card_as_link(
                        '#',
                        'Career Education Pathways',
                        'Hands-on programs that connect learning to industry and career opportunity.',
                        'teal-border-thick',
                        '_resources/images/hero-backgrounds/hero-bg-15.jpg'
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="component-carousel-anything__controls d-flex align-items-center flex-nowrap gap-2 mt-4">
        <div class="swiper-scrollbar component-carousel-anything__scrollbar flex-grow-1" data-lbcc-carousel-scrollbar></div>

        <div class="component-carousel-anything__buttons d-flex align-items-center gap-2 flex-shrink-0">
            <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-prev aria-label="Previous slide">
                <span class="fa-sharp fa-regular fa-arrow-left" aria-hidden="true"></span>
            </button>

            <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-next aria-label="Next slide">
                <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
            </button>

            <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-toggle aria-label="Pause carousel autoplay" aria-pressed="false">
                <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-carousel-icon="pause"></span>
                <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-carousel-icon="play"></span>
            </button>
        </div>
    </div>
</div>

<h3 class="h5 mb-3 mt-4">Options</h3>
<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Field</th>
                <th scope="col">Values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mobile # of Items</td>
                <td><p>Numeral, usually 1 for mobile.</p></td>
            </tr>
            <tr>
                <td>Tablet # of Items</td>
                <td><p>Numeral.</p></td>
            </tr>
            <tr>
                <td>Desktop # of Items</td>
                <td><p>Numeral. Default is typically 3.</p></td>
            </tr>
            <tr>
                <td>Autoplay?</td>
                <td><p><code>true</code> or <code>false</code>. When enabled, the pause control is shown in the control row.</p></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><p>Any card, component, snippet, or mixed content that can live inside each slide.</p></td>
            </tr>
        </tbody>
    </table>
</div>
