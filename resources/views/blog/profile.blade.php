@php
    $certificate = [
        'codepolitan' => [
            '<p>CODE<b>POLITAN</b></p>',
            'Codepolitan is an online learning platform for
programming in Indonesian which was specifically developed to help the younger generation learn and practice programming
in order to be able to compete in the
Industry 4.0 era.<br><br>Within 5 years, Codepolitan has developed into a learning platform for Indonesian programming
and a
trusted source for the younger generation of Indonesia. <br><a href="https://www.codepolitan.com/about">see the website</a>',
            [
                ['file' => '1 PHP Dasar', 'name' => 'Basic PHP', 'link' => 'https://www.codepolitan.com/c/GH43CTV'],
                ['file' => '2 Studi Kasus PHP Dasar_ Aplikasi Todolist', 'name' => 'Basic PHP Case Study : Todolist App', 'link' => 'https://www.codepolitan.com/c/SJJIZOP'],
                [
                    'file' => '3 PHP Object Oriented Programming',
                    'name' => 'PHP Object
Oriented Programming',
                    'link' => 'https://www.codepolitan.com/c/MW6REIY',
                ],
                [
                    'file' => '4 Fitur Baru PHP 8',
                    'name' => 'New
Features PHP 8',
                    'link' => 'https://www.codepolitan.com/c/U7851CK',
                ],
                ['file' => '5 Studi Kasus PHP OOP _ Aplikasi Todolist', 'name' => 'PHP Object Oriented Programmin Case Study: Todolist App', 'link' => 'https://www.codepolitan.com/c/75GB4VU'],
                ['file' => '6 MySQL Dasar', 'name' => 'Basic MySQL', 'link' => 'https://www.codepolitan.com/c/5UCBHPQ'],
                [
                    'file' => '7 PHP MySQL 
Database',
                    'name' => 'PHP MySQL Database',
                    'link' => 'https://www.codepolitan.com/c/JDAR8PC',
                ],
                ['file' => '8 Studi Kasus PHP MySQL - Aplikasi Todolist', 'name' => 'PHP MySQL Case Study : Todolist App', 'link' => 'https://www.codepolitan.com/c/Z8J3FWC'],
                ['file' => '9 Belajar HTTP', 'name' => 'Learn HTTP', 'link' => 'https://www.codepolitan.com/c/PI9HGNE'],
                ['file' => '10 PHP Web', 'name' => 'PHP WEB', 'link' => 'https://www.codepolitan.com/c/1NDA45V'],
                ['file' => '11 PHP Composer', 'name' => 'PHP Composer', 'link' => 'https://www.codepolitan.com/c/OVXEAAY'],
                ['file' => '12 PHP Unit Test', 'name' => 'PHP Unit Test', 'link' => 'https://www.codepolitan.com/c/V4V7ZYS'],
                ['file' => '13 PHP MVC', 'name' => 'PHP MVC', 'link' => 'https://www.codepolitan.com/c/7IMJQND'],
                ['file' => '14 Belajar RESTful API', 'name' => 'Learn RESTful API', 'link' => 'https://www.codepolitan.com/c/0DDQLI2'],
                ['file' => '15 Open API', 'name' => 'Open API', 'link' => 'https://www.codepolitan.com/c/Q5Z6J7I'],
                ['file' => '16 Membuat Web Login Management dengan PHP dan MySQL', 'name' => 'Creating Web Login Management with PHP and MySQL', 'link' => 'https://www.codepolitan.com/c/3MFUBVH'],
                ['file' => '17 PHP Logging', 'name' => 'PHP Logging', 'link' => 'https://www.codepolitan.com/c/KY27SH8'],
            ],
        ],
        'buildwithangga' => [
            '',
            'Website to learn design and code from mentors who are very experienced in their
respective fields. <br><a href="https://buildwithangga.com/">see the website</a>',
            [
                [
                    'file' => 'bwa-code-php-8-like-a-pro-mastering-website-development-ilham-rahmat-akbar',
                    'name' => 'Website Development:
PHP 8',
                    'link' => 'https://class.buildwithangga.com/talent/ilhamrhmtkbr/code-php-8-like-a-pro-mastering-website-development',
                ],
                ['file' => 'bwa-full-stack-web-developer-ilham-rahmat-akbar', 'name' => 'Full-Stack Website Developer', 'link' => 'https://class.buildwithangga.com/talent/ilhamrhmtkbr/full-stack-web-developer'],
            ],
        ],
        'dicoding' => [
            '',
            'A
technology education platform that helps produce digital talent of global
standards. <br><a href="https://www.dicoding.com/about">see the website</a>',
            [
                ['file' => 'dicoding-ilham-rahmat-akbar-belajar-dasar-pemrograman-javascript', 'name' => 'Basic Javascript Programming', 'link' => 'https://www.dicoding.com/certificates/L4PQ4L5YVXO1'],
                [
                    'file' => 'dicoding-ilham-rahmat-akbar-belajar-membuat-aplikasi-backend-untuk-pemula',
                    'name' => 'Creating Back-End Apps
for Beginners',
                    'link' => 'https://www.dicoding.com/certificates/07Z6RY1W2PQR',
                ],
            ],
        ],
    ];
    $keys = array_keys($certificate);
@endphp
@extends('blog.layout') @section('container') <section class="--active-link initial" id="exordium">
        <div class="initial__container container">
            <div class="initial__opening">
                <div class="initial__opening-first">
                    <p>Welcome to</p>
                    <div class="initial__typewritter">my <a class="typewrite" data-period="2000"
                            data-type='[ "Website.", "Portfolio.", "Article."]'><span class="wrap"></span></a></div>
                </div>
                <div class="initial__opening-second">Ilham Rahmat Akbar <small>Fullstack Developer</small></div>
            </div>
            <div class="initial__img"><img src="/blog/iogm.webp" alt=""><a
                    href="https://instagram.com/ilhamrhmtkbr"><svg class="svg--color">
                        <use xlink:href="/blog/header--footer/sprite.svg#footer--instagram"></use>
                    </svg></a><a href="https://www.linkedin.com/in/ilhamrhmtkbr/"><svg class="svg--color">
                        <use xlink:href="/blog/header--footer/sprite.svg#footer--linkedin"></use>
                    </svg></a><a href="https://github.com/iogm-git"><svg class="svg--color">
                        <use xlink:href="/blog/header--footer/sprite.svg#footer--github"></use>
                    </svg></a></div><a href="#introduction" class="initial__scroll">Scroll To Know <svg
                    class="initial__scroll-svg">
                    <use xlink:href="/blog/assets--profile/sprite.svg#initial--mouse"></use>
                </svg></a>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a
                href="#introduction" class="nav__link">Introduction</a><a href="#certificate" class="nav__link">My
                Certificate</a><a href="#website" class="nav__link">See Website</a><a href="#ask" class="nav__link">Ask
                Me</a>
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
    <section class="--active-link introduction" id="introduction">
        <div class="introduction__container container">
            <h2 class="introduction__title section__title" id="about">About</h2>
            <p class="introduction__subtitle section__subtitle">more info</p>
            <div class="introduction__category profile" onclick="openContent(0)">
                <p>Profile</p><svg class="introduction__category-icon">
                    <use xlink:href="/blog/assets--profile/sprite.svg#about--profile"></use>
                </svg>
            </div>
            <div class="introduction__category website" onclick="openContent(1)"><svg class="introduction__category-icon">
                    <use xlink:href="/blog/assets--profile/sprite.svg#about--website"></use>
                </svg>
                <p>Website</p>
            </div>
            <div class="introduction__acordion">
                <div class="introduction__boxs">
                    <div class="introduction__box-title">
                        <p>Background</p><a href="#about" class="introduction__button rotate"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--arrow"></use>
                            </svg></a>
                    </div>
                    <div class="introduction__box-content --active">
                        <p>My name is Ilham Rahmat Akbar, I am a Full Stack Developer from Bina Sarana Informatics
                            University, Faculty of Informatics Engineering, Information Systems study program. <br><br>To
                            strengthen my skills in web building, I have taken some programming course and get a
                            certificate. You can view them by scrolling down. </p>
                    </div>
                </div>
                <div class="introduction__boxs">
                    <div class="introduction__box-title">
                        <p>Ability</p><a href="#about" class="introduction__button"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--arrow"></use>
                            </svg></a>
                    </div>
                    <div class="introduction__box-content">
                        <p>I can't give a range of numbers on my skills assessment in website and design. You can see for
                            yourself how my website or design looks. Because basically people's judgments are different.</p>
                        <div class="introduction__group">
                            <div class="introduction__type">
                                <p class="introduction__type-title">Website</p>
                                <div class="introduction__type-content">
                                    <div class="introduction__card">
                                        <p>Frontend</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#html"></use>
                                            </svg><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#css"></use>
                                            </svg><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#javascript"></use>
                                            </svg></div>
                                    </div>
                                    <div class="introduction__card">
                                        <p>Backend</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#php"></use>
                                            </svg></div>
                                    </div>
                                    <div class="introduction__card">
                                        <p>DBMS</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#mysql"></use>
                                            </svg></div>
                                    </div>
                                    <div class="introduction__card">
                                        <p>REST API</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#restapi"></use>
                                            </svg></div>
                                    </div>
                                    <div class="introduction__card">
                                        <p>Framework</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#laravel"></use>
                                            </svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="introduction__type">
                                <p class="introduction__type-title">Design</p>
                                <div class="introduction__type-content">
                                    <div class="introduction__card">
                                        <p>Software</p>
                                        <div class="introduction__pack"><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#about--coreldrawx7"></use>
                                            </svg><svg>
                                                <use xlink:href="/blog/assets--profile/sprite.svg#about--photosop"></use>
                                            </svg></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="introduction__acordion">
                <div class="introduction__boxs">
                    <div class="introduction__box-title">
                        <p>History</p><a href="#about" class="introduction__button rotate"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--arrow"></use>
                            </svg></a>
                    </div>
                    <div class="introduction__box-content --active">
                        <p>On August 17, 2022, I started building this website. Its function is for my portfolio, digital
                            product offerings and information that I want to share. <br><br>I don't use frameworks and
                            templates, just some concepts from the framework that I apply. For example, in terms of
                            frontend, I implemented some css writing style like bootstrap framework. And on the backend, I
                            implemented mvc concepts like Codeigniter and Laravel. <br><br>The process of making this
                            website takes about 2 months. Starting from website design, determining user flow when
                            accessing, processing files/databases (so that the website size is small), and other
                            completeness. </p>
                    </div>
                </div>
                <div class="introduction__boxs">
                    <div class="introduction__box-title">
                        <p>Why not use a framework on a website like this?</p><a href="#about"
                            class="introduction__button"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--arrow"></use>
                            </svg></a>
                    </div>
                    <div class="introduction__box-content">
                        <p>Because the website you are currently accessing does not have financial transactions, it only
                            focuses on displaying what I want to convey. And if I use a framework my website size gets big,
                            I don't like that. Unlike my online shop website, I chose the Laravel framework for certain
                            reasons that I can't explain here. And for the frontend I just use css. </p>
                    </div>
                </div>
                <div class="introduction__boxs">
                    <div class="introduction__box-title">
                        <p>Character</p><a href="#about" class="introduction__button"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--arrow"></use>
                            </svg></a>
                    </div>
                    <div class="introduction__box-content">
                        <div class="introduction__chart"><svg>
                                <use xlink:href="/blog/assets--profile/sprite.svg#about--chart"></use>
                            </svg>
                            <p>Basically I'm more concerned with the purpose of making a website than how it looks. Not too
                                concerned with appearance, but still pay attention. I hope the visitors of this website do
                                not feel disturbed by the appearance of this website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="--active-link certificate" id="certificate">
        <div class="certificate__container container">
            <div class="certificate__logo"><svg class="certificate__logo-svg">
                    <use xlink:href="/blog/assets--profile/sprite.svg#certificate--logo"></use>
                </svg>
                <div>
                    <h2 class="section__title">My Certificate</h2>
                    <p class="section__subtitle">to strengthen my skills</p>
                </div>
            </div>
            @for ($a = 0; $a < count($certificate); $a++)
                <div class="certificate__category {{ $keys[$a] }}">
                    <div class="certificate__title"><svg class="certificate__title-svg">
                            <use xlink:href="/blog/assets--profile/sprite.svg#certificate--{{ $keys[$a] }}"></use>
                        </svg>{!! $certificate[$keys[$a]][0] !!} </div>
                    <p class="font__text">{!! $certificate[$keys[$a]][1] !!}</p>
                    <div class="certificate__content">
                        @foreach ($certificate[$keys[$a]][2] as $file)
                            <div class="certificate__card"><img src="/blog/assets--profile/pdf/{{ $file['file'] }}.webp"
                                    alt="" class="certificate__img">
                                <div class="certificate__card-title"><svg class="certificate__card-svg">
                                        <use xlink:href="/blog/assets--profile/sprite.svg#certificate--verified"></use>
                                    </svg>
                                    <p>{{ $file['name'] }}</p>
                                </div><a href="{{ $file['link'] }}" target="_blank">Check Certificate Validity <svg>
                                        <use xlink:href="/blog/assets--profile/sprite.svg#certificate--validity"></use>
                                    </svg></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </section>
    <section class="--active-link closing" id="website">
        <div class="closing__container container">
            <h2 class="section__title">Please click <a href="/blog/show?page=website">here</a> to see a sample website
                <br>what
                have I
                done </h2>
        </div>
    </section>
<script src="/blog/assets--profile/script.js"></script>@endsection
