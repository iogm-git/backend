@php
    $menu = [['type' => 'profile'], ['type' => 'website'], ['type' => 'design'], ['type' => 'css'], ['type' => 'svg'], ['type' => 'api']];
    $footers = [
        'services' => [
            [
                'help',
                "<div>How to order ?</div>
<div>Please <a href='{{ env('FRONTEND_URL') }}/gate/login'>Sig In</a> to select my product. And if you have any questions, please contact my registered contacts.</div>",
            ],
            ['payment', '<div>Follow the transaction flow available on the sales page.</div>'],
        ],
        'accounts' => [
            [
                'instagram',
                "<div><a href='https://www.instagram.com/ilhamrhmtkbr'>ilhamrhmtkbr</a>
    <p class='footer__link-subtitle'>personal account</p>
</div>
<div><a href='https://www.instagram.com/iogm.web'>iogm.web</a>
    <p class='footer__link-subtitle'>website account</p>
</div>
<div><a href='https://www.instagram.com/iogm.design'>iogm.design</a>
    <p class='footer__link-subtitle'>design account</p>
</div>",
            ],
            [
                'linkedin',
                "<div>click <a href='https://id.linkedin.com/in/ilhamrhmtkbr?trk=profile-badge'>ilhamrhmtkbr</a>
    <p class='footer__link-subtitle'>my-cv</p>
</div>",
            ],
            [
                'dribble',
                "<div><a href='https://dribbble.com/nighdesignbyilhamra'>nighdesignbyilhamra</a>
    <p class='footer__link-subtitle'>design account</p>
</div>",
            ],
            [
                'github',
                "<div><a href='https://github.com/iogm-github/'>iogm-github</a>
    <p class='footer__link-subtitle'>my library</p>
</div>",
            ],
        ],
        'contacts' => [
            [
                'whatsapp',
                "<div><a href='#'>coming soon</a>
    <p class='footer__link-subtitle'>just for bussines</p>
</div>",
            ],
            [
                'email',
                "<div><a href='https://mail.google.com/mail/?view=cm&fs=1&to=ilhamrhmtkbrm@gmail.com'>ilhamrhmtkbrm@gmail.com</a>
    <p class='footer__link-subtitle'>just for bussines</p>
</div>",
            ],
            [
                'telegram',
                "<div><a href='https://t.me/ilhamrhmtkbr'>ilhamrhmtkbr</a>
    <p class='footer__link-subtitle'>just for bussines</p>
</div>",
            ],
        ],
    ];
    $key__footers = array_keys($footers);
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" sizes="any" href="../logo.svg">
    <link rel="stylesheet" href="/blog/main.css">
    <link rel="stylesheet" href="/blog/assets--{{ $type }}/style.css">
    <script defer src="/blog/active--page.js"></script>
    <title>iogm.blog</title>
</head>

<body>
    <header><a href="profile" class="header__logo"><img src="/logo.svg" alt="">
            <p>iogm.blog</p>
        </a>
        <div class="header__menu">
            @foreach ($menu as $m)
                <a href="/blog/show?page={{ $m['type'] }}" class="header__menu-link"><svg class="header__menu-svg">
                        <use xlink:href="/blog/header--footer/sprite.svg#header--{{ $m['type'] }}"></use>
                    </svg>
                    <p class="header__menu-name">{{ $m['type'] }}</p>
                </a>
            @endforeach
        </div>
        <div class="header__onshop"><a href="{{ env('FRONTEND_URL') }}/" target="_blank"
                class="header__onshop-link"><svg class="header__onshop-svg svg--color">
                    <use xlink:href="/blog/header--footer/sprite.svg#header--basket"></use>
                </svg></a></div>
    </header>@yield('container') <footer class="--active-link" id="ask">
        @for ($i = 0; $i < count($footers); $i++)
            <div class="footer__content"><svg class="footer__background">
                    <use xlink:href="/blog/header--footer/sprite.svg#footer--{{ $key__footers[$i] }}"></use>
                </svg>
                <h3 class="footer__title">{{ $key__footers[$i] }}</h3>
                @for ($j = 0; $j < count($footers[$key__footers[$i]]); $j++)
                    <div class="footer__box-link"><svg class="footer__svg svg--color">
                            <use xlink:href="/blog/header--footer/sprite.svg#footer--arrow"></use>
                        </svg>
                        <p class="footer__subtitle">{{ $footers[$key__footers[$i]][$j][0] }}</p><svg
                            class="footer__svg svg--color">
                            <use
                                xlink:href="/blog/header--footer/sprite.svg#footer--{{ $footers[$key__footers[$i]][$j][0] }}">
                            </use>
                        </svg>
                        <div class="footer__link">
                            <div class="footer__link-content">{!! $footers[$key__footers[$i]][$j][1] !!} </div>
                            <div class="footer__link-close">&times;</div>
                        </div>
                    </div>
                @endfor
            </div>
        @endfor
        <div class="footer__copyright">
            <div class="footer__profile"><img src="/blog/profile.webp" alt="photo" class="footer__img">
                <div class="footer__profile-description">
                    <div class="footer__profile-name">Ilham Rahmat Akbar <br><small>Fullstack Developer</small></div>
                    <div class="footer__profile-location"><svg class="footer__profile-svg svg--color">
                            <use xlink:href="/blog/header--footer/sprite.svg#footer--location"></use>
                        </svg>Central Jakarta, Indonesia </div>
                </div>
            </div>
            <div class="footer__copy">&#169; iogm {{ date('Y') }} . All Rights Reserved </div>
        </div>
    </footer>
    <script src="/blog/main.js"></script>
</body>

</html>
