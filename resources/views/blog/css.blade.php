@extends('blog.layout')
@section('container')
    <section class="initial" id="exordium">
        <div class="initial__container container">
            <h2 class="section__title">My Css</h2>
            <p class="section__subtitle">Structure</p>
            <div class="initial__boxs">
                <div class="initial__box">
                    <p>Parent</p>
                    <div class="initial__vessel">
                        <pre>name__</pre>
                    </div>
                </div>
                <div class="initial__box">
                    <p>Child</p>
                    <div class="initial__vessel">
                        <pre>title</pre>
                        <pre>&emsp;&emsp;content</pre>
                        <pre>&emsp;&emsp;&emsp;&emsp;description</pre>
                        <pre>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;category</pre>
                    </div>
                </div>
                <div class="initial__box">
                    <p>Element</p>
                    <div class="initial__vessel">
                        <pre>image</pre>
                        <pre>&emsp;&emsp;type</pre>
                        <pre>&emsp;&emsp;&emsp;&emsp;size</pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a href="#combine"
                class="nav__link">Combine</a><a href="#framework" class="nav__link">Framework</a><a href="#ask"
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
    <section class="combine" id="combine">
        <div class="combine__container container">
            <div class="combine__title">
                <h2 class="section__title">Combine</h2>
                <p class="section__subtitle">example</p>
            </div>
            <div class="combine__example">
                <p class="combine__content font__text">To combine it is quite easy, just make the name of the outer
                    packaging with a word that is unique, distinctive, and not identical with the next part. Below I will
                    explain the differences in writing code that I think is good and not, because every programmer has his
                    own tricks in managing code. </p>
                <div class="combine__box">
                    <div class="combine__vessels">
                        <div class="combine__vessels-title">Writing a long class will affect the size of the document file.
                            So instead of writing code like this</div>
                        <div class="combine__vessel">
                            <pre>&lt;!DOCTYPE html&gt;</pre><br>
                            <pre>&lt;section class="example" id="example"&gt;</pre>
                            <pre>&emsp;&emsp;&lt;article class="card"&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;h2 class="title"&gt; title &lt;/h2&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;p class="subtitle"&gt; subtitle &lt;/p&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;p class="content"&gt; content &lt;/p&gt;</pre>
                            <pre>&emsp;&emsp;&lt;/article&gt;</pre>
                            <pre>&lt;/section&gt;</pre>
                        </div>
                        <div class="combine__vessel">
                            <pre>style.css</pre><br><br>
                            <pre>section.example#example{</pre>
                            <pre>&emsp;&emsp;background-color: hsl( 0, 0%, 9%); </pre>
                            <pre>&emsp;&emsp;display: grid; </pre>
                            <pre>&emsp;&emsp;place-items: center; </pre>
                            <pre>}</pre><br>
                            <pre>section.example#example article.card{</pre>
                            <pre>&emsp;&emsp;display: grid;</pre>
                            <pre>&emsp;&emsp;place-items: center start;</pre>
                            <pre>&emsp;&emsp;width: 253px;</pre>
                            <pre>&emsp;&emsp;height: 512px;</pre>
                            <pre>&emsp;&emsp;background-color: hsla( 0, 0%, 13%, 30%);</pre>
                            <pre>}</pre><br>
                            <pre>section.example#example article.card h2.title,</pre>
                            <pre>section.example#example article.card p.subtitle,</pre>
                            <pre>section.example#example article.card p.content{</pre>
                            <pre>&emsp;&emsp;color: #fff;</pre>
                            <pre>&emsp;&emsp;font-size: var(--xlarge)</pre>
                            <pre>}</pre><br>
                            <pre>section.example#example article.card p.subtitle{</pre>
                            <pre>&emsp;&emsp;font-size: smaller</pre>
                            <pre>}</pre><br>
                            <pre>section.example#example article.card p.content{</pre>
                            <pre>&emsp;&emsp;font-size: medium</pre>
                            <pre>}</pre>
                        </div>
                    </div>
                    <div class="combine__vessels">
                        <div class="combine__vessels-title">Better like this</div>
                        <div class="combine__vessel">
                            <pre>&lt;!DOCTYPE html&gt;</pre><br>
                            <pre>&lt;section class="example" id="--optional"&gt;</pre>
                            <pre>&emsp;&emsp;&lt;article class="example__card"&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;h2 class="example__title"&gt; title &lt;/h2&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;p class="example__subtitle"&gt; subtitle &lt;/p&gt;</pre>
                            <pre>&emsp;&emsp;&emsp;&emsp;&lt;p class="example__content"&gt; content &lt;/p&gt;</pre>
                            <pre>&emsp;&emsp;&lt;/article&gt;</pre>
                            <pre>&lt;/section&gt;</pre>
                        </div>
                        <div class="combine__vessel">
                            <pre>style.css</pre><br><br>
                            <pre>.example{</pre>
                            <pre>&emsp;&emsp;background-color: hsl( 0, 0%, 9%); </pre>
                            <pre>&emsp;&emsp;display: grid; </pre>
                            <pre>&emsp;&emsp;place-items: center; </pre>
                            <pre>}</pre><br>
                            <pre>.example__card{</pre>
                            <pre>&emsp;&emsp;display: grid;</pre>
                            <pre>&emsp;&emsp;place-items: center start;</pre>
                            <pre>&emsp;&emsp;width: 253px;</pre>
                            <pre>&emsp;&emsp;height: 512px;</pre>
                            <pre>&emsp;&emsp;background-color: hsla( 0, 0%, 13%, 30%);</pre>
                            <pre>}</pre><br>
                            <pre>.example__title,</pre>
                            <pre>.example__subtitle,</pre>
                            <pre>.example__content{</pre>
                            <pre>&emsp;&emsp;color: #fff;</pre>
                            <pre>&emsp;&emsp;font-size: var(--xlarge)</pre>
                            <pre>}</pre><br>
                            <pre>.example__subtitle{</pre>
                            <pre>&emsp;&emsp;font-size: smaller</pre>
                            <pre>}</pre><br>
                            <pre>.example__content{</pre>
                            <pre>&emsp;&emsp;font-size: medium</pre>
                            <pre>}</pre>
                        </div>
                    </div>
                </div>
                <p class="combine__content font__text">In the end we as programmers will set the display on different
                    devices such as laptops, tablets and smartphones. In this case, CSS acts as a bridge between devices to
                    make it responsive. The example above is only a small part that I show, so what if your website is as
                    big as it is known today? Of course minimizing those lines of code is very important. The goal is that
                    the website loads quickly when it is opened by internet users. </p>
            </div>
        </div>
    </section>
    <section class="css" id="framework">
        <div class="css__container container">
            <h2 class="section__title">Framework ?</h2>
            <p class="section__subtitle">my opinion</p>
            <div class="css__explanation font__text">In building this website, I have previously formulated css that can
                reused like templates. So when I need that part same, I can easily type in fewer lines of code. If you are
                familiar with CSS frameworks, you will surely ask "Why not using a framework?” . <br><br>I think the
                existence of a css framework is very helpful for website developers, such as the website development process
                is becoming more fast and easy. So developers have more time free to do other activities. But I prefer not
                to use css framework. Because when compared, writing that only uses css save more storage than using
                framework. As an example, when using the css framework, there must be a line of code that we don't Use. And
                it will definitely be part of a website. <br><br>An example of an analogy like this, there are food products
                such as instant noodles. This product contains noodles and spices. The contents of the seasoning are oil,
                soy sauce, and sauce. In this case, think of the framework as a spice. When you want to cook this food
                product, of course we bought it with the packaging inside there are spices. However, can we buy these food
                products without any of these spices? The answer is of course no, because it's obvious inside This product
                contains noodles and seasonings. But don't worry, we can still cook noodles with the right spices according
                to our taste. It does take a little time, but at least it doesn't there are unused materials. </div>
        </div>
    </section>
@endsection
