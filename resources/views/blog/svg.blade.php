@php
    $tutorial = [
        [
            'tutorial',
            'How to make a Svg icon',
            "In this tutorial I use Corel Draw X7 software to create an svg file. But if you want to use other software
is also not a problem. The important thing is that you understand how create an output file of type svg.
Follow the tutorial below to get started.",
            '<div>1.</div><div>Open the software you normally use to create graphic objects.</div><div>2.</div><div>Create a 2-dimensional object as desired.</div><div>3.</div><div>Once done, you can export it in svg format. If using corel draw, you can click File >Export >SVG (selected only) >And use the format: Svg 1 . 1 , Unicode - UTF-8 , Presentation Attributes, 1:1000 units, 256, as text.</div><div>4.</div><div>Done.</div>',
            "If you don't understand how, you can click this video link to understand in more detail
about making svg icon using corel draw x7 software.",
            'ayihswKlreY',
        ],
        ['sprite', 'What if multiple svg files are created into one file?', "The method is quite easy, but I highly recommend before making it into a single file, it's good to reduce the size of the svg file first. For more details, please follow the steps below.", "<div>1.</div><div>Type in the browser “Minify SVG” and open it at the very top link.</div><div>2.</div><div>Insert your svg file, and download it when you're done.</div><div>3.</div><div>After all the svg files are downloaded, type in the browser “svg sprite” and open the first link.</div><div>4.</div><div>Click “Insert File” and select the reduced size svg file.</div><div>5.</div><div>Download sprites.</div><div>6.</div><div>Done.</div>", 'To clarify, I provide a video tutorial below.', 'ayihswKlreY'],
        [
            'use',
            'How to use svg files?',
            'To use it, you just need to copy the code below and customize it with your line of code.',
            "<a href=\"assets--svg/demo.html\" download>Download File</a><div class=\"tutorial__highlighter\"><pre>&lt;svg class='icon'&gt;</pre><pre>&nbsp;&nbsp;&lt;use xlink:href='sprite.svg#example'&gt;</pre><pre>&lt;svg&gt;</pre></div>",
            "demo.html content is svg sprites concatenated into one file. And when opened successfully appears. But what if we want to create separate svg files?. The answer is to replace the file with the php extension. Until now I don't know the answer to the question \"Why can't svg not appear in html?\". I have tried many times to display the svg in the html file, but it still won't display. When I try to change the extension to php, the svg graphic object can be displayed. I've searched for answers on the internet, and until now I have not been able to conclude what causes it. The html5 team has clarified this point, that the &lt;use&gt; tag is no longer supported. But if I replace it with the php file extension it can still be displayed. Below I made an example of the video, thank you.",
            'ayihswKlreY',
        ],
    ];
@endphp @extends('blog.layout')
@section('container')
    <section class="initial" id="exordium">
        <div class="initial__container container">
            <h2 class="section__title">About SVG</h2>
            <p class="section__subtitle">explication</p>
            <div class="initial__boxs">
                <div class="initial__box">
                    <div class="initial__title">What is Svg?</div>
                    <div class="initial__content font__text">Scalable Vector Graphics or SVG is a language for describing
                        two-dimensional graphics in XML. Usually svg is used in websites to display logos, images, web icons
                        and other related things with two-dimensional objects. </div>
                </div>
                <div class="initial__box">
                    <div class="initial__title">Why Svg?</div>
                    <div class="initial__content font__text">Because when tested on a website, svg is able to maintain a
                        perfect and good resolution when enlarged and when reduced. In contrast to using image formats whose
                        file extensions are jpg, png, and jpeg, when resizing it looks a little blurry. </div>
                </div>
                <div class="initial__box">
                    <div class="initial__title">Use of Svg?</div>
                    <div class="initial__content font__text">Svg is used to display 2-dimensional images, such as vectors,
                        graphic objects, and others. If you wish display a photo of a 3-dimensional object, then you must
                        select the type of image jpeg, jpg, and png. There isn't any basically an svg image can display a
                        3-dimensional object. </div>
                </div>
            </div>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a href="#tutorial"
                class="nav__link">Tutorial</a><a href="#sprite" class="nav__link">Sprite</a><a href="#use"
                class="nav__link">Use SVG</a><a href="#ask" class="nav__link">Ask Me</a>
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
    @for ($i = 0; $i < count($tutorial); $i++)
        <section class="tutorial" id="{{ $tutorial[$i][0] }}">
            <div class="tutorial__container container">
                <h2 class="section__title">{{ $tutorial[$i][1] }}</h2>
                <p class="section__subtitle">tutorial</p>
                <div class="tutorial__content font__text">{{ $tutorial[$i][2] }} <br><br>
                    <div class="tutorial__step">{!! $tutorial[$i][3] !!} </div><br>{!! $tutorial[$i][4] !!}
                </div><br>{{-- <iframe src="https://www.youtube.com/embed/{{ $tutorial[$i][5]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            </div>
        </section>
    @endfor
@endsection
