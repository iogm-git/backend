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
                "<div><a href='https://mail.google.com/mail/?view=cm&fs=1&to=ilhamrhmtkbr@gmail.com'>ilhamrhmtkbrm@gmail.com</a>
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
    <link rel="icon" type="image/svg+xml" sizes="any" href="../logo-white.svg">
    <link rel="stylesheet" href="/blog/main.css">
    <link rel="stylesheet" href="/blog/assets--{{ $type }}/style.css">
    <script defer src="/blog/active--page.js"></script>
    <title>IOGM - Blog</title>
</head>

<body>
    <header><a href="profile" class="header__logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="175" height="175" shape-rendering="geometricPrecision"
                image-rendering="optimizeQuality" fill-rule="evenodd" viewBox="0 0 2157 2157">
                <path
                    d="M749 0c207 0 394 84 530 219 94 94 163 213 196 345-21-1-43-1-64-1-42 0-83 2-124 5-29-84-76-159-137-220-102-102-244-166-401-166-156 0-298 64-401 166-96 97-158 228-165 373-59 68-112 141-159 217C8 878 0 814 0 749c0-207 84-394 219-530C355 84 542 0 749 0zm189 1474c-60 16-124 24-189 24-179 0-343-62-472-167 24-59 52-115 84-168 95 89 221 146 360 153 68 58 141 111 217 158zM1407 0c207 0 395 84 530 219 136 136 220 323 220 530s-84 394-220 530c-94 94-212 163-345 196 1-21 2-43 2-64 0-42-2-83-5-124 83-29 158-76 219-137 103-102 166-244 166-401 0-156-63-298-166-401-96-96-227-158-373-165-68-59-140-112-217-159 61-16 124-24 189-24zM682 938c-16-60-24-124-24-189 0-179 63-343 168-472 58 24 114 52 168 84-89 95-146 221-153 360-59 68-112 141-159 217zm725-280c179 0 344 63 473 168-24 58-53 114-85 168-95-89-221-146-360-153-68-59-140-112-217-159 61-16 124-24 189-24zm-537 931c28 83 75 158 136 219 103 103 245 166 401 166 157 0 299-63 401-166 97-96 159-227 166-373 58-68 111-140 159-217 15 61 24 124 24 189 0 207-84 395-220 530-135 136-323 220-530 220s-394-84-529-220c-94-94-163-212-197-345 22 1 43 2 65 2 42 0 83-2 124-5zM568 870c-84 28-159 75-220 136-102 103-166 245-166 401 0 157 64 299 166 401 97 97 228 159 373 166 68 58 141 111 217 159-60 15-124 24-189 24-207 0-394-84-530-220C84 1802 0 1614 0 1407s84-394 219-529c94-94 213-163 345-197-1 22-1 43-1 65 0 42 2 83 5 124zm906 348c16 61 24 124 24 189 0 179-62 344-167 473-59-24-115-53-168-85 89-95 146-221 153-360 58-68 111-140 158-217z"
                    fill-rule="nonzero" />
                <path
                    d="M946 1078h-1c37-51 82-96 133-133v1-1c52 37 96 82 133 133h0 0c-37 52-81 96-133 133h0 0c-51-37-96-81-133-133h1zm132 345c150-74 271-195 345-345-74-149-195-271-345-344-149 73-271 195-344 344 73 150 195 271 344 345z" />
            </svg>
            <p>iogm.blog</p>
        </a>
        <div class="header__menu">
            @foreach ($menu as $m)
                <a href="/show?page={{ $m['type'] }}" class="header__menu-link"><svg class="header__menu-svg">
                        <use xlink:href="/blog/header--footer/sprite.svg#header--{{ $m['type'] }}"></use>
                    </svg>
                    <p class="header__menu-name">{{ $m['type'] }}</p>
                </a>
            @endforeach
        </div>
        <div class="header__onshop"><a href="{{ env('FRONTEND_URL_SHOP') }}/" target="_blank"
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
            <div class="footer__copy">&#169; Ilham Rahmat Akbar {{ date('Y') }} . All Rights Reserved </div>
        </div>
    </footer>
    <script src="/blog/main.js"></script>
</body>

</html>
