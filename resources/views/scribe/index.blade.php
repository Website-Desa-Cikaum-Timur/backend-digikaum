<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Cikaum Timur API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-categories">
                                <a href="#endpoints-GETapi-v1-categories">GET api/v1/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-categories--category-">
                                <a href="#endpoints-GETapi-v1-categories--category-">GET api/v1/categories/{category}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-organizations">
                                <a href="#endpoints-GETapi-v1-organizations">GET api/v1/organizations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-organizations--organization-">
                                <a href="#endpoints-GETapi-v1-organizations--organization-">GET api/v1/organizations/{organization}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-officials--official-">
                                <a href="#endpoints-GETapi-v1-officials--official-">GET api/v1/officials/{official}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-posts">
                                <a href="#endpoints-GETapi-v1-posts">GET api/v1/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-posts--slug-">
                                <a href="#endpoints-GETapi-v1-posts--slug-">GET api/v1/posts/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-locations">
                                <a href="#endpoints-GETapi-v1-locations">GET api/v1/locations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-locations--slug-">
                                <a href="#endpoints-GETapi-v1-locations--slug-">GET api/v1/locations/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-complaints">
                                <a href="#endpoints-POSTapi-v1-complaints">POST api/v1/complaints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-complaints-track--trackingCode-">
                                <a href="#endpoints-GETapi-v1-complaints-track--trackingCode-">GET api/v1/complaints/track/{trackingCode}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-demographics-stats">
                                <a href="#endpoints-GETapi-v1-demographics-stats">GET api/v1/demographics/stats</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-demographics-families--family-">
                                <a href="#endpoints-GETapi-v1-demographics-families--family-">GET api/v1/demographics/families/{family}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-products">
                                <a href="#endpoints-GETapi-v1-products">GET api/v1/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-products--product-">
                                <a href="#endpoints-GETapi-v1-products--product-">GET api/v1/products/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-galleries">
                                <a href="#endpoints-GETapi-v1-galleries">GET api/v1/galleries</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-galleries-years">
                                <a href="#endpoints-GETapi-v1-galleries-years">GET api/v1/galleries/years</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-galleries--gallery-">
                                <a href="#endpoints-GETapi-v1-galleries--gallery-">GET api/v1/galleries/{gallery}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-categories">
                                <a href="#endpoints-POSTapi-v1-categories">POST api/v1/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-categories--category-">
                                <a href="#endpoints-PUTapi-v1-categories--category-">PUT api/v1/categories/{category}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-categories--category-">
                                <a href="#endpoints-DELETEapi-v1-categories--category-">DELETE api/v1/categories/{category}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-organizations">
                                <a href="#endpoints-POSTapi-v1-organizations">POST api/v1/organizations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-organizations--organization-">
                                <a href="#endpoints-PUTapi-v1-organizations--organization-">PUT api/v1/organizations/{organization}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-organizations--organization-">
                                <a href="#endpoints-DELETEapi-v1-organizations--organization-">DELETE api/v1/organizations/{organization}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-officials">
                                <a href="#endpoints-POSTapi-v1-officials">POST api/v1/officials</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-officials--official-">
                                <a href="#endpoints-PUTapi-v1-officials--official-">PUT api/v1/officials/{official}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-officials--official-">
                                <a href="#endpoints-DELETEapi-v1-officials--official-">DELETE api/v1/officials/{official}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-posts">
                                <a href="#endpoints-POSTapi-v1-posts">POST api/v1/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-posts--post-">
                                <a href="#endpoints-PUTapi-v1-posts--post-">PUT api/v1/posts/{post}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-posts--post-">
                                <a href="#endpoints-DELETEapi-v1-posts--post-">DELETE api/v1/posts/{post}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-locations">
                                <a href="#endpoints-POSTapi-v1-locations">POST api/v1/locations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-locations--location-">
                                <a href="#endpoints-PUTapi-v1-locations--location-">PUT api/v1/locations/{location}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-locations--location-">
                                <a href="#endpoints-DELETEapi-v1-locations--location-">DELETE api/v1/locations/{location}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-complaints">
                                <a href="#endpoints-GETapi-v1-complaints">GET api/v1/complaints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-v1-complaints--complaint--status">
                                <a href="#endpoints-PATCHapi-v1-complaints--complaint--status">PATCH api/v1/complaints/{complaint}/status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-demographics-families">
                                <a href="#endpoints-POSTapi-v1-demographics-families">POST api/v1/demographics/families</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-products">
                                <a href="#endpoints-POSTapi-v1-products">POST api/v1/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-products--product-">
                                <a href="#endpoints-PUTapi-v1-products--product-">PUT api/v1/products/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-products--product-">
                                <a href="#endpoints-DELETEapi-v1-products--product-">DELETE api/v1/products/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-galleries">
                                <a href="#endpoints-POSTapi-v1-galleries">POST api/v1/galleries</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-galleries--gallery-">
                                <a href="#endpoints-PUTapi-v1-galleries--gallery-">PUT api/v1/galleries/{gallery}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-galleries--gallery-">
                                <a href="#endpoints-DELETEapi-v1-galleries--gallery-">DELETE api/v1/galleries/{gallery}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 10, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-v1-categories">GET api/v1/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Data kategori berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kzn36ybw6mxabpzceg975sp9&quot;,
            &quot;name&quot;: &quot;Inovasi Desa&quot;,
            &quot;slug&quot;: &quot;inovasi-desa&quot;,
            &quot;description&quot;: &quot;Inovasi dalam desa&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 0,
            &quot;created_at&quot;: &quot;2026-08-10T12:44:29+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbv&quot;,
            &quot;name&quot;: &quot;Iste Qui Numquam&quot;,
            &quot;slug&quot;: &quot;iste-qui-numquam&quot;,
            &quot;description&quot;: &quot;Rerum cupiditate fugit aut ut.&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 6,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960v&quot;,
            &quot;name&quot;: &quot;Molestiae Dignissimos Quasi&quot;,
            &quot;slug&quot;: &quot;molestiae-dignissimos-quasi&quot;,
            &quot;description&quot;: &quot;Quod eius corrupti natus molestiae aut nesciunt.&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 2,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kzktd24x4qj20ak7ck884hbg&quot;,
            &quot;name&quot;: &quot;Pembangunan Desa&quot;,
            &quot;slug&quot;: &quot;pembangunan-desa&quot;,
            &quot;description&quot;: null,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 1,
            &quot;created_at&quot;: &quot;2026-08-10T00:51:18+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960t&quot;,
            &quot;name&quot;: &quot;Repellendus Cumque Qui&quot;,
            &quot;slug&quot;: &quot;repellendus-cumque-qui&quot;,
            &quot;description&quot;: &quot;Nisi omnis officiis ipsam aut amet et alias.&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 3,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbw&quot;,
            &quot;name&quot;: &quot;Sequi Aliquid Suscipit&quot;,
            &quot;slug&quot;: &quot;sequi-aliquid-suscipit&quot;,
            &quot;description&quot;: &quot;Molestiae et incidunt nam tenetur accusamus dolorem rerum dolorem.&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 6,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzvzdy6ycx23ad8yzgd6&quot;,
            &quot;name&quot;: &quot;Sit Cum Blanditiis&quot;,
            &quot;slug&quot;: &quot;sit-cum-blanditiis&quot;,
            &quot;description&quot;: &quot;Reiciendis fuga numquam et recusandae dolor quia non.&quot;,
            &quot;is_active&quot;: true,
            &quot;posts_count&quot;: 5,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-categories--category-">GET api/v1/categories/{category}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories--category-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--category-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Kategori tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--category-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--category-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--category-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--category-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories--category-" data-method="GET"
      data-path="api/v1/categories/{category}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--category-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--category-"
                    onclick="tryItOut('GETapi-v1-categories--category-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--category-"
                    onclick="cancelTryOut('GETapi-v1-categories--category-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--category-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{category}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETapi-v1-categories--category-"
               value="architecto"
               data-component="url">
    <br>
<p>The category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-organizations">GET api/v1/organizations</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-organizations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/organizations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/organizations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-organizations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Bagan SOTK berhasil diambil&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
            &quot;name&quot;: &quot;PD Mustofa Desa&quot;,
            &quot;slug&quot;: &quot;pd-mustofa-desa&quot;,
            &quot;description&quot;: &quot;Illo accusamus perferendis ut.&quot;,
            &quot;is_active&quot;: true,
            &quot;officials&quot;: [
                {
                    &quot;id&quot;: &quot;01kz7yrzvmxxpccmdpchwfj90r&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                    &quot;name&quot;: &quot;Pia Fathonah Mayasari&quot;,
                    &quot;position&quot;: &quot;Pastor&quot;,
                    &quot;nip_nik&quot;: &quot;6502637989664968&quot;,
                    &quot;bio&quot;: &quot;Accusantium et accusantium est. Ad earum odio non tempore sed enim soluta nobis. Assumenda molestias eligendi et modi soluta eos. Soluta consequatur quaerat beatae eaque ut voluptatem.&quot;,
                    &quot;sort_order&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvmxxpccmdpchwfj90s&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                    &quot;name&quot;: &quot;Jane Gasti Farida S.I.Kom&quot;,
                    &quot;position&quot;: &quot;Ustaz / Mubaligh&quot;,
                    &quot;nip_nik&quot;: &quot;4346370231610449&quot;,
                    &quot;bio&quot;: &quot;Suscipit qui odio reprehenderit qui animi cupiditate mollitia. Ut assumenda qui est eos. Quia alias officia nisi iusto vel rerum est.&quot;,
                    &quot;sort_order&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvhpa131jcs54mh0f8g&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                    &quot;name&quot;: &quot;Victoria Tami Kuswandari&quot;,
                    &quot;position&quot;: &quot;Peternak&quot;,
                    &quot;nip_nik&quot;: &quot;4194252433092340&quot;,
                    &quot;bio&quot;: &quot;Omnis dolor et quas voluptatem non sapiente. Voluptas iusto maiores dolor reprehenderit perspiciatis ad voluptas. Iusto modi minus cupiditate ex ut ea assumenda. Qui neque atque voluptatem et sed non quod.&quot;,
                    &quot;sort_order&quot;: 10,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvkdjxaj7w7ry3qw0yf&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                    &quot;name&quot;: &quot;Amelia Ida Hartati S.T.&quot;,
                    &quot;position&quot;: &quot;Penyiar Radio&quot;,
                    &quot;nip_nik&quot;: &quot;0280643305811680&quot;,
                    &quot;bio&quot;: &quot;Voluptatibus reiciendis dolores ut. Eos earum provident aliquam iusto inventore aut nemo aliquam. Consequatur atque nostrum placeat ut.&quot;,
                    &quot;sort_order&quot;: 10,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                }
            ],
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
            &quot;name&quot;: &quot;Perangkat Desa&quot;,
            &quot;slug&quot;: &quot;perangkat-desa&quot;,
            &quot;description&quot;: &quot;Perangkat desa bertugas membantu Kepala Desa dalam penyelenggaraan pemerintahan, pelaksanaan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat. Susunan dan rincian tugas pokok serta fungsi (tupoksi) masing-masing jabatan diatur berdasarkan peraturan perundang-undangan yang berlaku di Indonesia.&quot;,
            &quot;is_active&quot;: true,
            &quot;officials&quot;: [
                {
                    &quot;id&quot;: &quot;01kzkdpnbkqxct4by8c9j0m3fr&quot;,
                    &quot;organization_id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
                    &quot;name&quot;: &quot;Bobon  Santoso&quot;,
                    &quot;position&quot;: &quot;Kaur Perencanaan&quot;,
                    &quot;nip_nik&quot;: &quot;2136723484826076&quot;,
                    &quot;bio&quot;: null,
                    &quot;sort_order&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: &quot;http://localhost:8000/storage/11/01KZKDPNC8WNRX1TF9P2RQDT62.jpg&quot;,
                    &quot;created_at&quot;: &quot;2026-08-09T21:09:21+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kzkd7v7792ey2wdwzws6a2r0&quot;,
                    &quot;organization_id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
                    &quot;name&quot;: &quot;Atik Sukamti&quot;,
                    &quot;position&quot;: &quot;Kaur Keuangan&quot;,
                    &quot;nip_nik&quot;: &quot;8185471937936334&quot;,
                    &quot;bio&quot;: null,
                    &quot;sort_order&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: &quot;http://localhost:8000/storage/10/01KZKD7V7P84W8T6ADCWERM77Y.jpg&quot;,
                    &quot;created_at&quot;: &quot;2026-08-09T21:01:16+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kzkd4rd5qp8sqwnv3kxjswnb&quot;,
                    &quot;organization_id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
                    &quot;name&quot;: &quot;Jono&quot;,
                    &quot;position&quot;: &quot;Sekretaris Desa&quot;,
                    &quot;nip_nik&quot;: &quot;2136723484826088&quot;,
                    &quot;bio&quot;: null,
                    &quot;sort_order&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: &quot;http://localhost:8000/storage/8/01KZKD4RE53XKHGATXYJ2T6FJR.jpg&quot;,
                    &quot;created_at&quot;: &quot;2026-08-09T20:59:35+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kzkd6ajkn93dr5e9rdee6a8z&quot;,
                    &quot;organization_id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
                    &quot;name&quot;: &quot;Tariatno&quot;,
                    &quot;position&quot;: &quot;Kasi Pemerintahan&quot;,
                    &quot;nip_nik&quot;: &quot;8185471937936335&quot;,
                    &quot;bio&quot;: null,
                    &quot;sort_order&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: &quot;http://localhost:8000/storage/9/01KZKD6AK6B4AP9NS4J1TA8WZ7.jpg&quot;,
                    &quot;created_at&quot;: &quot;2026-08-09T21:00:26+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kzkcyqjph1hsemnxkwc6va37&quot;,
                    &quot;organization_id&quot;: &quot;01kzkcv2a9q073xnvnfhgtb84k&quot;,
                    &quot;name&quot;: &quot;Dedeh Sukaesih&quot;,
                    &quot;position&quot;: &quot;Kepala Desa&quot;,
                    &quot;nip_nik&quot;: &quot;1234123412341234&quot;,
                    &quot;bio&quot;: null,
                    &quot;sort_order&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: &quot;http://localhost:8000/storage/7/01KZKCYQMV2YG2ZJRVBEKFRV54.jpg&quot;,
                    &quot;created_at&quot;: &quot;2026-08-09T20:56:17+07:00&quot;
                }
            ],
            &quot;created_at&quot;: &quot;2026-08-09T20:54:17+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
            &quot;name&quot;: &quot;PJ Handayani Tbk Desa&quot;,
            &quot;slug&quot;: &quot;pj-handayani-tbk-desa&quot;,
            &quot;description&quot;: &quot;Maiores quas perspiciatis adipisci beatae sunt a aut.&quot;,
            &quot;is_active&quot;: true,
            &quot;officials&quot;: [
                {
                    &quot;id&quot;: &quot;01kz7yrzvr1h44ph6bfd42whqc&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
                    &quot;name&quot;: &quot;Luluh Siregar S.Sos&quot;,
                    &quot;position&quot;: &quot;Tukang Cukur&quot;,
                    &quot;nip_nik&quot;: &quot;6522977580409165&quot;,
                    &quot;bio&quot;: &quot;Eos dolorem rerum vero et culpa. Cum et iste totam possimus sed consequuntur.&quot;,
                    &quot;sort_order&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvs7yepacvhq12t1cey&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
                    &quot;name&quot;: &quot;Novi Novi Mayasari&quot;,
                    &quot;position&quot;: &quot;Seniman&quot;,
                    &quot;nip_nik&quot;: &quot;4457899901466911&quot;,
                    &quot;bio&quot;: &quot;Aut pariatur minus et beatae. Nostrum distinctio quia aut at et quos consequatur. Illum fugiat veritatis iure qui quisquam sit. Perspiciatis vel eaque doloribus maiores.&quot;,
                    &quot;sort_order&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvv3y3xhtheqqyn2b6y&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
                    &quot;name&quot;: &quot;Zamira Anggraini&quot;,
                    &quot;position&quot;: &quot;Konsultan&quot;,
                    &quot;nip_nik&quot;: &quot;9978118768710998&quot;,
                    &quot;bio&quot;: &quot;Architecto voluptas qui culpa vero fugiat tempore eum. Quo nihil excepturi blanditiis voluptas earum. Suscipit possimus illo et a id doloribus. Autem quam qui voluptate aut assumenda voluptatum et.&quot;,
                    &quot;sort_order&quot;: 7,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvtedceh2hk96tprq7x&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
                    &quot;name&quot;: &quot;Imam Simbolon&quot;,
                    &quot;position&quot;: &quot;Penulis&quot;,
                    &quot;nip_nik&quot;: &quot;8833203947619095&quot;,
                    &quot;bio&quot;: &quot;Optio consectetur aut praesentium. Sunt ad autem accusamus assumenda natus iure fugit. Cupiditate vel voluptatem voluptatem porro adipisci magni nulla. Et officia quia voluptas.&quot;,
                    &quot;sort_order&quot;: 9,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvr1h44ph6bfd42whqb&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsknaa4s6kmc58ts0zw&quot;,
                    &quot;name&quot;: &quot;Kamila Hani Laksmiwati S.Pd&quot;,
                    &quot;position&quot;: &quot;Kepolisian RI (POLRI)&quot;,
                    &quot;nip_nik&quot;: &quot;2454708260141303&quot;,
                    &quot;bio&quot;: &quot;Dolor non libero praesentium sint quod pariatur sapiente. Provident et et sit ex vel vel officia. Molestias vel dignissimos repellat amet.&quot;,
                    &quot;sort_order&quot;: 10,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                }
            ],
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzsjccs2kf1yh8v2727s&quot;,
            &quot;name&quot;: &quot;PJ Rajasa Desa&quot;,
            &quot;slug&quot;: &quot;pj-rajasa-desa&quot;,
            &quot;description&quot;: &quot;Voluptate laudantium at dolore reprehenderit veniam.&quot;,
            &quot;is_active&quot;: true,
            &quot;officials&quot;: [
                {
                    &quot;id&quot;: &quot;01kz7yrzvpje1bgw81j8t9ecn1&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsjccs2kf1yh8v2727s&quot;,
                    &quot;name&quot;: &quot;Anita Zamira Melani&quot;,
                    &quot;position&quot;: &quot;Pembantu Rumah Tangga&quot;,
                    &quot;nip_nik&quot;: &quot;7141448866682058&quot;,
                    &quot;bio&quot;: &quot;Molestiae sunt asperiores vel est. Non enim in ipsam laboriosam. Consequatur quis aspernatur in et.&quot;,
                    &quot;sort_order&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvng98cg25xa96pr0ny&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsjccs2kf1yh8v2727s&quot;,
                    &quot;name&quot;: &quot;Yani Halimah&quot;,
                    &quot;position&quot;: &quot;Buruh Tani / Perkebunan&quot;,
                    &quot;nip_nik&quot;: &quot;8946662124517060&quot;,
                    &quot;bio&quot;: &quot;Quae itaque temporibus quia tempore perferendis nobis. Repellendus delectus sunt reprehenderit harum repellat. Laudantium praesentium voluptatibus et eum repudiandae consequuntur quaerat. Quia totam quas ut perferendis quisquam qui recusandae non.&quot;,
                    &quot;sort_order&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvq46j3b5zh5d9sbs1k&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsjccs2kf1yh8v2727s&quot;,
                    &quot;name&quot;: &quot;Rosman Atma Hutagalung&quot;,
                    &quot;position&quot;: &quot;Pembantu Rumah Tangga&quot;,
                    &quot;nip_nik&quot;: &quot;5731114578310845&quot;,
                    &quot;bio&quot;: &quot;Explicabo et nobis soluta natus. Et nisi sint rem explicabo odio facere. Quis officiis magni fugiat sed. Voluptas velit ut vero sit consectetur repudiandae.&quot;,
                    &quot;sort_order&quot;: 8,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                }
            ],
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzsm3qjthjfzbjw9grkn&quot;,
            &quot;name&quot;: &quot;PT Permata Hassanah Desa&quot;,
            &quot;slug&quot;: &quot;pt-permata-hassanah-desa&quot;,
            &quot;description&quot;: &quot;Eum aut nostrum dolores eum in voluptatibus suscipit.&quot;,
            &quot;is_active&quot;: true,
            &quot;officials&quot;: [
                {
                    &quot;id&quot;: &quot;01kz7yrzvwva3dxk8fk2epzw6k&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsm3qjthjfzbjw9grkn&quot;,
                    &quot;name&quot;: &quot;Hendri Jono Hutagalung&quot;,
                    &quot;position&quot;: &quot;Tukang Gigi&quot;,
                    &quot;nip_nik&quot;: &quot;9500272228920929&quot;,
                    &quot;bio&quot;: &quot;Aliquid et rem laboriosam est quis. Vitae rem voluptas minus qui sit quibusdam. Nihil inventore harum ut at.&quot;,
                    &quot;sort_order&quot;: 4,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvwva3dxk8fk2epzw6j&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsm3qjthjfzbjw9grkn&quot;,
                    &quot;name&quot;: &quot;Kayla Safitri&quot;,
                    &quot;position&quot;: &quot;Penyiar Radio&quot;,
                    &quot;nip_nik&quot;: &quot;5393948195830626&quot;,
                    &quot;bio&quot;: &quot;Nemo commodi quas aut excepturi at similique. Harum animi nam accusantium nulla et enim. Et facere eaque fugiat et. Suscipit ea doloribus ipsam ipsa quidem debitis harum.&quot;,
                    &quot;sort_order&quot;: 7,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvxj13cbvnjtewc7cp9&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsm3qjthjfzbjw9grkn&quot;,
                    &quot;name&quot;: &quot;Hamzah Santoso&quot;,
                    &quot;position&quot;: &quot;Montir&quot;,
                    &quot;nip_nik&quot;: &quot;7041129802592134&quot;,
                    &quot;bio&quot;: &quot;Dolorum pariatur ut aliquam deleniti. Maiores atque voluptates explicabo adipisci totam laboriosam aut. Commodi velit exercitationem ratione rerum cupiditate laborum. Accusantium officiis quaerat at unde architecto dignissimos.&quot;,
                    &quot;sort_order&quot;: 7,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                },
                {
                    &quot;id&quot;: &quot;01kz7yrzvwva3dxk8fk2epzw6m&quot;,
                    &quot;organization_id&quot;: &quot;01kz7yrzsm3qjthjfzbjw9grkn&quot;,
                    &quot;name&quot;: &quot;Dalima Salwa Nurdiyanti&quot;,
                    &quot;position&quot;: &quot;Pelaut&quot;,
                    &quot;nip_nik&quot;: &quot;8616630238455608&quot;,
                    &quot;bio&quot;: &quot;Ea asperiores corporis cum. Occaecati iste ab cupiditate debitis consectetur. Recusandae mollitia quia dignissimos earum expedita voluptates ducimus.&quot;,
                    &quot;sort_order&quot;: 10,
                    &quot;is_active&quot;: true,
                    &quot;photo_url&quot;: null,
                    &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
                }
            ],
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-organizations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-organizations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-organizations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-organizations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-organizations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-organizations" data-method="GET"
      data-path="api/v1/organizations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-organizations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-organizations"
                    onclick="tryItOut('GETapi-v1-organizations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-organizations"
                    onclick="cancelTryOut('GETapi-v1-organizations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-organizations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/organizations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-organizations--organization-">GET api/v1/organizations/{organization}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-organizations--organization-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-organizations--organization-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail organisasi berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
        &quot;name&quot;: &quot;PD Mustofa Desa&quot;,
        &quot;slug&quot;: &quot;pd-mustofa-desa&quot;,
        &quot;description&quot;: &quot;Illo accusamus perferendis ut.&quot;,
        &quot;is_active&quot;: true,
        &quot;officials&quot;: [
            {
                &quot;id&quot;: &quot;01kz7yrzvmxxpccmdpchwfj90r&quot;,
                &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                &quot;name&quot;: &quot;Pia Fathonah Mayasari&quot;,
                &quot;position&quot;: &quot;Pastor&quot;,
                &quot;nip_nik&quot;: &quot;6502637989664968&quot;,
                &quot;bio&quot;: &quot;Accusantium et accusantium est. Ad earum odio non tempore sed enim soluta nobis. Assumenda molestias eligendi et modi soluta eos. Soluta consequatur quaerat beatae eaque ut voluptatem.&quot;,
                &quot;sort_order&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;photo_url&quot;: null,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzvmxxpccmdpchwfj90s&quot;,
                &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                &quot;name&quot;: &quot;Jane Gasti Farida S.I.Kom&quot;,
                &quot;position&quot;: &quot;Ustaz / Mubaligh&quot;,
                &quot;nip_nik&quot;: &quot;4346370231610449&quot;,
                &quot;bio&quot;: &quot;Suscipit qui odio reprehenderit qui animi cupiditate mollitia. Ut assumenda qui est eos. Quia alias officia nisi iusto vel rerum est.&quot;,
                &quot;sort_order&quot;: 5,
                &quot;is_active&quot;: true,
                &quot;photo_url&quot;: null,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzvhpa131jcs54mh0f8g&quot;,
                &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                &quot;name&quot;: &quot;Victoria Tami Kuswandari&quot;,
                &quot;position&quot;: &quot;Peternak&quot;,
                &quot;nip_nik&quot;: &quot;4194252433092340&quot;,
                &quot;bio&quot;: &quot;Omnis dolor et quas voluptatem non sapiente. Voluptas iusto maiores dolor reprehenderit perspiciatis ad voluptas. Iusto modi minus cupiditate ex ut ea assumenda. Qui neque atque voluptatem et sed non quod.&quot;,
                &quot;sort_order&quot;: 10,
                &quot;is_active&quot;: true,
                &quot;photo_url&quot;: null,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzvkdjxaj7w7ry3qw0yf&quot;,
                &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
                &quot;name&quot;: &quot;Amelia Ida Hartati S.T.&quot;,
                &quot;position&quot;: &quot;Penyiar Radio&quot;,
                &quot;nip_nik&quot;: &quot;0280643305811680&quot;,
                &quot;bio&quot;: &quot;Voluptatibus reiciendis dolores ut. Eos earum provident aliquam iusto inventore aut nemo aliquam. Consequatur atque nostrum placeat ut.&quot;,
                &quot;sort_order&quot;: 10,
                &quot;is_active&quot;: true,
                &quot;photo_url&quot;: null,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            }
        ],
        &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-organizations--organization-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-organizations--organization-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-organizations--organization-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-organizations--organization-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-organizations--organization-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-organizations--organization-" data-method="GET"
      data-path="api/v1/organizations/{organization}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-organizations--organization-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-organizations--organization-"
                    onclick="tryItOut('GETapi-v1-organizations--organization-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-organizations--organization-"
                    onclick="cancelTryOut('GETapi-v1-organizations--organization-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-organizations--organization-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/organizations/{organization}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>organization</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="organization"                data-endpoint="GETapi-v1-organizations--organization-"
               value="01kz7yrzs0fxcac1vxk1ej87ev"
               data-component="url">
    <br>
<p>The organization. Example: <code>01kz7yrzs0fxcac1vxk1ej87ev</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-officials--official-">GET api/v1/officials/{official}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-officials--official-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-officials--official-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Detail pejabat berhasil diambil&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: &quot;01kz7yrzvhpa131jcs54mh0f8g&quot;,
        &quot;organization_id&quot;: &quot;01kz7yrzs0fxcac1vxk1ej87ev&quot;,
        &quot;name&quot;: &quot;Victoria Tami Kuswandari&quot;,
        &quot;position&quot;: &quot;Peternak&quot;,
        &quot;nip_nik&quot;: &quot;4194252433092340&quot;,
        &quot;bio&quot;: &quot;Omnis dolor et quas voluptatem non sapiente. Voluptas iusto maiores dolor reprehenderit perspiciatis ad voluptas. Iusto modi minus cupiditate ex ut ea assumenda. Qui neque atque voluptatem et sed non quod.&quot;,
        &quot;sort_order&quot;: 10,
        &quot;is_active&quot;: true,
        &quot;photo_url&quot;: null,
        &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-officials--official-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-officials--official-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-officials--official-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-officials--official-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-officials--official-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-officials--official-" data-method="GET"
      data-path="api/v1/officials/{official}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-officials--official-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-officials--official-"
                    onclick="tryItOut('GETapi-v1-officials--official-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-officials--official-"
                    onclick="cancelTryOut('GETapi-v1-officials--official-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-officials--official-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/officials/{official}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-officials--official-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-officials--official-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>official</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="official"                data-endpoint="GETapi-v1-officials--official-"
               value="01kz7yrzvhpa131jcs54mh0f8g"
               data-component="url">
    <br>
<p>The official. Example: <code>01kz7yrzvhpa131jcs54mh0f8g</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-posts">GET api/v1/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kz7yrzwsfk3gh0e7kar660sm&quot;,
            &quot;title&quot;: &quot;Quia voluptatem esse sit vel.&quot;,
            &quot;slug&quot;: &quot;quia-voluptatem-esse-sit-vel&quot;,
            &quot;excerpt&quot;: &quot;Voluptatum illum dignissimos sunt deserunt. Minus ut ipsum consequatur aut omnis non qui non. Qui nisi assumenda harum sapiente.&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;Eos aut quae ut qui nobis expedita corporis. Impedit asperiores nobis et voluptas temporibus eius vero omnis. Sunt aut explicabo consequatur nostrum ducimus.Delectus numquam tempora dignissimos ipsum id. Sed occaecati ut culpa id et sit. Ratione earum laboriosam aut in aut. Sed maiores unde possimus in.Dolores modi nihil cupiditate commodi. Perferendis quisquam praesentium architecto nostrum ratione.&lt;/p&gt;&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: true,
            &quot;views_count&quot;: 6,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: &quot;http://localhost:8000/storage/12/01KZN34QWGR159ZSAA2B7DAF36.jpeg&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kzktd24x4qj20ak7ck884hbg&quot;,
                &quot;name&quot;: &quot;Pembangunan Desa&quot;,
                &quot;slug&quot;: &quot;pembangunan-desa&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwrc1c29xy87tgkwd4d&quot;,
            &quot;title&quot;: &quot;Tempore autem iste debitis ipsam non suscipit.&quot;,
            &quot;slug&quot;: &quot;tempore-autem-iste-debitis-ipsam-non-suscipit&quot;,
            &quot;excerpt&quot;: &quot;Sed dolores hic saepe consequatur similique architecto. Iusto soluta incidunt placeat. Deleniti animi blanditiis at. Et dolor quam voluptatum architecto.&quot;,
            &quot;content&quot;: &quot;Nostrum voluptatem ut labore aliquid tempora ipsa error porro. Aperiam voluptates molestias praesentium. Sit voluptas omnis ut voluptate rem est.\n\nBlanditiis et ipsam ut voluptatem quae. Eius aut autem est quae. Facilis velit ullam neque tempore deserunt est dicta.\n\nCum sint nobis fuga doloribus ut doloremque. Excepturi expedita est dolores corrupti aliquam. Ut consectetur tempora voluptatibus quam est distinctio. Et vel libero velit.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 1,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960v&quot;,
                &quot;name&quot;: &quot;Molestiae Dignissimos Quasi&quot;,
                &quot;slug&quot;: &quot;molestiae-dignissimos-quasi&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwrc1c29xy87tgkwd4c&quot;,
            &quot;title&quot;: &quot;Sequi quis et nobis ex facilis dolorem.&quot;,
            &quot;slug&quot;: &quot;sequi-quis-et-nobis-ex-facilis-dolorem&quot;,
            &quot;excerpt&quot;: &quot;Est eius et minus vero. Veniam magnam est nulla dolor nisi iusto et. Dignissimos dolor adipisci iure omnis aspernatur ut vel et. Animi alias ut sit quis sunt error.&quot;,
            &quot;content&quot;: &quot;Voluptatem qui consequatur error atque saepe voluptatem et autem. Voluptatem id eaque illum.\n\nSaepe modi nemo quam rerum omnis error. Voluptas voluptas minus et debitis quas harum facere aut. Possimus ad ratione quas assumenda tempore.\n\nAccusamus provident veritatis rerum praesentium ad facilis pariatur voluptas. Dolorem optio aut enim sunt sed accusamus. Ipsam assumenda cum quasi unde ut minima distinctio. Quia pariatur a occaecati sint rerum quos.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960v&quot;,
                &quot;name&quot;: &quot;Molestiae Dignissimos Quasi&quot;,
                &quot;slug&quot;: &quot;molestiae-dignissimos-quasi&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwphqx60qk2mz86dwpr&quot;,
            &quot;title&quot;: &quot;Molestiae qui voluptatem repellat quam.&quot;,
            &quot;slug&quot;: &quot;molestiae-qui-voluptatem-repellat-quam&quot;,
            &quot;excerpt&quot;: &quot;Reiciendis dignissimos libero maxime impedit. Totam temporibus vero delectus sed. Ut ut adipisci dolor at. Vel est rem omnis dignissimos dolor.&quot;,
            &quot;content&quot;: &quot;Odio qui culpa deserunt qui ab dicta iste. Consequatur repellat at necessitatibus facilis. Vel qui maiores temporibus maiores temporibus.\n\nRecusandae architecto rerum dolore in omnis. Nihil omnis nesciunt aut qui sed atque. Sed accusamus non occaecati eos non incidunt molestiae.\n\nSit ipsa repellendus quasi voluptatem esse consectetur velit. Cum est vero itaque dolorem accusantium reprehenderit quia. Voluptas delectus dolorum quo ipsam blanditiis et. Deleniti eos omnis est voluptatum.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960t&quot;,
                &quot;name&quot;: &quot;Repellendus Cumque Qui&quot;,
                &quot;slug&quot;: &quot;repellendus-cumque-qui&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwphqx60qk2mz86dwpq&quot;,
            &quot;title&quot;: &quot;Est magnam est dolorem voluptatem sit hic.&quot;,
            &quot;slug&quot;: &quot;est-magnam-est-dolorem-voluptatem-sit-hic&quot;,
            &quot;excerpt&quot;: &quot;Et voluptates quae esse veniam. Expedita voluptas voluptatem quis at velit. Eos quam laboriosam nam nulla.&quot;,
            &quot;content&quot;: &quot;Tenetur deleniti illum voluptatem occaecati. Ad debitis accusantium aperiam sit a. Similique omnis voluptas non et.\n\nVelit consequatur qui eum assumenda. Dolorem corrupti qui laudantium asperiores repellat nulla porro. Quo dolore quidem ab odio.\n\nEt quasi dolorum sed et qui quae. Qui similique vel sed qui modi. Et magni debitis tempore soluta molestiae quas et sint. Eius molestias expedita dolores enim tenetur ut.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960t&quot;,
                &quot;name&quot;: &quot;Repellendus Cumque Qui&quot;,
                &quot;slug&quot;: &quot;repellendus-cumque-qui&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwphqx60qk2mz86dwpp&quot;,
            &quot;title&quot;: &quot;Voluptas necessitatibus et quam id cupiditate sint.&quot;,
            &quot;slug&quot;: &quot;voluptas-necessitatibus-et-quam-id-cupiditate-sint&quot;,
            &quot;excerpt&quot;: &quot;Id perferendis sed blanditiis iure voluptas. Omnis vel voluptatum ullam aperiam dolores expedita. Itaque dignissimos nesciunt autem excepturi id.&quot;,
            &quot;content&quot;: &quot;Ipsa totam qui quae labore. Architecto tempore odio culpa odit aut nobis. Corrupti voluptas fuga sunt neque. Porro blanditiis beatae amet praesentium iure est.\n\nImpedit quis voluptatem repudiandae repellendus cupiditate qui. Et doloremque asperiores quia debitis perspiciatis laborum qui qui. At laudantium et architecto sequi eius assumenda. Voluptatem eos ut quas. Qui earum soluta quod ducimus et quos in facere.\n\nUt aperiam voluptate rem et. Necessitatibus qui est dicta deserunt ut alias expedita. Id qui saepe quod exercitationem. Aut exercitationem aspernatur inventore quam est qui dicta.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw1pkcwsxxj1tag960t&quot;,
                &quot;name&quot;: &quot;Repellendus Cumque Qui&quot;,
                &quot;slug&quot;: &quot;repellendus-cumque-qui&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwm421d7r8age5j8e7d&quot;,
            &quot;title&quot;: &quot;Harum itaque ipsa temporibus tenetur odio.&quot;,
            &quot;slug&quot;: &quot;harum-itaque-ipsa-temporibus-tenetur-odio&quot;,
            &quot;excerpt&quot;: &quot;Dolore cum blanditiis dignissimos. Laborum iste autem unde facere laudantium. Cum ipsum sed quia nulla quam. Velit culpa voluptatum qui sunt aperiam velit. Perferendis ipsa et veniam rerum.&quot;,
            &quot;content&quot;: &quot;Error suscipit aperiam optio ut. Accusamus laborum qui quibusdam occaecati repellendus maxime. Voluptatum esse ut maiores expedita magni dolores. Minima dolorem eveniet perferendis ipsa omnis quis in. Corporis recusandae omnis accusantium dignissimos ea voluptates in.\n\nQuia tenetur omnis est non consequatur vel. Sequi exercitationem et perspiciatis. Aut eligendi fugit porro doloremque.\n\nDistinctio officiis dignissimos cupiditate nemo iste beatae. Facilis ut explicabo molestiae ut est. Corrupti vero eum sunt dicta necessitatibus aut illo. Optio sunt repellat repellat.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbw&quot;,
                &quot;name&quot;: &quot;Sequi Aliquid Suscipit&quot;,
                &quot;slug&quot;: &quot;sequi-aliquid-suscipit&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwm421d7r8age5j8e7c&quot;,
            &quot;title&quot;: &quot;Aut voluptas ut dolor aut ipsa qui.&quot;,
            &quot;slug&quot;: &quot;aut-voluptas-ut-dolor-aut-ipsa-qui&quot;,
            &quot;excerpt&quot;: &quot;Dolores tempore qui quia dolorem aut. Officia aperiam omnis voluptas animi sequi ipsam. Velit voluptas sint et ea.&quot;,
            &quot;content&quot;: &quot;Quidem vitae atque sequi sed tenetur commodi mollitia. Earum sequi fugiat facilis dolores odit modi consectetur.\n\nAdipisci quo ut explicabo voluptatem. Placeat odio beatae quis voluptas consectetur quo officiis. Culpa dolorem facilis ut reprehenderit perferendis magni.\n\nVelit animi velit deleniti harum voluptas rem neque. Ut quod expedita nisi eos officiis. Dolores qui est quo voluptatem.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbw&quot;,
                &quot;name&quot;: &quot;Sequi Aliquid Suscipit&quot;,
                &quot;slug&quot;: &quot;sequi-aliquid-suscipit&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwknzgh1tr2ftm147df&quot;,
            &quot;title&quot;: &quot;Excepturi non quo et sint.&quot;,
            &quot;slug&quot;: &quot;excepturi-non-quo-et-sint&quot;,
            &quot;excerpt&quot;: &quot;Alias voluptatem molestiae ipsum tempora. Est temporibus occaecati in laudantium dicta non. Nobis enim perferendis labore voluptatum inventore quia voluptates.&quot;,
            &quot;content&quot;: &quot;Dolores et suscipit delectus vero et omnis sed ut. Sunt dolores odio eos ut voluptas. Illo quisquam ad quasi rerum. Dicta iste molestiae facilis incidunt.\n\nAd autem autem explicabo autem suscipit exercitationem rem debitis. Ea eum sed exercitationem. Et aut nemo cupiditate ea omnis. Quibusdam corrupti soluta quidem est. Expedita eos ut provident pariatur officia nemo quo.\n\nDolor qui voluptatem iste est. Explicabo corrupti ut recusandae ut. Veritatis expedita ullam harum doloribus qui est ut. Cumque omnis laboriosam aliquid doloribus minus nesciunt.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbw&quot;,
                &quot;name&quot;: &quot;Sequi Aliquid Suscipit&quot;,
                &quot;slug&quot;: &quot;sequi-aliquid-suscipit&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzwknzgh1tr2ftm147de&quot;,
            &quot;title&quot;: &quot;Alias quia dolore aut eum.&quot;,
            &quot;slug&quot;: &quot;alias-quia-dolore-aut-eum&quot;,
            &quot;excerpt&quot;: &quot;Ea qui omnis illum esse aperiam. Libero maiores consequuntur vero harum vero in dolores. Impedit sint consectetur iure. Laudantium consequatur eveniet odit vel excepturi omnis.&quot;,
            &quot;content&quot;: &quot;Enim cum cupiditate consequatur ut. Voluptas qui quam nesciunt sit consequatur. Non voluptates ut hic facilis. Magnam omnis aut ad sequi quaerat.\n\nPariatur tempora voluptatem eveniet dolores cum. Exercitationem culpa at commodi omnis. Et amet nihil vero iusto velit libero.\n\nDoloremque nihil autem omnis explicabo. Unde itaque in autem laudantium. Explicabo autem assumenda a. Eum eos ad temporibus sit.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_highlight&quot;: false,
            &quot;views_count&quot;: 0,
            &quot;published_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;,
            &quot;cover_image_url&quot;: null,
            &quot;category&quot;: {
                &quot;id&quot;: &quot;01kz7yrzw0sbwzrk1fycrwzdbw&quot;,
                &quot;name&quot;: &quot;Sequi Aliquid Suscipit&quot;,
                &quot;slug&quot;: &quot;sequi-aliquid-suscipit&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: &quot;01kz7yrym70qjnzsvr9kaspt8y&quot;,
                &quot;name&quot;: &quot;Editor Konten&quot;
            },
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/posts?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/posts?page=3&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8000/api/v1/posts?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 3,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/posts?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/posts?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/posts?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/posts?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/posts&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 10,
        &quot;total&quot;: 23
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts" data-method="GET"
      data-path="api/v1/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts"
                    onclick="tryItOut('GETapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts"
                    onclick="cancelTryOut('GETapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-posts--slug-">GET api/v1/posts/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-posts--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Berita tidak ditemukan atau belum rilis&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts--slug-" data-method="GET"
      data-path="api/v1/posts/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--slug-"
                    onclick="tryItOut('GETapi-v1-posts--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--slug-"
                    onclick="cancelTryOut('GETapi-v1-posts--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-posts--slug-"
               value="01kz7yrzw30pgr45w89qx3rq5b"
               data-component="url">
    <br>
<p>The slug of the post. Example: <code>01kz7yrzw30pgr45w89qx3rq5b</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-locations">GET api/v1/locations</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-locations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/locations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/locations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-locations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kz7yrzwymrmgydmx9wpx3vnd&quot;,
            &quot;name&quot;: &quot;CV Hasanah Tbk&quot;,
            &quot;slug&quot;: &quot;cv-hasanah-tbk-2d6of&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Et sed doloremque ut quidem nisi.&quot;,
            &quot;address&quot;: &quot;Ki. Suprapto No. 580, Payakumbuh 19116, Aceh&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    81.532921,
                    14.178236
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx50tbc5a9vdnhnr906&quot;,
            &quot;name&quot;: &quot;Fa Suwarno&quot;,
            &quot;slug&quot;: &quot;fa-suwarno-aceye&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Veniam provident iure accusantium aliquid sunt voluptatem.&quot;,
            &quot;address&quot;: &quot;Jln. Sunaryo No. 471, Probolinggo 45850, Kalteng&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -89.671935,
                    82.781006
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx61869t4t6vmp8pe8v&quot;,
            &quot;name&quot;: &quot;CV Prasetyo Putra&quot;,
            &quot;slug&quot;: &quot;cv-prasetyo-putra-myid9&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Aut quaerat quo harum aut veritatis quam ullam.&quot;,
            &quot;address&quot;: &quot;Kpg. Dago No. 552, Serang 42647, Kalbar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -144.209666,
                    -12.724268
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx61869t4t6vmp8pe8w&quot;,
            &quot;name&quot;: &quot;Perum Mandasari&quot;,
            &quot;slug&quot;: &quot;perum-mandasari-wxcgd&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Et ea corrupti saepe ab atque saepe molestiae.&quot;,
            &quot;address&quot;: &quot;Jr. Baiduri No. 353, Serang 83042, Kaltim&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -31.399672,
                    -68.229324
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx7yn0xh5gs3s0grn4c&quot;,
            &quot;name&quot;: &quot;Yayasan Haryanti&quot;,
            &quot;slug&quot;: &quot;yayasan-haryanti-m9c0k&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Sint mollitia dolore dolores eaque id.&quot;,
            &quot;address&quot;: &quot;Psr. Lada No. 586, Prabumulih 88463, DIY&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -100.521444,
                    74.838956
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx7yn0xh5gs3s0grn4d&quot;,
            &quot;name&quot;: &quot;PD Marpaung&quot;,
            &quot;slug&quot;: &quot;pd-marpaung-xnuco&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Nihil sint nostrum culpa rem earum.&quot;,
            &quot;address&quot;: &quot;Ki. BKR No. 768, Ambon 33418, Papua&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -51.258814,
                    72.498494
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx8z8yyy8195ss7zv34&quot;,
            &quot;name&quot;: &quot;UD Adriansyah Pudjiastuti&quot;,
            &quot;slug&quot;: &quot;ud-adriansyah-pudjiastuti-iybk0&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Dolor corrupti recusandae quaerat voluptate explicabo sed porro culpa.&quot;,
            &quot;address&quot;: &quot;Gg. Bahagia  No. 913, Bukittinggi 42076, Lampung&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -7.57826,
                    34.175955
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx8z8yyy8195ss7zv35&quot;,
            &quot;name&quot;: &quot;UD Puspita&quot;,
            &quot;slug&quot;: &quot;ud-puspita-kgrsm&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Temporibus sint voluptates impedit nobis qui ab eum.&quot;,
            &quot;address&quot;: &quot;Ki. Salak No. 407, Serang 68420, Jatim&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    38.930357,
                    -54.654355
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx9fmcmraccxb3k68w2&quot;,
            &quot;name&quot;: &quot;Yayasan Aryani (Persero) Tbk&quot;,
            &quot;slug&quot;: &quot;yayasan-aryani-persero-tbk-clwq0&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Aspernatur id nisi quo sint animi.&quot;,
            &quot;address&quot;: &quot;Gg. Casablanca No. 507, Magelang 53749, Jateng&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -61.012888,
                    -69.370003
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzx9fmcmraccxb3k68w3&quot;,
            &quot;name&quot;: &quot;PT Iswahyudi Tbk&quot;,
            &quot;slug&quot;: &quot;pt-iswahyudi-tbk-kqurk&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Maxime voluptatem laudantium quo hic deserunt id.&quot;,
            &quot;address&quot;: &quot;Ki. Baladewa No. 156, Bontang 83519, DKI&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    7.137636,
                    71.444113
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxagajmyxp9a45pzjhw&quot;,
            &quot;name&quot;: &quot;Perum Iswahyudi (Persero) Tbk&quot;,
            &quot;slug&quot;: &quot;perum-iswahyudi-persero-tbk-drnoe&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Eum sint quis totam officia eum voluptas voluptas.&quot;,
            &quot;address&quot;: &quot;Jr. Bara Tambar No. 836, Samarinda 99599, Jabar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    178.004162,
                    -83.634429
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxagajmyxp9a45pzjhx&quot;,
            &quot;name&quot;: &quot;PD Sihombing Farida Tbk&quot;,
            &quot;slug&quot;: &quot;pd-sihombing-farida-tbk-zhxst&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Architecto perferendis quibusdam modi aperiam ut natus.&quot;,
            &quot;address&quot;: &quot;Ds. Setia Budi No. 906, Palopo 67981, Kalsel&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    65.761544,
                    60.047094
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxbsasfktcknderea4s&quot;,
            &quot;name&quot;: &quot;PT Suwarno&quot;,
            &quot;slug&quot;: &quot;pt-suwarno-z6iju&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Commodi consectetur voluptas sunt unde facere tenetur necessitatibus.&quot;,
            &quot;address&quot;: &quot;Dk. Padang No. 64, Pangkal Pinang 94406, Sumbar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    8.649406,
                    -73.585166
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxbsasfktcknderea4t&quot;,
            &quot;name&quot;: &quot;UD Mardhiyah&quot;,
            &quot;slug&quot;: &quot;ud-mardhiyah-gx9y3&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Ex sint et in aliquam eius aut quod.&quot;,
            &quot;address&quot;: &quot;Gg. Bawal No. 15, Ambon 87664, Bengkulu&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -126.486244,
                    -25.004157
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxbsasfktcknderea4v&quot;,
            &quot;name&quot;: &quot;PD Wahyudin Dongoran&quot;,
            &quot;slug&quot;: &quot;pd-wahyudin-dongoran-zd4c1&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Laudantium a quidem eveniet quod asperiores deleniti praesentium.&quot;,
            &quot;address&quot;: &quot;Jr. Wahidin No. 55, Banjar 82449, Pabar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    22.145427,
                    1.876328
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxbsasfktcknderea4w&quot;,
            &quot;name&quot;: &quot;Yayasan Hutagalung Mustofa Tbk&quot;,
            &quot;slug&quot;: &quot;yayasan-hutagalung-mustofa-tbk-odkkk&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Explicabo aliquam harum aperiam vel possimus voluptate occaecati autem.&quot;,
            &quot;address&quot;: &quot;Kpg. Abdul. Muis No. 524, Gorontalo 22409, Papua&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -19.141066,
                    7.019069
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxch1np0a5ntejtqanq&quot;,
            &quot;name&quot;: &quot;CV Marbun Tbk&quot;,
            &quot;slug&quot;: &quot;cv-marbun-tbk-xubco&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Et facilis quos ut veniam nobis.&quot;,
            &quot;address&quot;: &quot;Psr. Samanhudi No. 580, Banjar 81716, Maluku&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -136.335024,
                    28.419444
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxch1np0a5ntejtqanr&quot;,
            &quot;name&quot;: &quot;Yayasan Mandasari&quot;,
            &quot;slug&quot;: &quot;yayasan-mandasari-s3eoy&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Et aut labore facere possimus commodi animi id.&quot;,
            &quot;address&quot;: &quot;Kpg. Batako No. 762, Bitung 89708, Jabar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    50.079592,
                    83.504477
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxdzx3xrag0a0jdd7qm&quot;,
            &quot;name&quot;: &quot;PD Kuswandari Tbk&quot;,
            &quot;slug&quot;: &quot;pd-kuswandari-tbk-qq3wf&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Magni deserunt maiores omnis ut natus earum qui.&quot;,
            &quot;address&quot;: &quot;Dk. Wahidin Sudirohusodo No. 99, Ternate 19115, Jabar&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    -51.539824,
                    34.541273
                ]
            },
            &quot;photo_url&quot;: null
        },
        {
            &quot;id&quot;: &quot;01kz7yrzxdzx3xrag0a0jdd7qn&quot;,
            &quot;name&quot;: &quot;PT Melani Lailasari (Persero) Tbk&quot;,
            &quot;slug&quot;: &quot;pt-melani-lailasari-persero-tbk-e2nhp&quot;,
            &quot;category&quot;: &quot;umkm&quot;,
            &quot;description&quot;: &quot;Omnis inventore suscipit quia ut aperiam consequatur.&quot;,
            &quot;address&quot;: &quot;Gg. Sukabumi No. 950, Sorong 95982, Gorontalo&quot;,
            &quot;is_active&quot;: null,
            &quot;geometry&quot;: {
                &quot;type&quot;: &quot;Point&quot;,
                &quot;coordinates&quot;: [
                    165.073436,
                    -68.383226
                ]
            },
            &quot;photo_url&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-locations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-locations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-locations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-locations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-locations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-locations" data-method="GET"
      data-path="api/v1/locations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-locations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-locations"
                    onclick="tryItOut('GETapi-v1-locations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-locations"
                    onclick="cancelTryOut('GETapi-v1-locations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-locations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/locations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-locations--slug-">GET api/v1/locations/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-locations--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-locations--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Titik lokasi tidak ditemukan&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-locations--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-locations--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-locations--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-locations--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-locations--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-locations--slug-" data-method="GET"
      data-path="api/v1/locations/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-locations--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-locations--slug-"
                    onclick="tryItOut('GETapi-v1-locations--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-locations--slug-"
                    onclick="cancelTryOut('GETapi-v1-locations--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-locations--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/locations/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-locations--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-locations--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-locations--slug-"
               value="01kz7yrzwymrmgydmx9wpx3vnd"
               data-component="url">
    <br>
<p>The slug of the location. Example: <code>01kz7yrzwymrmgydmx9wpx3vnd</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-complaints">POST api/v1/complaints</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-complaints">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/complaints" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=b"\
    --form "content=architecto"\
    --form "reporter_name=n"\
    --form "reporter_phone=gzmiyvdljnikhway"\
    --form "category=k"\
    --form "is_anonymous="\
    --form "evidence=@C:\Users\LENOVO\AppData\Local\Temp\php2D11.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/complaints"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'b');
body.append('content', 'architecto');
body.append('reporter_name', 'n');
body.append('reporter_phone', 'gzmiyvdljnikhway');
body.append('category', 'k');
body.append('is_anonymous', '');
body.append('evidence', document.querySelector('input[name="evidence"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-complaints">
</span>
<span id="execution-results-POSTapi-v1-complaints" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-complaints"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-complaints"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-complaints" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-complaints">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-complaints" data-method="POST"
      data-path="api/v1/complaints"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-complaints', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-complaints"
                    onclick="tryItOut('POSTapi-v1-complaints');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-complaints"
                    onclick="cancelTryOut('POSTapi-v1-complaints');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-complaints"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/complaints</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-complaints"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-complaints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-complaints"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-v1-complaints"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reporter_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reporter_name"                data-endpoint="POSTapi-v1-complaints"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 150 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reporter_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reporter_phone"                data-endpoint="POSTapi-v1-complaints"
               value="gzmiyvdljnikhway"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>gzmiyvdljnikhway</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-v1-complaints"
               value="k"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>k</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_anonymous</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-complaints" style="display: none">
            <input type="radio" name="is_anonymous"
                   value="true"
                   data-endpoint="POSTapi-v1-complaints"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-complaints" style="display: none">
            <input type="radio" name="is_anonymous"
                   value="false"
                   data-endpoint="POSTapi-v1-complaints"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>evidence</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="evidence"                data-endpoint="POSTapi-v1-complaints"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2D11.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-complaints-track--trackingCode-">GET api/v1/complaints/track/{trackingCode}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-complaints-track--trackingCode-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/complaints/track/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/complaints/track/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-complaints-track--trackingCode-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Kode resi pengaduan tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-complaints-track--trackingCode-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-complaints-track--trackingCode-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-complaints-track--trackingCode-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-complaints-track--trackingCode-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-complaints-track--trackingCode-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-complaints-track--trackingCode-" data-method="GET"
      data-path="api/v1/complaints/track/{trackingCode}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-complaints-track--trackingCode-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-complaints-track--trackingCode-"
                    onclick="tryItOut('GETapi-v1-complaints-track--trackingCode-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-complaints-track--trackingCode-"
                    onclick="cancelTryOut('GETapi-v1-complaints-track--trackingCode-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-complaints-track--trackingCode-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/complaints/track/{trackingCode}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-complaints-track--trackingCode-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-complaints-track--trackingCode-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>trackingCode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="trackingCode"                data-endpoint="GETapi-v1-complaints-track--trackingCode-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-demographics-stats">GET api/v1/demographics/stats</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-demographics-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/demographics/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/demographics/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-demographics-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Statistik demografi berhasil diambil.&quot;,
    &quot;data&quot;: {
        &quot;total&quot;: 206,
        &quot;gender&quot;: {
            &quot;male_percentage&quot;: 46.1,
            &quot;female_percentage&quot;: 53.9
        },
        &quot;age&quot;: {
            &quot;youth_percentage&quot;: 34,
            &quot;productive_percentage&quot;: 66,
            &quot;elderly_percentage&quot;: 0
        },
        &quot;last_updated&quot;: &quot;2026-08-10T13:10:13+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-demographics-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-demographics-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-demographics-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-demographics-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-demographics-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-demographics-stats" data-method="GET"
      data-path="api/v1/demographics/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-demographics-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-demographics-stats"
                    onclick="tryItOut('GETapi-v1-demographics-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-demographics-stats"
                    onclick="cancelTryOut('GETapi-v1-demographics-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-demographics-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/demographics/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-demographics-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-demographics-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-demographics-families--family-">GET api/v1/demographics/families/{family}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-demographics-families--family-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/demographics/families/01kz7yrzh6nmp08x3hawa19n0b" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/demographics/families/01kz7yrzh6nmp08x3hawa19n0b"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-demographics-families--family-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
        &quot;kk_number&quot;: &quot;321301******7679&quot;,
        &quot;head_of_family_name&quot;: &quot;Karsa Firmansyah&quot;,
        &quot;address&quot;: &quot;Dk. Cihampelas No. 970&quot;,
        &quot;rt&quot;: &quot;073&quot;,
        &quot;rw&quot;: &quot;018&quot;,
        &quot;village&quot;: &quot;Cikaum Timur&quot;,
        &quot;district&quot;: &quot;Cikaum&quot;,
        &quot;city&quot;: &quot;Subang&quot;,
        &quot;residents&quot;: [
            {
                &quot;id&quot;: &quot;01kz7yrzhxzqwmexqn214eg1yq&quot;,
                &quot;family_id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
                &quot;nik&quot;: &quot;321301******6109&quot;,
                &quot;name&quot;: &quot;Karsa Firmansyah&quot;,
                &quot;place_of_birth&quot;: &quot;Gorontalo&quot;,
                &quot;date_of_birth&quot;: &quot;1973-01-20&quot;,
                &quot;gender&quot;: &quot;LAKI-LAKI&quot;,
                &quot;family_relation_status&quot;: &quot;KEPALA KELUARGA&quot;,
                &quot;religion&quot;: &quot;ISLAM&quot;,
                &quot;education_level&quot;: &quot;SMA/SEDERAJAT&quot;,
                &quot;profession&quot;: &quot;WIRASWASTA&quot;,
                &quot;blood_type&quot;: &quot;O&quot;,
                &quot;marital_status&quot;: &quot;KAWIN&quot;,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzj3v59dhajmc2n2k3cb&quot;,
                &quot;family_id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
                &quot;nik&quot;: &quot;321301******3466&quot;,
                &quot;name&quot;: &quot;Cager Sinaga M.M.&quot;,
                &quot;place_of_birth&quot;: &quot;Tangerang&quot;,
                &quot;date_of_birth&quot;: &quot;1981-08-14&quot;,
                &quot;gender&quot;: &quot;PEREMPUAN&quot;,
                &quot;family_relation_status&quot;: &quot;ISTRI&quot;,
                &quot;religion&quot;: &quot;ISLAM&quot;,
                &quot;education_level&quot;: &quot;SMA/SEDERAJAT&quot;,
                &quot;profession&quot;: &quot;WIRASWASTA&quot;,
                &quot;blood_type&quot;: &quot;A&quot;,
                &quot;marital_status&quot;: &quot;KAWIN&quot;,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzj4hqrf8ep0mazztf5p&quot;,
                &quot;family_id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
                &quot;nik&quot;: &quot;321301******5547&quot;,
                &quot;name&quot;: &quot;Bahuwirya Harimurti Permadi S.I.Kom&quot;,
                &quot;place_of_birth&quot;: &quot;Makassar&quot;,
                &quot;date_of_birth&quot;: &quot;2007-02-07&quot;,
                &quot;gender&quot;: &quot;PEREMPUAN&quot;,
                &quot;family_relation_status&quot;: &quot;ANAK&quot;,
                &quot;religion&quot;: &quot;ISLAM&quot;,
                &quot;education_level&quot;: &quot;SMA/SEDERAJAT&quot;,
                &quot;profession&quot;: &quot;WIRASWASTA&quot;,
                &quot;blood_type&quot;: &quot;B&quot;,
                &quot;marital_status&quot;: &quot;BELUM KAWIN&quot;,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzj5m4zyztzfspwq16ys&quot;,
                &quot;family_id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
                &quot;nik&quot;: &quot;321301******5361&quot;,
                &quot;name&quot;: &quot;Narji Setiawan&quot;,
                &quot;place_of_birth&quot;: &quot;Prabumulih&quot;,
                &quot;date_of_birth&quot;: &quot;2007-02-07&quot;,
                &quot;gender&quot;: &quot;PEREMPUAN&quot;,
                &quot;family_relation_status&quot;: &quot;ANAK&quot;,
                &quot;religion&quot;: &quot;ISLAM&quot;,
                &quot;education_level&quot;: &quot;SMA/SEDERAJAT&quot;,
                &quot;profession&quot;: &quot;WIRASWASTA&quot;,
                &quot;blood_type&quot;: &quot;AB&quot;,
                &quot;marital_status&quot;: &quot;BELUM KAWIN&quot;,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            },
            {
                &quot;id&quot;: &quot;01kz7yrzj689r3e39hrwy1mwpm&quot;,
                &quot;family_id&quot;: &quot;01kz7yrzh6nmp08x3hawa19n0b&quot;,
                &quot;nik&quot;: &quot;321301******0921&quot;,
                &quot;name&quot;: &quot;Adikara Hadi Nugroho S.IP&quot;,
                &quot;place_of_birth&quot;: &quot;Tomohon&quot;,
                &quot;date_of_birth&quot;: &quot;2007-02-07&quot;,
                &quot;gender&quot;: &quot;PEREMPUAN&quot;,
                &quot;family_relation_status&quot;: &quot;ANAK&quot;,
                &quot;religion&quot;: &quot;ISLAM&quot;,
                &quot;education_level&quot;: &quot;SMA/SEDERAJAT&quot;,
                &quot;profession&quot;: &quot;WIRASWASTA&quot;,
                &quot;blood_type&quot;: &quot;O&quot;,
                &quot;marital_status&quot;: &quot;BELUM KAWIN&quot;,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
            }
        ],
        &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-demographics-families--family-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-demographics-families--family-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-demographics-families--family-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-demographics-families--family-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-demographics-families--family-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-demographics-families--family-" data-method="GET"
      data-path="api/v1/demographics/families/{family}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-demographics-families--family-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-demographics-families--family-"
                    onclick="tryItOut('GETapi-v1-demographics-families--family-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-demographics-families--family-"
                    onclick="cancelTryOut('GETapi-v1-demographics-families--family-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-demographics-families--family-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/demographics/families/{family}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-demographics-families--family-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-demographics-families--family-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>family</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="family"                data-endpoint="GETapi-v1-demographics-families--family-"
               value="01kz7yrzh6nmp08x3hawa19n0b"
               data-component="url">
    <br>
<p>The family. Example: <code>01kz7yrzh6nmp08x3hawa19n0b</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-products">GET api/v1/products</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kzjrwwm3f5q2tbexc5rjjxba&quot;,
            &quot;name&quot;: &quot;Ikan Mahseer Emas&quot;,
            &quot;slug&quot;: &quot;ikan-mahseer-emas&quot;,
            &quot;category&quot;: &quot;kuliner&quot;,
            &quot;category_label&quot;: &quot;Makanan &amp; Minuman&quot;,
            &quot;description&quot;: &quot;Ikan mahseer yang sangat segar&quot;,
            &quot;owner_name&quot;: &quot;Tasnim Salahudin&quot;,
            &quot;phone_number&quot;: &quot;82119314703&quot;,
            &quot;price&quot;: &quot;45000.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 45.000&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: &quot;http://localhost:8000/storage/6/01KZJSJRW80M27C8VZ6E3SRR43.png&quot;,
            &quot;created_at&quot;: &quot;2026-08-09T15:05:45+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyf6c5vybnkb9txafwv&quot;,
            &quot;name&quot;: &quot;Dolor Vel Totam&quot;,
            &quot;slug&quot;: &quot;dolor-vel-totam-c0bu&quot;,
            &quot;category&quot;: &quot;jasa&quot;,
            &quot;category_label&quot;: &quot;Jasa &amp; Lainnya&quot;,
            &quot;description&quot;: &quot;Dolor ducimus adipisci laboriosam est rerum non. Architecto repudiandae dolore est molestias quis omnis.&quot;,
            &quot;owner_name&quot;: &quot;Gilda Haryanti&quot;,
            &quot;phone_number&quot;: &quot;(+62) 868 6923 640&quot;,
            &quot;price&quot;: &quot;71031.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 71.031&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyhwk4abj944t17e92e&quot;,
            &quot;name&quot;: &quot;Voluptatibus Rerum Dolor&quot;,
            &quot;slug&quot;: &quot;voluptatibus-rerum-dolor-sCgX&quot;,
            &quot;category&quot;: &quot;kuliner&quot;,
            &quot;category_label&quot;: &quot;Makanan &amp; Minuman&quot;,
            &quot;description&quot;: &quot;Soluta excepturi sit dolor laborum at. Adipisci omnis impedit blanditiis sint quo.&quot;,
            &quot;owner_name&quot;: &quot;Zalindra Pudjiastuti&quot;,
            &quot;phone_number&quot;: &quot;(+62) 847 190 835&quot;,
            &quot;price&quot;: &quot;230008.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 230.008&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzygy8y0708czqyf8kbr&quot;,
            &quot;name&quot;: &quot;Officiis Ab Aut&quot;,
            &quot;slug&quot;: &quot;officiis-ab-aut-wMvQ&quot;,
            &quot;category&quot;: &quot;pertanian&quot;,
            &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
            &quot;description&quot;: &quot;Modi velit labore omnis sint necessitatibus laboriosam aliquid. Nam aut quidem quidem nobis excepturi in. Quas possimus molestiae dolor non soluta.&quot;,
            &quot;owner_name&quot;: &quot;Xanana Hamzah Haryanto&quot;,
            &quot;phone_number&quot;: &quot;0833 7230 2623&quot;,
            &quot;price&quot;: &quot;398010.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 398.010&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzygy8y0708czqyf8kbs&quot;,
            &quot;name&quot;: &quot;Alias Hic Qui&quot;,
            &quot;slug&quot;: &quot;alias-hic-qui-jHU2&quot;,
            &quot;category&quot;: &quot;kerajinan&quot;,
            &quot;category_label&quot;: &quot;Kerajinan Tangan&quot;,
            &quot;description&quot;: &quot;Maiores vel aperiam et dolorum ullam. Doloribus voluptas illum asperiores impedit quod voluptas pariatur. Autem quis unde sed.&quot;,
            &quot;owner_name&quot;: &quot;Gandi Hidayat S.Sos&quot;,
            &quot;phone_number&quot;: &quot;(+62) 555 0711 810&quot;,
            &quot;price&quot;: &quot;60232.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 60.232&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyhwk4abj944t17e92d&quot;,
            &quot;name&quot;: &quot;Amet Sint Qui&quot;,
            &quot;slug&quot;: &quot;amet-sint-qui-vNYK&quot;,
            &quot;category&quot;: &quot;pertanian&quot;,
            &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
            &quot;description&quot;: &quot;Incidunt a quod rerum aperiam voluptatem. A quaerat voluptatem est qui.&quot;,
            &quot;owner_name&quot;: &quot;Martaka Jinawi Waskita&quot;,
            &quot;phone_number&quot;: &quot;0706 5305 5028&quot;,
            &quot;price&quot;: &quot;278482.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 278.482&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyf6c5vybnkb9txafww&quot;,
            &quot;name&quot;: &quot;Corporis Necessitatibus Aspernatur&quot;,
            &quot;slug&quot;: &quot;corporis-necessitatibus-aspernatur-66uW&quot;,
            &quot;category&quot;: &quot;kuliner&quot;,
            &quot;category_label&quot;: &quot;Makanan &amp; Minuman&quot;,
            &quot;description&quot;: &quot;Perspiciatis non iure fuga cupiditate modi officia qui. Voluptatem quo sint voluptatem optio iusto. Nam enim repellendus debitis beatae est commodi quia. Voluptatem pariatur dolor eos perspiciatis.&quot;,
            &quot;owner_name&quot;: &quot;Carub Prakasa&quot;,
            &quot;phone_number&quot;: &quot;0818 6611 6957&quot;,
            &quot;price&quot;: &quot;72113.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 72.113&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyhwk4abj944t17e92f&quot;,
            &quot;name&quot;: &quot;Rerum Iste Voluptas&quot;,
            &quot;slug&quot;: &quot;rerum-iste-voluptas-OedR&quot;,
            &quot;category&quot;: &quot;pertanian&quot;,
            &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
            &quot;description&quot;: &quot;Voluptas expedita error rerum repudiandae earum quo aut. Repudiandae velit magni culpa sed voluptatem. Et eum et ut voluptatem nemo.&quot;,
            &quot;owner_name&quot;: &quot;Ganda Bambang Kusumo S.Psi&quot;,
            &quot;phone_number&quot;: &quot;0935 5350 429&quot;,
            &quot;price&quot;: &quot;308556.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 308.556&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyj7tfad9g99r47tv4r&quot;,
            &quot;name&quot;: &quot;Quasi Occaecati Deleniti&quot;,
            &quot;slug&quot;: &quot;quasi-occaecati-deleniti-Sqzw&quot;,
            &quot;category&quot;: &quot;kuliner&quot;,
            &quot;category_label&quot;: &quot;Makanan &amp; Minuman&quot;,
            &quot;description&quot;: &quot;Ipsam aut velit sint dolores et ea. Culpa eos error minus accusantium voluptas rerum eum sint. Ducimus quia iusto ut aperiam.&quot;,
            &quot;owner_name&quot;: &quot;Ajeng Agustina&quot;,
            &quot;phone_number&quot;: &quot;(+62) 479 3926 5801&quot;,
            &quot;price&quot;: &quot;376828.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 376.828&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyj7tfad9g99r47tv4s&quot;,
            &quot;name&quot;: &quot;Qui Dolor Deleniti&quot;,
            &quot;slug&quot;: &quot;qui-dolor-deleniti-NDPY&quot;,
            &quot;category&quot;: &quot;pertanian&quot;,
            &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
            &quot;description&quot;: &quot;Nemo enim dolorum dignissimos. Quasi consequatur voluptatem dolorem omnis dolorem. Non est nobis sed excepturi rerum est fugiat. Ea tempore inventore qui architecto modi quam.&quot;,
            &quot;owner_name&quot;: &quot;Reza Luluh Sihombing S.Kom&quot;,
            &quot;phone_number&quot;: &quot;(+62) 656 5938 7690&quot;,
            &quot;price&quot;: &quot;166911.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 166.911&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyj7tfad9g99r47tv4t&quot;,
            &quot;name&quot;: &quot;Facilis Quia Recusandae&quot;,
            &quot;slug&quot;: &quot;facilis-quia-recusandae-0v9V&quot;,
            &quot;category&quot;: &quot;kerajinan&quot;,
            &quot;category_label&quot;: &quot;Kerajinan Tangan&quot;,
            &quot;description&quot;: &quot;Atque veniam reprehenderit quae dolorem sit. Labore dolorem dolor eos ut quaerat. Eum deserunt temporibus nisi velit impedit quia natus.&quot;,
            &quot;owner_name&quot;: &quot;Gawati Padmasari&quot;,
            &quot;phone_number&quot;: &quot;(+62) 688 0238 974&quot;,
            &quot;price&quot;: &quot;415097.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 415.097&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyf6c5vybnkb9txafwt&quot;,
            &quot;name&quot;: &quot;Qui Impedit Omnis&quot;,
            &quot;slug&quot;: &quot;qui-impedit-omnis-60bR&quot;,
            &quot;category&quot;: &quot;pertanian&quot;,
            &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
            &quot;description&quot;: &quot;Non quia rerum deserunt sunt sit. Omnis in dolor sequi amet sed voluptatibus. Nostrum consequatur vel amet similique. Eum et fugit odit aut dolores non nostrum.&quot;,
            &quot;owner_name&quot;: &quot;Wira Suryono M.Farm&quot;,
            &quot;phone_number&quot;: &quot;0450 1101 6223&quot;,
            &quot;price&quot;: &quot;135161.00&quot;,
            &quot;formatted_price&quot;: &quot;Rp 135.161&quot;,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/products?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/products?page=3&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8000/api/v1/products?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 3,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/products?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/products?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/products?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/products&quot;,
        &quot;per_page&quot;: 12,
        &quot;to&quot;: 12,
        &quot;total&quot;: 26
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products" data-method="GET"
      data-path="api/v1/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products"
                    onclick="tryItOut('GETapi-v1-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products"
                    onclick="cancelTryOut('GETapi-v1-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-products--product-">GET api/v1/products/{product}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-products--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products--product-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: &quot;01kz7yrzyarm3e21jnvvfvgzer&quot;,
        &quot;name&quot;: &quot;Aut Iusto Recusandae&quot;,
        &quot;slug&quot;: &quot;aut-iusto-recusandae-66uy&quot;,
        &quot;category&quot;: &quot;pertanian&quot;,
        &quot;category_label&quot;: &quot;Pertanian &amp; Peternakan&quot;,
        &quot;description&quot;: &quot;Tenetur temporibus ducimus quo enim. Neque incidunt sequi temporibus ab ut. Voluptates et dolores ipsa vel aspernatur ut. Minus quia ex et reprehenderit ea sapiente. Iure vitae distinctio repudiandae soluta voluptatem consequatur.&quot;,
        &quot;owner_name&quot;: &quot;Jessica Nurdiyanti&quot;,
        &quot;phone_number&quot;: &quot;0406 5219 310&quot;,
        &quot;price&quot;: &quot;486854.00&quot;,
        &quot;formatted_price&quot;: &quot;Rp 486.854&quot;,
        &quot;is_active&quot;: true,
        &quot;image_url&quot;: null,
        &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products--product-" data-method="GET"
      data-path="api/v1/products/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products--product-"
                    onclick="tryItOut('GETapi-v1-products--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products--product-"
                    onclick="cancelTryOut('GETapi-v1-products--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-v1-products--product-"
               value="01kz7yrzyarm3e21jnvvfvgzer"
               data-component="url">
    <br>
<p>The product. Example: <code>01kz7yrzyarm3e21jnvvfvgzer</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-galleries">GET api/v1/galleries</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-galleries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/galleries" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-galleries">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;01kz7yrzz2x20ye1gcv56j8bth&quot;,
            &quot;title&quot;: &quot;Qui aperiam architecto beatae molestiae est dolorem.&quot;,
            &quot;category&quot;: &quot;pembangunan&quot;,
            &quot;category_label&quot;: &quot;Pembangunan&quot;,
            &quot;year&quot;: 2025,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz4vaty7j5kd66g48g2&quot;,
            &quot;title&quot;: &quot;Et nobis error molestias vel.&quot;,
            &quot;category&quot;: &quot;pembangunan&quot;,
            &quot;category_label&quot;: &quot;Pembangunan&quot;,
            &quot;year&quot;: 2021,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzyvbm3fr3pq350dsxcp&quot;,
            &quot;title&quot;: &quot;Qui dolores fuga et delectus.&quot;,
            &quot;category&quot;: &quot;pembangunan&quot;,
            &quot;category_label&quot;: &quot;Pembangunan&quot;,
            &quot;year&quot;: 2020,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz30bsvkrbz2sygz32n&quot;,
            &quot;title&quot;: &quot;Molestiae ducimus voluptatem suscipit harum.&quot;,
            &quot;category&quot;: &quot;kegiatan&quot;,
            &quot;category_label&quot;: &quot;Kegiatan Warga&quot;,
            &quot;year&quot;: 2020,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz9ajnnvatrf1vckctg&quot;,
            &quot;title&quot;: &quot;Est eum eos id error commodi omnis.&quot;,
            &quot;category&quot;: &quot;budaya&quot;,
            &quot;category_label&quot;: &quot;Seni &amp; Budaya&quot;,
            &quot;year&quot;: 2015,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz7w303wm5vpe93nwv7&quot;,
            &quot;title&quot;: &quot;Debitis odio id quisquam unde voluptas.&quot;,
            &quot;category&quot;: &quot;budaya&quot;,
            &quot;category_label&quot;: &quot;Seni &amp; Budaya&quot;,
            &quot;year&quot;: 2015,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz2x20ye1gcv56j8btg&quot;,
            &quot;title&quot;: &quot;Corrupti voluptatibus voluptatem consequuntur earum.&quot;,
            &quot;category&quot;: &quot;alam&quot;,
            &quot;category_label&quot;: &quot;Alam &amp; Potensi&quot;,
            &quot;year&quot;: 2015,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz2x20ye1gcv56j8btf&quot;,
            &quot;title&quot;: &quot;Nam dolor qui perferendis quis fuga commodi.&quot;,
            &quot;category&quot;: &quot;kegiatan&quot;,
            &quot;category_label&quot;: &quot;Kegiatan Warga&quot;,
            &quot;year&quot;: 2013,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzzaw1jcfddd2v8020yf&quot;,
            &quot;title&quot;: &quot;Velit accusamus corrupti sint aperiam.&quot;,
            &quot;category&quot;: &quot;kegiatan&quot;,
            &quot;category_label&quot;: &quot;Kegiatan Warga&quot;,
            &quot;year&quot;: 2013,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzz7w303wm5vpe93nwv8&quot;,
            &quot;title&quot;: &quot;Veritatis molestiae ducimus incidunt aut.&quot;,
            &quot;category&quot;: &quot;alam&quot;,
            &quot;category_label&quot;: &quot;Alam &amp; Potensi&quot;,
            &quot;year&quot;: 2010,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzzdcjjrmhfs2a71c6hh&quot;,
            &quot;title&quot;: &quot;Illo voluptate illum iste rem.&quot;,
            &quot;category&quot;: &quot;pembangunan&quot;,
            &quot;category_label&quot;: &quot;Pembangunan&quot;,
            &quot;year&quot;: 2009,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        },
        {
            &quot;id&quot;: &quot;01kz7yrzzaw1jcfddd2v8020yg&quot;,
            &quot;title&quot;: &quot;Praesentium pariatur aliquid vel quisquam.&quot;,
            &quot;category&quot;: &quot;alam&quot;,
            &quot;category_label&quot;: &quot;Alam &amp; Potensi&quot;,
            &quot;year&quot;: 2008,
            &quot;is_active&quot;: true,
            &quot;image_url&quot;: null,
            &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/galleries?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/galleries?page=3&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8000/api/v1/galleries?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 3,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/galleries?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/galleries?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/galleries?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/galleries?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/galleries&quot;,
        &quot;per_page&quot;: 12,
        &quot;to&quot;: 12,
        &quot;total&quot;: 30
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-galleries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-galleries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-galleries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-galleries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-galleries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-galleries" data-method="GET"
      data-path="api/v1/galleries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-galleries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-galleries"
                    onclick="tryItOut('GETapi-v1-galleries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-galleries"
                    onclick="cancelTryOut('GETapi-v1-galleries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-galleries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/galleries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-galleries-years">GET api/v1/galleries/years</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-galleries-years">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/galleries/years" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries/years"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-galleries-years">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Daftar tahun galeri berhasil diambil&quot;,
    &quot;data&quot;: [
        2025,
        2021,
        2020,
        2015,
        2013,
        2010,
        2009,
        2008,
        2007,
        2003,
        2001,
        1999,
        1996,
        1995,
        1994,
        1993,
        1987,
        1985,
        1981,
        1979,
        1977,
        1976,
        1972,
        1971,
        1970
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-galleries-years" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-galleries-years"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-galleries-years"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-galleries-years" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-galleries-years">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-galleries-years" data-method="GET"
      data-path="api/v1/galleries/years"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-galleries-years', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-galleries-years"
                    onclick="tryItOut('GETapi-v1-galleries-years');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-galleries-years"
                    onclick="cancelTryOut('GETapi-v1-galleries-years');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-galleries-years"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/galleries/years</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-galleries-years"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-galleries-years"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-galleries--gallery-">GET api/v1/galleries/{gallery}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-galleries--gallery-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-galleries--gallery-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: &quot;01kz7yrzyvbm3fr3pq350dsxcp&quot;,
        &quot;title&quot;: &quot;Qui dolores fuga et delectus.&quot;,
        &quot;category&quot;: &quot;pembangunan&quot;,
        &quot;category_label&quot;: &quot;Pembangunan&quot;,
        &quot;year&quot;: 2020,
        &quot;is_active&quot;: true,
        &quot;image_url&quot;: null,
        &quot;created_at&quot;: &quot;2026-08-05T10:16:50+07:00&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-galleries--gallery-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-galleries--gallery-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-galleries--gallery-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-galleries--gallery-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-galleries--gallery-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-galleries--gallery-" data-method="GET"
      data-path="api/v1/galleries/{gallery}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-galleries--gallery-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-galleries--gallery-"
                    onclick="tryItOut('GETapi-v1-galleries--gallery-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-galleries--gallery-"
                    onclick="cancelTryOut('GETapi-v1-galleries--gallery-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-galleries--gallery-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/galleries/{gallery}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-galleries--gallery-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-galleries--gallery-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>gallery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gallery"                data-endpoint="GETapi-v1-galleries--gallery-"
               value="01kz7yrzyvbm3fr3pq350dsxcp"
               data-component="url">
    <br>
<p>The gallery. Example: <code>01kz7yrzyvbm3fr3pq350dsxcp</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-categories">POST api/v1/categories</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"slug\": \"n\",
    \"description\": \"Eius et animi quos velit et.\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "slug": "n",
    "description": "Eius et animi quos velit et.",
    "is_active": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-categories">
</span>
<span id="execution-results-POSTapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-categories" data-method="POST"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-categories"
                    onclick="tryItOut('POSTapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-categories"
                    onclick="cancelTryOut('POSTapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-categories"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-v1-categories"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-categories"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-categories" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-categories"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-categories" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-categories"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-categories--category-">PUT api/v1/categories/{category}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-categories--category-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"slug\": \"n\",
    \"description\": \"Eius et animi quos velit et.\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "slug": "n",
    "description": "Eius et animi quos velit et.",
    "is_active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-categories--category-">
</span>
<span id="execution-results-PUTapi-v1-categories--category-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-categories--category-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-categories--category-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-categories--category-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-categories--category-" data-method="PUT"
      data-path="api/v1/categories/{category}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-categories--category-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-categories--category-"
                    onclick="tryItOut('PUTapi-v1-categories--category-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-categories--category-"
                    onclick="cancelTryOut('PUTapi-v1-categories--category-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-categories--category-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/categories/{category}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-v1-categories--category-"
               value="architecto"
               data-component="url">
    <br>
<p>The category. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-categories--category-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-v1-categories--category-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-categories--category-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-categories--category-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-categories--category-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-categories--category-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-categories--category-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-categories--category-">DELETE api/v1/categories/{category}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-categories--category-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/categories/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-categories--category-">
</span>
<span id="execution-results-DELETEapi-v1-categories--category-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-categories--category-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-categories--category-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-categories--category-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-categories--category-" data-method="DELETE"
      data-path="api/v1/categories/{category}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-categories--category-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-categories--category-"
                    onclick="tryItOut('DELETEapi-v1-categories--category-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-categories--category-"
                    onclick="cancelTryOut('DELETEapi-v1-categories--category-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-categories--category-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/categories/{category}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-categories--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="DELETEapi-v1-categories--category-"
               value="architecto"
               data-component="url">
    <br>
<p>The category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-organizations">POST api/v1/organizations</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-organizations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/organizations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"slug\": \"n\",
    \"description\": \"Eius et animi quos velit et.\",
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/organizations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "slug": "n",
    "description": "Eius et animi quos velit et.",
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-organizations">
</span>
<span id="execution-results-POSTapi-v1-organizations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-organizations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-organizations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-organizations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-organizations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-organizations" data-method="POST"
      data-path="api/v1/organizations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-organizations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-organizations"
                    onclick="tryItOut('POSTapi-v1-organizations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-organizations"
                    onclick="cancelTryOut('POSTapi-v1-organizations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-organizations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/organizations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-organizations"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-v1-organizations"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-organizations"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-organizations" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-organizations"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-organizations" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-organizations"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-organizations--organization-">PUT api/v1/organizations/{organization}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-organizations--organization-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"slug\": \"n\",
    \"description\": \"Eius et animi quos velit et.\",
    \"is_active\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "slug": "n",
    "description": "Eius et animi quos velit et.",
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-organizations--organization-">
</span>
<span id="execution-results-PUTapi-v1-organizations--organization-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-organizations--organization-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-organizations--organization-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-organizations--organization-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-organizations--organization-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-organizations--organization-" data-method="PUT"
      data-path="api/v1/organizations/{organization}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-organizations--organization-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-organizations--organization-"
                    onclick="tryItOut('PUTapi-v1-organizations--organization-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-organizations--organization-"
                    onclick="cancelTryOut('PUTapi-v1-organizations--organization-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-organizations--organization-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/organizations/{organization}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>organization</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="organization"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="01kz7yrzs0fxcac1vxk1ej87ev"
               data-component="url">
    <br>
<p>The organization. Example: <code>01kz7yrzs0fxcac1vxk1ej87ev</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-organizations--organization-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-organizations--organization-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-organizations--organization-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-organizations--organization-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-organizations--organization-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-organizations--organization-">DELETE api/v1/organizations/{organization}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-organizations--organization-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/organizations/01kz7yrzs0fxcac1vxk1ej87ev"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-organizations--organization-">
</span>
<span id="execution-results-DELETEapi-v1-organizations--organization-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-organizations--organization-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-organizations--organization-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-organizations--organization-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-organizations--organization-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-organizations--organization-" data-method="DELETE"
      data-path="api/v1/organizations/{organization}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-organizations--organization-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-organizations--organization-"
                    onclick="tryItOut('DELETEapi-v1-organizations--organization-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-organizations--organization-"
                    onclick="cancelTryOut('DELETEapi-v1-organizations--organization-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-organizations--organization-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/organizations/{organization}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-organizations--organization-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>organization</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="organization"                data-endpoint="DELETEapi-v1-organizations--organization-"
               value="01kz7yrzs0fxcac1vxk1ej87ev"
               data-component="url">
    <br>
<p>The organization. Example: <code>01kz7yrzs0fxcac1vxk1ej87ev</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-officials">POST api/v1/officials</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-officials">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/officials" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "organization_id=architecto"\
    --form "name=n"\
    --form "position=g"\
    --form "nip_nik=z"\
    --form "bio=architecto"\
    --form "sort_order=16"\
    --form "is_active="\
    --form "photo=@C:\Users\LENOVO\AppData\Local\Temp\php2F35.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/officials"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('organization_id', 'architecto');
body.append('name', 'n');
body.append('position', 'g');
body.append('nip_nik', 'z');
body.append('bio', 'architecto');
body.append('sort_order', '16');
body.append('is_active', '');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-officials">
</span>
<span id="execution-results-POSTapi-v1-officials" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-officials"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-officials"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-officials" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-officials">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-officials" data-method="POST"
      data-path="api/v1/officials"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-officials', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-officials"
                    onclick="tryItOut('POSTapi-v1-officials');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-officials"
                    onclick="cancelTryOut('POSTapi-v1-officials');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-officials"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/officials</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-officials"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-officials"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>organization_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="organization_id"                data-endpoint="POSTapi-v1-officials"
               value="architecto"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-officials"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position"                data-endpoint="POSTapi-v1-officials"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nip_nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nip_nik"                data-endpoint="POSTapi-v1-officials"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="POSTapi-v1-officials"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTapi-v1-officials"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-officials" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-officials"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-officials" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-officials"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="POSTapi-v1-officials"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F35.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-officials--official-">PUT api/v1/officials/{official}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-officials--official-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "organization_id=architecto"\
    --form "name=n"\
    --form "position=g"\
    --form "nip_nik=z"\
    --form "bio=architecto"\
    --form "sort_order=16"\
    --form "is_active=1"\
    --form "photo=@C:\Users\LENOVO\AppData\Local\Temp\php2F36.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('organization_id', 'architecto');
body.append('name', 'n');
body.append('position', 'g');
body.append('nip_nik', 'z');
body.append('bio', 'architecto');
body.append('sort_order', '16');
body.append('is_active', '1');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-officials--official-">
</span>
<span id="execution-results-PUTapi-v1-officials--official-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-officials--official-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-officials--official-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-officials--official-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-officials--official-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-officials--official-" data-method="PUT"
      data-path="api/v1/officials/{official}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-officials--official-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-officials--official-"
                    onclick="tryItOut('PUTapi-v1-officials--official-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-officials--official-"
                    onclick="cancelTryOut('PUTapi-v1-officials--official-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-officials--official-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/officials/{official}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-officials--official-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-officials--official-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>official</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="official"                data-endpoint="PUTapi-v1-officials--official-"
               value="01kz7yrzvhpa131jcs54mh0f8g"
               data-component="url">
    <br>
<p>The official. Example: <code>01kz7yrzvhpa131jcs54mh0f8g</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>organization_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="organization_id"                data-endpoint="PUTapi-v1-officials--official-"
               value="architecto"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-officials--official-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position"                data-endpoint="PUTapi-v1-officials--official-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nip_nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nip_nik"                data-endpoint="PUTapi-v1-officials--official-"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="PUTapi-v1-officials--official-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PUTapi-v1-officials--official-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-officials--official-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-officials--official-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-officials--official-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-officials--official-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="PUTapi-v1-officials--official-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F36.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-officials--official-">DELETE api/v1/officials/{official}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-officials--official-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/officials/01kz7yrzvhpa131jcs54mh0f8g"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-officials--official-">
</span>
<span id="execution-results-DELETEapi-v1-officials--official-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-officials--official-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-officials--official-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-officials--official-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-officials--official-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-officials--official-" data-method="DELETE"
      data-path="api/v1/officials/{official}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-officials--official-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-officials--official-"
                    onclick="tryItOut('DELETEapi-v1-officials--official-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-officials--official-"
                    onclick="cancelTryOut('DELETEapi-v1-officials--official-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-officials--official-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/officials/{official}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-officials--official-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-officials--official-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>official</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="official"                data-endpoint="DELETEapi-v1-officials--official-"
               value="01kz7yrzvhpa131jcs54mh0f8g"
               data-component="url">
    <br>
<p>The official. Example: <code>01kz7yrzvhpa131jcs54mh0f8g</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-posts">POST api/v1/posts</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/posts" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "post_category_id=architecto"\
    --form "title=n"\
    --form "slug=g"\
    --form "excerpt=z"\
    --form "content=architecto"\
    --form "status=archived"\
    --form "is_highlight=1"\
    --form "published_at=2026-08-10T14:29:47"\
    --form "cover_image=@C:\Users\LENOVO\AppData\Local\Temp\php2F46.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/posts"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('post_category_id', 'architecto');
body.append('title', 'n');
body.append('slug', 'g');
body.append('excerpt', 'z');
body.append('content', 'architecto');
body.append('status', 'archived');
body.append('is_highlight', '1');
body.append('published_at', '2026-08-10T14:29:47');
body.append('cover_image', document.querySelector('input[name="cover_image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts">
</span>
<span id="execution-results-POSTapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts" data-method="POST"
      data-path="api/v1/posts"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts"
                    onclick="tryItOut('POSTapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts"
                    onclick="cancelTryOut('POSTapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_category_id"                data-endpoint="POSTapi-v1-posts"
               value="architecto"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-posts"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-v1-posts"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excerpt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="excerpt"                data-endpoint="POSTapi-v1-posts"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-v1-posts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-v1-posts"
               value="archived"
               data-component="body">
    <br>
<p>Example: <code>archived</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>draft</code></li> <li><code>published</code></li> <li><code>archived</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_highlight</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-posts" style="display: none">
            <input type="radio" name="is_highlight"
                   value="true"
                   data-endpoint="POSTapi-v1-posts"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-posts" style="display: none">
            <input type="radio" name="is_highlight"
                   value="false"
                   data-endpoint="POSTapi-v1-posts"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="published_at"                data-endpoint="POSTapi-v1-posts"
               value="2026-08-10T14:29:47"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-10T14:29:47</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image"                data-endpoint="POSTapi-v1-posts"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F46.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-posts--post-">PUT api/v1/posts/{post}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-posts--post-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "post_category_id=architecto"\
    --form "title=n"\
    --form "slug=g"\
    --form "excerpt=z"\
    --form "content=architecto"\
    --form "status=published"\
    --form "is_highlight="\
    --form "published_at=2026-08-10T14:29:47"\
    --form "cover_image=@C:\Users\LENOVO\AppData\Local\Temp\php2F57.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('post_category_id', 'architecto');
body.append('title', 'n');
body.append('slug', 'g');
body.append('excerpt', 'z');
body.append('content', 'architecto');
body.append('status', 'published');
body.append('is_highlight', '');
body.append('published_at', '2026-08-10T14:29:47');
body.append('cover_image', document.querySelector('input[name="cover_image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-posts--post-">
</span>
<span id="execution-results-PUTapi-v1-posts--post-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-posts--post-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-posts--post-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-posts--post-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-posts--post-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-posts--post-" data-method="PUT"
      data-path="api/v1/posts/{post}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-posts--post-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-posts--post-"
                    onclick="tryItOut('PUTapi-v1-posts--post-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-posts--post-"
                    onclick="cancelTryOut('PUTapi-v1-posts--post-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-posts--post-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/posts/{post}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-posts--post-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-posts--post-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post"                data-endpoint="PUTapi-v1-posts--post-"
               value="01kz7yrzw30pgr45w89qx3rq5b"
               data-component="url">
    <br>
<p>The post. Example: <code>01kz7yrzw30pgr45w89qx3rq5b</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_category_id"                data-endpoint="PUTapi-v1-posts--post-"
               value="architecto"
               data-component="body">
    <br>
<p>Must match an existing stored value. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-posts--post-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-v1-posts--post-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excerpt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="excerpt"                data-endpoint="PUTapi-v1-posts--post-"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-v1-posts--post-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-v1-posts--post-"
               value="published"
               data-component="body">
    <br>
<p>Example: <code>published</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>draft</code></li> <li><code>published</code></li> <li><code>archived</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_highlight</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-posts--post-" style="display: none">
            <input type="radio" name="is_highlight"
                   value="true"
                   data-endpoint="PUTapi-v1-posts--post-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-posts--post-" style="display: none">
            <input type="radio" name="is_highlight"
                   value="false"
                   data-endpoint="PUTapi-v1-posts--post-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>published_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="published_at"                data-endpoint="PUTapi-v1-posts--post-"
               value="2026-08-10T14:29:47"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-10T14:29:47</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image"                data-endpoint="PUTapi-v1-posts--post-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F57.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-posts--post-">DELETE api/v1/posts/{post}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-posts--post-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/posts/01kz7yrzw30pgr45w89qx3rq5b"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-posts--post-">
</span>
<span id="execution-results-DELETEapi-v1-posts--post-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-posts--post-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-posts--post-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-posts--post-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-posts--post-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-posts--post-" data-method="DELETE"
      data-path="api/v1/posts/{post}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-posts--post-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-posts--post-"
                    onclick="tryItOut('DELETEapi-v1-posts--post-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-posts--post-"
                    onclick="cancelTryOut('DELETEapi-v1-posts--post-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-posts--post-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/posts/{post}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-posts--post-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-posts--post-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post"                data-endpoint="DELETEapi-v1-posts--post-"
               value="01kz7yrzw30pgr45w89qx3rq5b"
               data-component="url">
    <br>
<p>The post. Example: <code>01kz7yrzw30pgr45w89qx3rq5b</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-locations">POST api/v1/locations</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-locations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/locations" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "category=ibadah"\
    --form "description=Eius et animi quos velit et."\
    --form "address=v"\
    --form "latitude=-89"\
    --form "longitude=-179"\
    --form "is_active=1"\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2F58.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/locations"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('category', 'ibadah');
body.append('description', 'Eius et animi quos velit et.');
body.append('address', 'v');
body.append('latitude', '-89');
body.append('longitude', '-179');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-locations">
</span>
<span id="execution-results-POSTapi-v1-locations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-locations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-locations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-locations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-locations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-locations" data-method="POST"
      data-path="api/v1/locations"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-locations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-locations"
                    onclick="tryItOut('POSTapi-v1-locations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-locations"
                    onclick="cancelTryOut('POSTapi-v1-locations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-locations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/locations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-locations"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-locations"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-v1-locations"
               value="ibadah"
               data-component="body">
    <br>
<p>Example: <code>ibadah</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>umkm</code></li> <li><code>fasilitas_kesehatan</code></li> <li><code>fasilitas_pendidikan</code></li> <li><code>rawan_bencana</code></li> <li><code>kantor_desa</code></li> <li><code>ibadah</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-locations"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-locations"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="POSTapi-v1-locations"
               value="-89"
               data-component="body">
    <br>
<p>Must be between -90 and 90. Example: <code>-89</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="POSTapi-v1-locations"
               value="-179"
               data-component="body">
    <br>
<p>Must be between -180 and 180. Example: <code>-179</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-locations" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-locations"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-locations" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-locations"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-v1-locations"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F58.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-locations--location-">PUT api/v1/locations/{location}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-locations--location-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "category=ibadah"\
    --form "description=Eius et animi quos velit et."\
    --form "address=v"\
    --form "latitude=-89"\
    --form "longitude=-179"\
    --form "is_active=1"\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2F69.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('category', 'ibadah');
body.append('description', 'Eius et animi quos velit et.');
body.append('address', 'v');
body.append('latitude', '-89');
body.append('longitude', '-179');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-locations--location-">
</span>
<span id="execution-results-PUTapi-v1-locations--location-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-locations--location-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-locations--location-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-locations--location-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-locations--location-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-locations--location-" data-method="PUT"
      data-path="api/v1/locations/{location}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-locations--location-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-locations--location-"
                    onclick="tryItOut('PUTapi-v1-locations--location-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-locations--location-"
                    onclick="cancelTryOut('PUTapi-v1-locations--location-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-locations--location-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/locations/{location}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-locations--location-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-locations--location-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="PUTapi-v1-locations--location-"
               value="01kz7yrzwymrmgydmx9wpx3vnd"
               data-component="url">
    <br>
<p>The location. Example: <code>01kz7yrzwymrmgydmx9wpx3vnd</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-locations--location-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-v1-locations--location-"
               value="ibadah"
               data-component="body">
    <br>
<p>Example: <code>ibadah</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>umkm</code></li> <li><code>fasilitas_kesehatan</code></li> <li><code>fasilitas_pendidikan</code></li> <li><code>rawan_bencana</code></li> <li><code>kantor_desa</code></li> <li><code>ibadah</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-locations--location-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-locations--location-"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="PUTapi-v1-locations--location-"
               value="-89"
               data-component="body">
    <br>
<p>Must be between -90 and 90. Example: <code>-89</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="PUTapi-v1-locations--location-"
               value="-179"
               data-component="body">
    <br>
<p>Must be between -180 and 180. Example: <code>-179</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-locations--location-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-locations--location-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-locations--location-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-locations--location-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTapi-v1-locations--location-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2F69.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-locations--location-">DELETE api/v1/locations/{location}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-locations--location-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/locations/01kz7yrzwymrmgydmx9wpx3vnd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-locations--location-">
</span>
<span id="execution-results-DELETEapi-v1-locations--location-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-locations--location-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-locations--location-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-locations--location-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-locations--location-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-locations--location-" data-method="DELETE"
      data-path="api/v1/locations/{location}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-locations--location-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-locations--location-"
                    onclick="tryItOut('DELETEapi-v1-locations--location-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-locations--location-"
                    onclick="cancelTryOut('DELETEapi-v1-locations--location-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-locations--location-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/locations/{location}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-locations--location-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-locations--location-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="DELETEapi-v1-locations--location-"
               value="01kz7yrzwymrmgydmx9wpx3vnd"
               data-component="url">
    <br>
<p>The location. Example: <code>01kz7yrzwymrmgydmx9wpx3vnd</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-complaints">GET api/v1/complaints</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-complaints">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/complaints" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/complaints"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-complaints">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-complaints" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-complaints"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-complaints"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-complaints" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-complaints">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-complaints" data-method="GET"
      data-path="api/v1/complaints"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-complaints', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-complaints"
                    onclick="tryItOut('GETapi-v1-complaints');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-complaints"
                    onclick="cancelTryOut('GETapi-v1-complaints');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-complaints"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/complaints</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-complaints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-complaints"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PATCHapi-v1-complaints--complaint--status">PATCH api/v1/complaints/{complaint}/status</h2>

<p>
</p>



<span id="example-requests-PATCHapi-v1-complaints--complaint--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/v1/complaints/01kz7yrzxj9gmdsm0xhkv2x818/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/complaints/01kz7yrzxj9gmdsm0xhkv2x818/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "pending"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-complaints--complaint--status">
</span>
<span id="execution-results-PATCHapi-v1-complaints--complaint--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-complaints--complaint--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-complaints--complaint--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-complaints--complaint--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-complaints--complaint--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-complaints--complaint--status" data-method="PATCH"
      data-path="api/v1/complaints/{complaint}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-complaints--complaint--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-complaints--complaint--status"
                    onclick="tryItOut('PATCHapi-v1-complaints--complaint--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-complaints--complaint--status"
                    onclick="cancelTryOut('PATCHapi-v1-complaints--complaint--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-complaints--complaint--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/complaints/{complaint}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-complaints--complaint--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-complaints--complaint--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>complaint</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="complaint"                data-endpoint="PATCHapi-v1-complaints--complaint--status"
               value="01kz7yrzxj9gmdsm0xhkv2x818"
               data-component="url">
    <br>
<p>The complaint. Example: <code>01kz7yrzxj9gmdsm0xhkv2x818</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-v1-complaints--complaint--status"
               value="pending"
               data-component="body">
    <br>
<p>Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>processing</code></li> <li><code>resolved</code></li> <li><code>rejected</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-demographics-families">POST api/v1/demographics/families</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-demographics-families">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/demographics/families" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"kk_number\": \"bngzmiyvdljnikhw\",
    \"head_of_family_name\": \"a\",
    \"address\": \"architecto\",
    \"rt\": \"n\",
    \"rw\": \"g\",
    \"postal_code\": \"zmiyv\",
    \"village\": \"architecto\",
    \"district\": \"architecto\",
    \"city\": \"architecto\",
    \"province\": \"architecto\",
    \"head_resident\": {
        \"nik\": \"bngzmiyvdljnikhw\",
        \"name\": \"a\",
        \"place_of_birth\": \"y\",
        \"date_of_birth\": \"2026-08-10T14:29:47\",
        \"gender\": \"LAKI-LAKI\",
        \"religion\": \"architecto\",
        \"marital_status\": \"architecto\"
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/demographics/families"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "kk_number": "bngzmiyvdljnikhw",
    "head_of_family_name": "a",
    "address": "architecto",
    "rt": "n",
    "rw": "g",
    "postal_code": "zmiyv",
    "village": "architecto",
    "district": "architecto",
    "city": "architecto",
    "province": "architecto",
    "head_resident": {
        "nik": "bngzmiyvdljnikhw",
        "name": "a",
        "place_of_birth": "y",
        "date_of_birth": "2026-08-10T14:29:47",
        "gender": "LAKI-LAKI",
        "religion": "architecto",
        "marital_status": "architecto"
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-demographics-families">
</span>
<span id="execution-results-POSTapi-v1-demographics-families" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-demographics-families"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-demographics-families"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-demographics-families" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-demographics-families">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-demographics-families" data-method="POST"
      data-path="api/v1/demographics/families"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-demographics-families', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-demographics-families"
                    onclick="tryItOut('POSTapi-v1-demographics-families');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-demographics-families"
                    onclick="cancelTryOut('POSTapi-v1-demographics-families');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-demographics-families"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/demographics/families</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-demographics-families"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-demographics-families"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kk_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kk_number"                data-endpoint="POSTapi-v1-demographics-families"
               value="bngzmiyvdljnikhw"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>bngzmiyvdljnikhw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>head_of_family_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_of_family_name"                data-endpoint="POSTapi-v1-demographics-families"
               value="a"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rt"                data-endpoint="POSTapi-v1-demographics-families"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 3 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rw</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rw"                data-endpoint="POSTapi-v1-demographics-families"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 3 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="POSTapi-v1-demographics-families"
               value="zmiyv"
               data-component="body">
    <br>
<p>Must be 5 characters. Example: <code>zmiyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>head_resident</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.nik"                data-endpoint="POSTapi-v1-demographics-families"
               value="bngzmiyvdljnikhw"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>bngzmiyvdljnikhw</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.name"                data-endpoint="POSTapi-v1-demographics-families"
               value="a"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>a</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>place_of_birth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.place_of_birth"                data-endpoint="POSTapi-v1-demographics-families"
               value="y"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>y</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>date_of_birth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.date_of_birth"                data-endpoint="POSTapi-v1-demographics-families"
               value="2026-08-10T14:29:47"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-08-10T14:29:47</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.gender"                data-endpoint="POSTapi-v1-demographics-families"
               value="LAKI-LAKI"
               data-component="body">
    <br>
<p>Example: <code>LAKI-LAKI</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>LAKI-LAKI</code></li> <li><code>PEREMPUAN</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>religion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.religion"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>marital_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_resident.marital_status"                data-endpoint="POSTapi-v1-demographics-families"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-products">POST api/v1/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "slug=n"\
    --form "category=jasa"\
    --form "description=Eius et animi quos velit et."\
    --form "owner_name=v"\
    --form "phone_number=dljnikhwaykcmyuw"\
    --form "price=67"\
    --form "is_active=1"\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2FD7.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('slug', 'n');
body.append('category', 'jasa');
body.append('description', 'Eius et animi quos velit et.');
body.append('owner_name', 'v');
body.append('phone_number', 'dljnikhwaykcmyuw');
body.append('price', '67');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-products">
</span>
<span id="execution-results-POSTapi-v1-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-products" data-method="POST"
      data-path="api/v1/products"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-products"
                    onclick="tryItOut('POSTapi-v1-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-products"
                    onclick="cancelTryOut('POSTapi-v1-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-products"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-v1-products"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-v1-products"
               value="jasa"
               data-component="body">
    <br>
<p>Example: <code>jasa</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>kuliner</code></li> <li><code>kerajinan</code></li> <li><code>pertanian</code></li> <li><code>jasa</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-products"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>owner_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="owner_name"                data-endpoint="POSTapi-v1-products"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-v1-products"
               value="dljnikhwaykcmyuw"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>dljnikhwaykcmyuw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-v1-products"
               value="67"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>67</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-products" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-products" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-v1-products"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2FD7.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-products--product-">PUT api/v1/products/{product}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-products--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "slug=n"\
    --form "category=kerajinan"\
    --form "description=Eius et animi quos velit et."\
    --form "owner_name=v"\
    --form "phone_number=dljnikhwaykcmyuw"\
    --form "price=67"\
    --form "is_active=1"\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2FD8.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('slug', 'n');
body.append('category', 'kerajinan');
body.append('description', 'Eius et animi quos velit et.');
body.append('owner_name', 'v');
body.append('phone_number', 'dljnikhwaykcmyuw');
body.append('price', '67');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-products--product-">
</span>
<span id="execution-results-PUTapi-v1-products--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-products--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-products--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-products--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-products--product-" data-method="PUT"
      data-path="api/v1/products/{product}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-products--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-products--product-"
                    onclick="tryItOut('PUTapi-v1-products--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-products--product-"
                    onclick="cancelTryOut('PUTapi-v1-products--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-products--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/products/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-products--product-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-products--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="PUTapi-v1-products--product-"
               value="01kz7yrzyarm3e21jnvvfvgzer"
               data-component="url">
    <br>
<p>The product. Example: <code>01kz7yrzyarm3e21jnvvfvgzer</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-products--product-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-v1-products--product-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-v1-products--product-"
               value="kerajinan"
               data-component="body">
    <br>
<p>Example: <code>kerajinan</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>kuliner</code></li> <li><code>kerajinan</code></li> <li><code>pertanian</code></li> <li><code>jasa</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-products--product-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>owner_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="owner_name"                data-endpoint="PUTapi-v1-products--product-"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>v</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="PUTapi-v1-products--product-"
               value="dljnikhwaykcmyuw"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>dljnikhwaykcmyuw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-v1-products--product-"
               value="67"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>67</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-products--product-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-products--product-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-products--product-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-products--product-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTapi-v1-products--product-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2FD8.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-products--product-">DELETE api/v1/products/{product}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-products--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products/01kz7yrzyarm3e21jnvvfvgzer"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-products--product-">
</span>
<span id="execution-results-DELETEapi-v1-products--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-products--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-products--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-products--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-products--product-" data-method="DELETE"
      data-path="api/v1/products/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-products--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-products--product-"
                    onclick="tryItOut('DELETEapi-v1-products--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-products--product-"
                    onclick="cancelTryOut('DELETEapi-v1-products--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-products--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/products/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-products--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-products--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="DELETEapi-v1-products--product-"
               value="01kz7yrzyarm3e21jnvvfvgzer"
               data-component="url">
    <br>
<p>The product. Example: <code>01kz7yrzyarm3e21jnvvfvgzer</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-galleries">POST api/v1/galleries</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-galleries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/galleries" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=b"\
    --form "category=kegiatan"\
    --form "year=22"\
    --form "is_active=1"\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2FE9.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'b');
body.append('category', 'kegiatan');
body.append('year', '22');
body.append('is_active', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-galleries">
</span>
<span id="execution-results-POSTapi-v1-galleries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-galleries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-galleries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-galleries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-galleries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-galleries" data-method="POST"
      data-path="api/v1/galleries"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-galleries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-galleries"
                    onclick="tryItOut('POSTapi-v1-galleries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-galleries"
                    onclick="cancelTryOut('POSTapi-v1-galleries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-galleries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/galleries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-galleries"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-galleries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-galleries"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-v1-galleries"
               value="kegiatan"
               data-component="body">
    <br>
<p>Example: <code>kegiatan</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>kegiatan</code></li> <li><code>pembangunan</code></li> <li><code>alam</code></li> <li><code>budaya</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="year"                data-endpoint="POSTapi-v1-galleries"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 2000. Must not be greater than 2099. Example: <code>22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-galleries" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-galleries"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-galleries" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-galleries"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-v1-galleries"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2FE9.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-galleries--gallery-">PUT api/v1/galleries/{gallery}</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-galleries--gallery-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "title=b"\
    --form "category=pembangunan"\
    --form "year=22"\
    --form "is_active="\
    --form "image=@C:\Users\LENOVO\AppData\Local\Temp\php2FEA.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('title', 'b');
body.append('category', 'pembangunan');
body.append('year', '22');
body.append('is_active', '');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-galleries--gallery-">
</span>
<span id="execution-results-PUTapi-v1-galleries--gallery-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-galleries--gallery-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-galleries--gallery-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-galleries--gallery-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-galleries--gallery-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-galleries--gallery-" data-method="PUT"
      data-path="api/v1/galleries/{gallery}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-galleries--gallery-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-galleries--gallery-"
                    onclick="tryItOut('PUTapi-v1-galleries--gallery-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-galleries--gallery-"
                    onclick="cancelTryOut('PUTapi-v1-galleries--gallery-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-galleries--gallery-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/galleries/{gallery}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>gallery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gallery"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="01kz7yrzyvbm3fr3pq350dsxcp"
               data-component="url">
    <br>
<p>The gallery. Example: <code>01kz7yrzyvbm3fr3pq350dsxcp</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="pembangunan"
               data-component="body">
    <br>
<p>Example: <code>pembangunan</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>kegiatan</code></li> <li><code>pembangunan</code></li> <li><code>alam</code></li> <li><code>budaya</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="year"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 2000. Must not be greater than 2099. Example: <code>22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-galleries--gallery-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-galleries--gallery-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-galleries--gallery-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-galleries--gallery-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTapi-v1-galleries--gallery-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 5120 kilobytes. Example: <code>C:\Users\LENOVO\AppData\Local\Temp\php2FEA.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-galleries--gallery-">DELETE api/v1/galleries/{gallery}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-galleries--gallery-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/galleries/01kz7yrzyvbm3fr3pq350dsxcp"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-galleries--gallery-">
</span>
<span id="execution-results-DELETEapi-v1-galleries--gallery-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-galleries--gallery-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-galleries--gallery-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-galleries--gallery-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-galleries--gallery-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-galleries--gallery-" data-method="DELETE"
      data-path="api/v1/galleries/{gallery}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-galleries--gallery-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-galleries--gallery-"
                    onclick="tryItOut('DELETEapi-v1-galleries--gallery-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-galleries--gallery-"
                    onclick="cancelTryOut('DELETEapi-v1-galleries--gallery-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-galleries--gallery-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/galleries/{gallery}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-galleries--gallery-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-galleries--gallery-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>gallery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gallery"                data-endpoint="DELETEapi-v1-galleries--gallery-"
               value="01kz7yrzyvbm3fr3pq350dsxcp"
               data-component="url">
    <br>
<p>The gallery. Example: <code>01kz7yrzyvbm3fr3pq350dsxcp</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
