{{-- Basic --}}
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Title --}}
<title>{{ $title ?? 'WEBN | Modern URL Shortener' }}</title>

{{-- SEO --}}
<meta name="description"
    content="{{ $description ?? 'WEBN is a modern URL shortener with analytics, QR support, branded links, and real-time tracking.' }}">

<meta name="keywords"
    content="url shortener, link shortener, qr code generator, analytics, branded links, short links, webn">

<meta name="author" content="WEBN">

<meta name="robots" content="index, follow">

{{-- Canonical --}}
<link rel="canonical" href="{{ url()->current() }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">

<meta property="og:title" content="{{ $title ?? 'WEBN | Modern URL Shortener' }}">

<meta property="og:description" content="{{ $description ?? 'Shorten, track, and manage links instantly with WEBN.' }}">

<meta property="og:url" content="{{ url()->current() }}">

<meta property="og:site_name" content="WEBN">

<meta property="og:image" content="{{ asset('assets/images/og-image.png') }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">

<meta name="twitter:title" content="{{ $title ?? 'WEBN | Modern URL Shortener' }}">

<meta name="twitter:description"
    content="{{ $description ?? 'Shorten, track, and manage links instantly with WEBN.' }}">

<meta name="twitter:image" content="{{ asset('assets/images/og-image.png') }}">

{{-- Favicon --}}
<link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4FJPWK7HZR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4FJPWK7HZR');
</script>
