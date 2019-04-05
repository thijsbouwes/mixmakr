<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ config('app.name', 'MixMakr') }}</title>

<!-- styles -->
<link rel="stylesheet" href="{{ mix("/css/app.css") }}">

<!-- SEO/Marketing -->
<meta name="keywords" content="MixMakr, Drinks, Events, Fun, Quality drinks, Mix drinks, Party"/>
<meta name="description" content="MixMakr robotic bartender, serves the best cocktails around."/>
<meta name="subject" content="{{ config('app.name', 'MixMakr') }}"/>
<meta name="author" content="Thijs Bouwes"/>

<!-- Open Graph -->
<meta property="og:url" content="{{ url('/') }}"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="{{ config('app.name', 'MixMakr') }}"/>
<meta property="og:image" content="{{ url('/') }}/images/skihut_logo.png"/>
<meta property="og:description" content="MixMakr robotic bartender, serves the best cocktails around."/>
<meta property="og:site_name" content="MixMakr"/>
<meta property="og:locale" content="nl_NL"/>

<!-- Twitter -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:url" content="{{ url('/') }}"/>
<meta name="twitter:title" content="{{ config('app.name', 'MixMakr') }}"/>
<meta name="twitter:description" content="MixMakr robotic bartender, serves the best cocktails around."/>
<meta name="twitter:image" content="{{ url('/') }}/images/skihut_logo.png"/>

<!-- Google -->
<meta itemprop="name" content="Content Title"/>
<meta itemprop="description" content="MixMakr robotic bartender, serves the best cocktails around."/>
<meta itemprop="image" content="{{ url('/') }}/images/skihut_logo.png"/>

<!-- Apple -->
<meta name="apple-mobile-web-app-title" content="MixMakr"/>

<!-- Icons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/images/favicon-16x16.png">
<link rel="manifest" href="{{ url('/') }}/images/site.webmanifest">
<link rel="mask-icon" href="{{ url('/') }}/images/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="{{ url('/') }}/images/favicon.ico">
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="msapplication-config" content="{{ url('/') }}/images/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
