@php
    $websites = [
        'Website' => [' A website that is used to share information that you want to share with internet users. Can be used for portfolios, blogs, articles, and others according to needs.', ['portfolio-app_a', 'sport-app_a', 'portfolio-app_b', 'portfolio-app_c', 'blog-app_b', 'portfolio-app_d', 'portfolio-app_e', 'blog-app_a']],
        'Application' => ["In purpose, the application is the same as the website. If the website can only convey information, then the application can interact with the user. In an increasingly sophisticated era, activities that are required to come somewhere can now be done online. As before during the 2020 pandemic, several companies carried out work activities that were carried out remotely or when they heard the term 'work from home'. It's the same as shopping, just by opening the website, you can choose the product you want through the system that has been set. Below are some examples of websites I have created.", ['building-app_a', 'car-app_a', 'coffe-app_a', 'cloth-app_a', 'cloth-app_b', 'cloth-app_c', 'course-app_a', 'phone-app_a', 'phone-app_b', 'food-app_a', 'headphone-app_a']],
    ];
    $keys = array_keys($websites);
@endphp
@extends('blog.layout')
@section('container') <section class="--active-link initial" id="exordium">
        <div class="initial__container container">
            <div class="initial__animation"><svg class="initial__svg">
                    <use xlink:href="/blog/assets--website/sprite.svg#initial--website"></use>
                </svg>
                <h3>WWW</h3>
            </div>
            <div class="initial__content">
                <h2 class="section__title">Explication </h2>
                <p class="section__subtitle">Flash </p>
                <p class="initial__subcontent font__text">The web is a collection of information available on computers that
                    continuously connected via the internet. The website may contain: information in any form such as text,
                    images, audio, video and others. <br><br>Below are some types of websites that I have created. and if
                    you are curious, please click the demo button to see more clearly. </p>
            </div>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a href="#Website"
                class="nav__link">Website</a><a href="#Application" class="nav__link">Application</a><a href="#ask"
                class="nav__link">Ask Me</a>
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
    @for ($a = 0; $a < count($websites); $a++)
        <section class="--active-link website" id="{{ $keys[$a] }}">
            <div class="website__container container">
                <h2 class="section__title">{{ $keys[$a] }}</h2>
                <p class="website__description font__text">{{ $websites[$keys[$a]][0] }}</p>
                <div class="website__example">
                    <div class="website__sample">
                        @for ($b = 0; $b < count($websites[$keys[$a]][1]); $b++)
                            @php $web=explode('-', $websites[$keys[$a]][1][$b]); @endphp
                            <div class="website__device"><a class="website__demo"
                                    href="demo?category={{ $web[0] . '&type=' . $web[1] }}&url=website">Demo <svg>
                                        <use xlink:href="/blog/assets--website/sprite.svg#website--demo"></use>
                                    </svg></a><img
                                    src="../web/webp/{{ $websites[$keys[$a]][1][$b] }}.webp?v{{ time() }}"
                                    alt=""></div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
    @endfor
    <section class="closing">
        <div class="closing__container container">
            <h2 class="section__title">My Opinion</h2>
            <p class="section__subtitle">about Framework</p>
            <div class="closing__content font__text">The factor of using the framework must be seen from the desired
                timeframe or tempo. If you want a website to finish quickly in construction, a framework is needed.
                <br><br>As a website builder, I see that having a framework can save free time for developers. In addition,
                many companies are already using the framework, because the security system is guaranteed, easy to do unit
                tests, and so on. <br><br>The reason I don't use the framework on this website is because I currently have
                quite a lot of free time in the manufacturing process. Starting from designing web flows, views, minimizing
                lines of code, and so on.
            </div>
        </div>
</section>@endsection
