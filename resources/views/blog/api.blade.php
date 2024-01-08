@php
    $article = [
        'rest api' => "<p>REST API is an architectural style of software that defines the rules for creating web services. In this case the API functions as a liaison for interaction between machines and almost always uses http, while the REST API is a good writing rule for requesting & responding data that has a json format.</p><p>Flow REST API</p><ul><li><strong>user </strong>requests along with data <i>(if have data) ></i><strong> server </strong>send request and convert data to json > <strong>rest server </strong></li><li><strong>rest server</strong> receive a json response along with a status code ><strong> server </strong>change the response to html > <strong>user</strong></li></ul></p><p>Stateless :
<ul><li>Each http request is done in isolation.</li><li>The server does not store any state regarding the client's session. If it's an ordinary application, we know who's logged in. Now, REST Api is not allowed/prohibited</li><li>Each request from the client must contain all the information the server needs, including authentication information. so every user request has to tell the server who he is? do you have the right to access data?.</li></ul></p><p>RESTful API : </p><ul><li>The URI/ endpoints use nouns, not verbs. so for example you can't take localhost/app/data/add it can't. So it's just the data and must stateless.</li><li>The core difference between rest and calm. RESTful is using REST properly.</li></ul>",
        'json' =>
            "<p>JSON is a standard file format that uses human-readable text to exchange data, which contains key and value pairs.</p><p>Json : </p><ul><li>Very light textual data exchange format.</li><li>The syntax is very simple and clear (compared to XML).</li><li>Can be used in various programming languages</li><li>Each programming language has its own way of interacting with JSON.</li><li>Made based on the object format in javascript</li><li>Also used for configuration files(not recommended). JSON lacks it doesn't support comment syntax.</li><li>An object in JavaScript is a collection of properties, and properties are written in the form of a key and value pair.</li><li>JSON has no methods.</li></ul><p>In php there are two methods, <ins>json_encode()</ins>which functions to convert an array or object into json so that it can be accessed and <ins>json_decode()</ins>the opposite of json_encode, which is to convert json data into an array so that it can be manipulated. Another function for processing json data is using file_get_contents('file.json') and CURL.</p><br><p>JavaScript is the same, has 2 methods. The first <ins>JSON.stringify()</ins>to convert the object to json and the second <ins>JSON.parse()</ins>. In javascript there is a function to access the json file Ajax, XMLHttpRequest, and JQuery.</p>",
        'cors' => '<p>Same-origin policy is a browser policy to access and display data/scripts/documents from other places outside the domain. makes us unable to access .json data from outside our domain/website [blocked by cors]. The solution is by configuring cors on our server. Cross Origin Resource Sharing is a mechanism that allows us to access a resource (data, document, script) from another domain.</p>',
        'iogm api' => "<p>iogm-api is a publicly accessible API(REST API), in which there are rules for developers to access the data I want to share. Sorry if I limit the data that can be accessed. In order to maintain the originality of iogm. Here's the api url from iogm :
</p><pre>https://iogm.website/api/data</pre>",
    ];
    $keys = array_keys($article);
@endphp @extends('blog.layout')
@section('container')
    <section class="initial" id="exordium">
        <div class="initial__container container">
            <h2 class="section__title">API</h2>
            <p class="section__subtitle">explication</p>
            <p class="font__text">An Application Programming Interface/API is a set of functions, subroutines, communication
                protocols, or tools for creating software. Interface is the common part between two or more separate
                components on a computer system. Api can also be called an interface which is a collection of functions that
                can be called or executed by other programs. </p><br>
            <div class="font__text">The application Api is very wide. Can be found in several programming languages,
                libraries & frameworks, operating systems, and web Api/web services. Below are some examples of api in
                programming languages. <ul class="font__text">
                    <li>PHP : Mysqli and PDO</li>
                    <li>JavaScript : DOM</li>
                    <li>Laravel : DB::tabel('tb_data')</li>
                </ul>
            </div>
            <p class="font__text">Web Service/Web Api is a software system created to support interoperability/interaction
                between 2 applications that pass through different networks.Like SOAP(Simple Object Access Protocol) dan
                REST(REpresentational State Transfer) </p>
        </div>
    </section>
    <nav>
        <div class="nav__links">
            <div class="nav__title">Navigation</div><a href="#exordium" class="nav__link">Exordium</a><a href="#rest api"
                class="nav__link">Rest Api</a><a href="#json" class="nav__link">JSON</a><a href="#cors"
                class="nav__link">CORS</a><a href="#iogm api" class="nav__link">iogm Api</a>
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
    @for ($i = 0; $i < count($article); $i++)
        <section class="explication" id="{{ $keys[$i] }}">
            <div class="container">
                <h2 class="section__title">{{ $keys[$i] }}</h2>
                <p class="section__subtitle">explanation</p>
                <div class="container__content font__text">{!! $article[$keys[$i]] !!}</div>
            </div>
        </section>
    @endfor
@endsection
