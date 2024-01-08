@php
    $icons = [
        'Equipment' => [['Code', '1.47 kb'], ['Design', '2.88 kb'], ['Film', '566 bytes'], ['Keyboard', '1.6 kb'], ['Stick', '1.16 kb'], ['Vector', '1.65 kb']],
        'Instrument' => [['Drum-a', '2.70 kb'], ['Drum-b', '3.40 kb'], ['Flamenco', '1.57 kb'], ['Guitar-a', '1.87 kb'], ['Guitar-b', '2.17 kb'], ['Guitar-c', '1.07 kb'], ['Guitar-d', '1.08 kb'], ['Guitar-e', '2.27 kb'], ['Piano', '2.36 kb']],
        'Medic' => [['Female Doctor', '2.65 kb'], ['Health', '873 bytes'], ['Inoculation', '1.09 kb'], ['Male Doctor-a', '2.15 kb'], ['Male Doctor-b', '2.83 kb']],
        'Social Media' => [['Facebook', '548 bytes'], ['Instagram', '1.32 kb'], ['Line', '1.33 kb'], ['Linkedln', '1.37 kb'], ['Telegram', '547 bytes'], ['Tiktok', '3.21 kb'], ['Twitter', '704 bytes'], ['Whatsapp', '1.13 kb'], ['Youtube', '535 bytes']],
        'Software' => [['Adobe', '2.64 kb'], ['Coreldraw', '1.17 kb'], ['Excel', '1.57 kb'], ['Powerpoint', '1.84 kb'], ['Premiere', '643 bytes'], ['Word', '1.64 kb']],
        'Tools Website' => [['Arrow', '2.64 kb'], ['Ask', '1.17 kb'], ['Contact', '1.57 kb'], ['Date', '1.84 kb'], ['Email', '643 bytes'], ['Home', '1.64 kb'], ['Info', '1.64 kb'], ['Like', '1.64 kb'], ['Location', '1.64 kb'], ['Love', '1.64 kb'], ['Magnifying', '1.64 kb'], ['Money', '1.64 kb'], ['Paid', '1.64 kb'], ['Service-a', '1.64 kb'], ['Service-b', '1.64 kb'], ['Turn Off', '1.64 kb'], ['Turn On', '1.64 kb'], ['Verified', '1.64 kb']],
        'Transportation' => [['Car', '1005 bytes'], ['Jet', '1.13 kb'], ['Motorcycle', '1.70 kb'], ['Plane', '656 bytes'], ['Sedan', '1.46 kb'], ['Ship', '1.20 kb'], ['Truck', '3.53 kb'], ['Vespa-a', '1.38 kb'], ['Vespa-b', '1009 bytes']],
    ];
    $keys = array_keys($icons);
@endphp
@extends('blog.layout')
@section('container') <section class="--active-link initial" id="exordium">
        <div class="initial__container container"><svg>
                <use xlink:href="/blog/assets--design/sprite.svg#initial--design"></use>
            </svg>
            <div class="initial__text">
                <h2 class="section__title">Explication</h2>
                <p class="section__subtitle">Flash</p>
                <p class="initial__content font__text">According to the Oxford dictionary design is "a plan or drawing made
                    to show the appearance and function of a building, clothing, or other object before it is actually
                    made". <br><br>The world of design is quite wide, but I only focus on design for digital products.
                    <br><br>Below are some examples of designs that I have created.
                </p>
            </div>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a href="#logo"
                class="nav__link">Logo</a><a href="#icon" class="nav__link">Icon</a><a href="#illustration"
                class="nav__link">Illustration</a><a href="#ask" class="nav__link">Ask Me</a>
        </div>
        <div class="nav__button" onclick="showLinks()"><svg>
                <use xlink:href="/blog/header--footer/sprite.svg#nav--click"></use>
            </svg>
            <p>open</p>
        </div>
    </nav><button class="button__theme"><svg>
            <use xlink:href="/blog/header--footer/sprite.svg#button--theme"></use>
        </svg>
        <div class="button__type"><span>light</span>
            <p>theme</p>
        </div>
    </button>
    <section class="--active-link logo" id="logo">
        <div class="logo__container container">
            <h2 class="section__title">Logo</h2>
            <p class="section__subtitle">identifier</p>
            <p class="logo__explication font__text">A logo is an image or just a sketch with a certain meaning, and
                represents a meaning from a company, region, organization, product, country, institution, and other things
                that require something short and easy to remember as a substitute for the real name. The logo must have a
                basic philosophy and framework in the form of a concept with the aim of creating a stand-alone or
                independent character. Logos are more commonly known by sight or visuals, such as the characteristics in the
                form of the color and shape of the logo.</p>
            <div class="logo__slideshow">
                <div class="logo__button-prev" onclick="move(-1)">
                    <div class="logo__prev"></div>
                </div>
                <div class="logo__main">
                    <div class="logo__main-img"></div>
                </div>
                <div class="logo__button-next" onclick="move(1)">
                    <div class="logo__next"></div>
                </div>
                <div class="logo__orders">
                    @for ($i = 1; $i < 8; $i++)
                        <div class="logo__order"
                            style="background-image: url('/blog/assets--design/logo/logo__{{ $i }}.svg');"
                            onclick="current({{ $i }})"></div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <section class="--active-link icon" id="icon">
        <div class="icon__container container">
            <div class="icon__heading">
                <h2 class="section__title">Icon</h2>
                <p class="section__subtitle">or symbol</p>
                <p class="icon__conten font__text">The icon below serves as a symbol of a navigational aid which functions
                    to make it easier to clarify a section, button, and tool on a website page.</p>
            </div>
            <div class="icon__tablinks">
                @for ($i = 0; $i < count($icons); $i++)
                    <div class="icon__tablink" onclick="openContent({{ '\'' . $keys[$i] . '\'' . ', ' . $i }})"><svg>
                            <use xlink:href="/blog/assets--design/icon/sprite.svg#icon--{{ $keys[$i] }}"></use>
                        </svg>
                        <p>{{ $keys[$i] }}</p>
                    </div>
                @endfor
            </div>
            @for ($i = 0; $i < count($icons); $i++)
                <div id="{{ $keys[$i] }}" class="icon__tabcontainer">
                    <div class="icon__tabcontainer-title">{{ $keys[$i] }}</div>
                    <div class="icon__tabcontainer-content">
                        @for ($j = 0; $j < count($icons[$keys[$i]]); $j++)
                            <div class="icon__card">
                                <div class="icon__img"><img
                                        src="/blog/assets--design/icon/{{ $keys[$i] . '/' . $icons[$keys[$i]][$j][0] }}.svg">
                                </div>
                                <div class="icon__description">
                                    <div class="icon__name">{{ $icons[$keys[$i]][$j][0] }}.svg</div>
                                    <div class="icon__size"><small>{{ $icons[$keys[$i]][$j][1] }}</small></div>
                                </div><a
                                    href="/blog/assets--design/icon/{{ $keys[$i] . '/' . $icons[$keys[$i]][$j][0] }}.svg"
                                    download>Free Download </a>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
        </div>
    </section>
    <section class="--active-link illustration" id="illustration">
        <div class="illustration__container container">
            <h2 class="section__title">Illustration</h2>
            <p class="section__subtitle">my free time</p>
            <div class="illustration__slider"><img src="/blog/assets--design/illustration/illustration__1.svg"
                    alt=""><img src="/blog/assets--design/illustration/illustration__2.svg" alt=""><img
                    src="/blog/assets--design/illustration/illustration__3.svg" alt=""><img
                    src="/blog/assets--design/illustration/illustration__4.svg" alt=""></div>
        </div>
    </section>
    <section class="closing">
        <div class="closing__container container">
            <h2 class="section__title">The design above is just an example</h2>
            <p class="section__subtitle">for more details please see my design account below.</p>
        </div>
    </section>
<script src="/blog/assets--design/script.js"></script>@endsection
