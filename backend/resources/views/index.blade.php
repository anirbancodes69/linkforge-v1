<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>

    @include('brand-meta')
    @include('brand-meta', [
        'title' => 'WEBN — Modern URL Shortener',
        'description' => 'Shorten, track, and manage links instantly with WEBN.',
    ])

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        border: "hsl(240 3.7% 15.9%)",
                        background: "#030303",
                        primary: "#6366f1",
                        secondary: "#a855f7",
                        surface: "#09090b",
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #030303;
            color: #fafafa;
            -webkit-font-smoothing: antialiased;
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-glow {
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 1000px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(3, 3, 3, 0) 70%);
            z-index: -1;
        }

        .nav-blur {
            backdrop-filter: saturate(180%) blur(20px);
            background-color: rgba(3, 3, 3, 0.7);
        }

        /* Smooth Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #030303;
        }

        ::-webkit-scrollbar-thumb {
            background: #27272a;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3f3f46;
        }
    </style>
</head>

<body class="selection:bg-indigo-500/30">

    <!-- Sticky Navbar -->
    <nav class="fixed top-0 w-full z-50 nav-blur border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="{{ route('index') }}" class="flex items-center gap-3 group">

                    <img src="{{ asset('assets/images/logo1.png') }}" alt="WEBN Logo"
                        class="w-10 h-10 object-contain transition-transform duration-300 group-hover:scale-105">

                    <span class="text-xl font-bold font-heading tracking-tight">
                        WEBN
                    </span>

                </a>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-400">
                    <a href="#features" class="hover:text-white transition-colors">Features</a>
                    <a href="#faq-section" class="hover:text-white transition-colors">FAQs</a>
                    {{-- <a href="{{ route('docs.index') }}" class="hover:text-white transition-colors">Docs</a> --}}
                </div>
            </div>

            @auth
                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}"
                        class="hidden sm:block text-sm font-medium hover:text-white transition-colors px-4">Dashboard</a>
                    {{-- <a href="{{ route('register') }}"
                    class="bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-zinc-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)]">Get
                    Started</a> --}}
                    <button class="md:hidden text-zinc-400" id="mobile-menu-btn">
                        <i data-lucide="menu"></i>
                    </button>
                </div>
            @else
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}"
                        class="hidden sm:block text-sm font-medium hover:text-white transition-colors px-4">Log In</a>
                    {{-- <a href="{{ route('register') }}"
                    class="bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-zinc-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)]">Get
                    Started</a> --}}
                    <button class="md:hidden text-zinc-400" id="mobile-menu-btn">
                        <i data-lucide="menu"></i>
                    </button>
                </div>
            @endauth

        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="fixed inset-0 z-40 bg-background hidden pt-24 px-6">
        <div class="flex flex-col gap-6 text-2xl font-bold">
            <a href="#features" onclick="toggleMenu()">Features</a>
            <a href="#faq-section" onclick="toggleMenu()">FAQs</a>
            {{-- <a href="#" onclick="toggleMenu()">Docs</a> --}}
            <hr class="border-white/10">
            @auth
                <a href="{{ route('dashboard') }}" class="text-indigo-400">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-indigo-400">Log In</a>
            @endauth
        </div>
    </div>

    <!-- ===================================================== --><!-- HERO SECTION (REPLACE YOUR CURRENT HERO SECTION) --><!-- ===================================================== -->
    <section id="hero-section"
        class="relative min-h-screen pt-32 md:pt-40 pb-20 flex items-start md:items-center justify-center px-6 overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-200px] left-[-100px] w-[500px] h-[500px] bg-indigo-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-200px] right-[-100px] w-[500px] h-[500px] bg-violet-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
        </div>
        <div class="relative z-10 w-full max-w-6xl mx-auto"> <!-- HERO CONTENT -->
            <div class="flex flex-col items-center text-center"> <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass border border-indigo-500/20 text-indigo-300 text-xs font-semibold mb-8">
                    <span class="relative flex h-2 w-2"> <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span> </span> Real-time
                    link analytics
                </div> <!-- Heading -->
                <h1 class="text-5xl md:text-7xl font-black tracking-tight leading-[0.95] mb-6 max-w-5xl"> Shorten and
                    <span class="bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent"> track
                    </span> every link instantly.
                </h1> <!-- Subtext -->
                <p class="text-zinc-400 text-lg md:text-xl max-w-2xl leading-relaxed mb-14"> Built for creators,
                    marketers, and businesses sharing links on WhatsApp, Instagram, and beyond. </p>
                <!-- ===================================================== --> <!-- MAIN INTERACTIVE CONTAINER -->
                <!-- ===================================================== -->
                <div id="mainCard"
                    class="w-full max-w-3xl glass rounded-[2rem] border border-white/10 p-6 md:p-8 shadow-[0_0_80px_rgba(99,102,241,0.15)] transition-all duration-700">
                    <!-- ===================================================== --> <!-- INITIAL FORM -->
                    <!-- ===================================================== -->
                    <div id="formState" class="transition-all duration-500">
                        <div class="flex flex-col gap-4"> <!-- URL INPUT -->
                            <div class="relative"> <i data-lucide="link-2"
                                    class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"> </i> <input
                                    id="urlInput" type="text" placeholder="Paste your long URL here..."
                                    class="w-full h-16 bg-white/5 border border-white/10 rounded-2xl pl-14 pr-5 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all text-lg">
                            </div> <!-- ALIAS -->
                            <div class="relative"> <i data-lucide="sparkles"
                                    class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-500"> </i> <input
                                    id="aliasInput" type="text" placeholder="custom-alias (optional)"
                                    class="w-full h-14 bg-white/5 border border-white/10 rounded-2xl pl-14 pr-5 text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                            </div> <!-- CTA --> <button id="createBtn"
                                class="group relative overflow-hidden h-16 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white font-bold text-lg shadow-[0_0_40px_rgba(99,102,241,0.4)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                                <span id="btnText" class="relative z-10 flex items-center justify-center gap-2"> <i
                                        data-lucide="zap" class="w-5 h-5"> </i> Create Short Link </span>
                                <div
                                    class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </button>
                        </div> <!-- TRUST INDICATORS -->
                        <div class="flex flex-wrap items-center justify-center gap-6 mt-8 text-xs text-zinc-500">
                            <div class="flex items-center gap-2"> <i data-lucide="zap"
                                    class="w-4 h-4 text-indigo-400">
                                </i> Lightning fast redirects </div>
                            <div class="flex items-center gap-2"> <i data-lucide="bar-chart-3"
                                    class="w-4 h-4 text-indigo-400"> </i> Real-time analytics </div>
                            <div class="flex items-center gap-2"> <i data-lucide="smartphone"
                                    class="w-4 h-4 text-indigo-400"> </i> Mobile friendly </div>
                        </div>
                    </div> <!-- ===================================================== --> <!-- SUCCESS STATE -->
                    <!-- ===================================================== -->
                    <div id="successState" class="hidden opacity-0 translate-y-6 transition-all duration-700">
                        <!-- SUCCESS ICON -->
                        <div class="flex justify-center mb-6">
                            <div
                                class="w-20 h-20 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center shadow-[0_0_50px_rgba(16,185,129,0.25)]">
                                <i data-lucide="check" class="w-10 h-10 text-emerald-400"> </i>
                            </div>
                        </div> <!-- TITLE -->
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 leading-tight"> Your short link is ready </h2>
                        <!-- GENERATED URL -->
                        <div class="relative max-w-xl mx-auto mb-6">
                            <div class="absolute inset-0 bg-indigo-500/20 blur-2xl"></div>
                            <div
                                class="relative h-20 bg-gradient-to-r from-indigo-500/10 to-violet-500/10 border border-indigo-500/20 rounded-3xl flex items-center justify-center text-2xl md:text-3xl font-black tracking-tight">
                                <span id="generatedLink"
                                    class="bg-gradient-to-r from-indigo-300 to-violet-300 bg-clip-text text-transparent break-all text-center leading-tight">
                                    linkpe.io/summer24 </span>
                            </div>
                        </div> <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-lg mx-auto"> <button
                                id="copyBtn"
                                class="h-14 w-full sm:w-auto px-8 rounded-2xl bg-white text-black font-bold hover:bg-zinc-200 transition-all hover:scale-[1.02] active:scale-[0.98]">
                                Copy Link </button> <button
                                class="h-14 w-full sm:w-auto px-8 rounded-2xl glass border border-white/10 font-semibold hover:bg-white/5 transition-all">
                                Open Link </button> </div>
                        <!-- ===================================================== --> <!-- ANALYTICS PREVIEW -->
                        <!-- ===================================================== -->
                        <div id="analyticsPreview"
                            class="hidden opacity-0 translate-y-6 transition-all duration-700 mt-10">

                            <div class="glass rounded-[2rem] p-6 border border-white/10">

                                <div class="flex items-start gap-4 mb-8">

                                    <div
                                        class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center flex-shrink-0">

                                        <i data-lucide="bar-chart-3" class="w-6 h-6 text-indigo-400">
                                        </i>

                                    </div>

                                    <div class="text-left">

                                        <h3 class="text-xl font-bold mb-4"> Your analytics are already being collected
                                        </h3>

                                        <p class="text-zinc-400 leading-relaxed">
                                            Create a free account to unlock your analytics dashboard.
                                        </p>

                                    </div>

                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                    <div class="glass rounded-2xl p-5">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="mouse-pointer-click" class="w-4 h-4 text-indigo-400"></i>
                                            <span class="font-semibold">Click Tracking</span>
                                        </div>

                                        <p class="text-sm text-zinc-500">
                                            Monitor every visit instantly.
                                        </p>
                                    </div>

                                    <div class="glass rounded-2xl p-5">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="smartphone" class="w-4 h-4 text-indigo-400"></i>
                                            <span class="font-semibold">Device Insights</span>
                                        </div>

                                        <p class="text-sm text-zinc-500">
                                            Track mobile vs desktop traffic.
                                        </p>
                                    </div>

                                    <div class="glass rounded-2xl p-5">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="globe" class="w-4 h-4 text-indigo-400"></i>
                                            <span class="font-semibold">Location Analytics</span>
                                        </div>

                                        <p class="text-sm text-zinc-500">
                                            Discover where visitors come from.
                                        </p>
                                    </div>

                                    <div class="glass rounded-2xl p-5">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="monitor" class="w-4 h-4 text-indigo-400"></i>
                                            <span class="font-semibold">Browser Data</span>
                                        </div>

                                        <p class="text-sm text-zinc-500">
                                            Understand user technology usage.
                                        </p>
                                    </div>

                                    <!-- Center Button -->
                                    <div
                                        class="sm:col-span-2 flex flex-col items-center justify-center text-center pt-4">
                                        {{-- <button
            class="h-14 px-10 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white font-bold shadow-[0_0_40px_rgba(99,102,241,0.3)] hover:scale-[1.02] active:scale-[0.98] transition-all">
        </button> --}}

                                        <a href="{{ route('register') }}"
                                            class="bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-zinc-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                                            Create Free Account
                                        </a>

                                        <p class="text-sm text-zinc-500 mt-5">
                                            Already have an account?
                                            <a href="{{ route('login') }}"
                                                class="text-indigo-400 hover:text-indigo-300 transition-colors">
                                                Sign in
                                            </a>
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div> <!-- ===================================================== --> <!-- ACCOUNT CTA -->
                        <!-- ===================================================== -->
                        {{-- <div id="signupCTA" class="hidden opacity-0 translate-y-6 transition-all duration-700 mt-10">
                            <div class="glass rounded-[2rem] border border-white/10 p-8 bg-white/[0.03]">
                                <h3 class="text-2xl font-bold mb-4"> Your analytics are already being collected </h3>
                                <div class="grid grid-cols-2 gap-4 text-left max-w-xl mx-auto mb-8">
                                    <div class="flex items-center gap-3 text-zinc-300"> <i data-lucide="check"
                                            class="w-4 h-4 text-emerald-400"> </i> Link history </div>
                                    <div class="flex items-center gap-3 text-zinc-300"> <i data-lucide="check"
                                            class="w-4 h-4 text-emerald-400"> </i> Device insights </div>
                                    <div class="flex items-center gap-3 text-zinc-300"> <i data-lucide="check"
                                            class="w-4 h-4 text-emerald-400"> </i> Browser analytics </div>
                                    <div class="flex items-center gap-3 text-zinc-300"> <i data-lucide="check"
                                            class="w-4 h-4 text-emerald-400"> </i> Country tracking </div>
                                </div> <button
                                    class="h-14 px-10 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white font-bold shadow-[0_0_40px_rgba(99,102,241,0.3)] hover:scale-[1.02] active:scale-[0.98] transition-all">
                                    Create Free Account </button>
                                <p class="text-sm text-zinc-500 mt-5"> Already have an account? <a href="#"
                                        class="text-indigo-400 hover:text-indigo-300 transition-colors"> Sign in </a>
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By -->
    {{-- <section class="py-10 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-zinc-500 text-sm font-medium mb-10">TRUSTED BY TEAMS AT INNOVATIVE STARTUPS</p>
            <div class="flex flex-wrap justify-center gap-12 md:gap-24 opacity-40 grayscale">
                <span class="text-2xl font-bold tracking-tighter italic">VECTA</span>
                <span class="text-2xl font-bold tracking-tighter italic">QUANTUM</span>
                <span class="text-2xl font-bold tracking-tighter italic">SYNERGY</span>
                <span class="text-2xl font-bold tracking-tighter italic">NEBULA</span>
                <span class="text-2xl font-bold tracking-tighter italic">APEX</span>
            </div>
        </div>
    </section> --}}

    <!-- Features Section -->
    <section id="features" class="py-32 px-6 max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-5xl font-bold font-heading mb-4">Enterprise links for everyone</h2>
            <p class="text-zinc-500 max-w-xl mx-auto">Powerful features to help you grow your brand and understand your
                audience.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Feature Card 1 -->
            <div class="reveal group glass p-8 rounded-[2rem] hover:border-indigo-500/40 transition-all duration-500">
                <div
                    class="w-12 h-12 bg-indigo-500/10 rounded-2xl flex items-center justify-center mb-6 text-indigo-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="zap"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Smart Shortening</h3>
                <p class="text-zinc-500 leading-relaxed">Instantly shorten links and add custom back-halves to boost
                    click-through rates by up to 34%.</p>
            </div>

            <!-- Feature Card 2 -->
            <div class="reveal group glass p-8 rounded-[2rem] hover:border-purple-500/40 transition-all duration-500">
                <div
                    class="w-12 h-12 bg-purple-500/10 rounded-2xl flex items-center justify-center mb-6 text-purple-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="qr-code"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">QR Code Studio</h3>
                <p class="text-zinc-500 leading-relaxed">Generate beautiful, trackable QR codes for print and digital
                    with custom colors and branding.</p>
            </div>

            <!-- Feature Card 3 -->
            <div class="reveal group glass p-8 rounded-[2rem] hover:border-blue-500/40 transition-all duration-500">
                <div
                    class="w-12 h-12 bg-blue-500/10 rounded-2xl flex items-center justify-center mb-6 text-blue-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="bar-chart-3"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Real-time Analytics</h3>
                <p class="text-zinc-500 leading-relaxed">Dive deep into click data. Track geography, devices, and
                    referral sources in milliseconds.</p>
            </div>

            <!-- Feature Card 4 -->
            {{-- <div class="reveal group glass p-8 rounded-[2rem] hover:border-emerald-500/40 transition-all duration-500">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-2xl flex items-center justify-center mb-6 text-emerald-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="globe"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Custom Domains</h3>
                <p class="text-zinc-500 leading-relaxed">Connect your own custom domain to replace dba.app with your own branded short links.</p>
            </div> --}}

            <!-- Feature Card 5 -->
            {{-- <div class="reveal group glass p-8 rounded-[2rem] hover:border-orange-500/40 transition-all duration-500">
                <div class="w-12 h-12 bg-orange-500/10 rounded-2xl flex items-center justify-center mb-6 text-orange-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="users"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Team Spaces</h3>
                <p class="text-zinc-500 leading-relaxed">Organize links into projects and collaborate with team members with granular permissions.</p>
            </div> --}}

            <!-- Feature Card 6 -->
            {{-- <div class="reveal group glass p-8 rounded-[2rem] hover:border-pink-500/40 transition-all duration-500">
                <div class="w-12 h-12 bg-pink-500/10 rounded-2xl flex items-center justify-center mb-6 text-pink-400 group-hover:scale-110 transition-transform">
                    <i data-lucide="code-2"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Developer API</h3>
                <p class="text-zinc-500 leading-relaxed">Robust REST API for programmatic link generation and analytics retrieval. Built for scale.</p>
            </div> --}}
        </div>
    </section>

    <!-- Analytics Showcase -->
    <section class="pb-32 bg-zinc-950/30">
        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-16 items-center">
            <div class="lg:w-1/2">
                <div class="inline-flex items-center gap-2 text-indigo-400 font-bold mb-4">
                    <i data-lucide="pie-chart" class="w-5 h-5"></i>
                    <span>ANALYTICS ENGINE</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold font-heading mb-6 leading-tight">Data that tells <br>a story.
                </h2>
                <p class="text-zinc-400 text-lg mb-8">Stop guessing. WEBN provides industry-leading attribution
                    data so you know exactly where your traffic is coming from.</p>

                {{-- <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-indigo-500/20 flex items-center justify-center mt-1">
                            <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                        </div>
                        <div>
                            <h4 class="font-bold">Privacy-First Tracking</h4>
                            <p class="text-zinc-500 text-sm">GDPR & CCPA compliant tracking without compromising on depth.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-indigo-500/20 flex items-center justify-center mt-1">
                            <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                        </div>
                        <div>
                            <h4 class="font-bold">Dynamic Routing</h4>
                            <p class="text-zinc-500 text-sm">Send users to different URLs based on their device or location.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="lg:w-1/2 w-full">
                <div class="glass p-8 rounded-3xl relative">
                    <div class="flex justify-between items-center mb-8">
                        <h4 class="font-bold">Device Breakdown</h4>
                        <i data-lucide="more-horizontal" class="text-zinc-500"></i>
                    </div>
                    <div class="flex items-center gap-12">
                        <div class="w-1/2">
                            <canvas id="deviceChart"></canvas>
                        </div>
                        <div class="w-1/2 space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Mobile</span>
                                <span class="font-bold">62%</span>
                            </div>
                            <div class="w-full h-1.5 bg-zinc-800 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full w-[62%]"></div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Desktop</span>
                                <span class="font-bold">31%</span>
                            </div>
                            <div class="w-full h-1.5 bg-zinc-800 rounded-full overflow-hidden">
                                <div class="bg-purple-500 h-full w-[31%]"></div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Other</span>
                                <span class="font-bold">7%</span>
                            </div>
                            <div class="w-full h-1.5 bg-zinc-800 rounded-full overflow-hidden">
                                <div class="bg-zinc-600 h-full w-[7%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- QR Showcase -->
    {{-- <section class="pb-32 px-6">
        <div class="max-w-7xl mx-auto glass rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 overflow-hidden relative">
            <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-600/10 blur-[100px]"></div>
            <div class="md:w-1/2 order-2 md:order-1">
                <div class="bg-white p-8 rounded-3xl shadow-[0_0_50px_rgba(255,255,255,0.1)] w-fit mx-auto md:mx-0">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://webn.in&color=4f46e5" alt="QR Preview" class="w-48 h-48">
                </div>
                <div class="mt-8 flex gap-4 justify-center md:justify-start">
                    <div class="w-10 h-10 rounded-full bg-indigo-600 border-4 border-zinc-900 ring-1 ring-white/10 cursor-pointer"></div>
                    <div class="w-10 h-10 rounded-full bg-emerald-500 border-4 border-zinc-900 ring-1 ring-white/10 cursor-pointer"></div>
                    <div class="w-10 h-10 rounded-full bg-purple-600 border-4 border-zinc-900 ring-1 ring-white/10 cursor-pointer"></div>
                    <div class="w-10 h-10 rounded-full bg-zinc-800 border-4 border-zinc-900 ring-1 ring-white/10 cursor-pointer"></div>
                </div>
            </div>
            <div class="md:w-1/2 order-1 md:order-2">
                <h2 class="text-4xl md:text-5xl font-bold font-heading mb-6">QR Codes, <br><span class="text-indigo-400">reimagined.</span></h2>
                <p class="text-zinc-400 text-lg mb-8">Generate dynamic QR codes that stay functional even if you change the destination URL later. Full customization of colors, shapes, and logos included.</p>
                <div class="flex gap-4">
                    <button class="bg-white text-black px-6 py-3 rounded-xl font-bold hover:bg-zinc-200 transition-all flex items-center gap-2">
                        <i data-lucide="download"></i> Download SVG
                    </button>
                    <button class="glass px-6 py-3 rounded-xl font-bold hover:bg-white/10 transition-all">
                        Customize
                    </button>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Pricing Section -->
    {{-- <section id="pricing" class="pb-32 px-6 max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-5xl font-bold font-heading mb-4">Transparent Pricing</h2>
            <p class="text-zinc-500">Scale from your first link to millions of clicks.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Free Plan -->
            <div class="reveal glass p-10 rounded-[2.5rem] flex flex-col hover:border-white/20 transition-colors">
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-2">Hobby</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-bold">$0</span>
                        <span class="text-zinc-500">/mo</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-12 flex-1 text-sm">
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> 100 Links / Month</li>
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> Basic Analytics</li>
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> 5 QR Codes</li>
                    <li class="flex items-center gap-3 text-zinc-500 opacity-50"><i data-lucide="x" class="w-4 h-4"></i> Custom Domains</li>
                </ul>
                <button class="w-full py-4 rounded-2xl glass font-bold hover:bg-white/5 transition-all">Get Started</button>
            </div>

            <!-- Pro Plan -->
            <div class="reveal relative p-10 rounded-[2.5rem] flex flex-col bg-gradient-to-b from-indigo-600 to-indigo-900 shadow-[0_20px_50px_rgba(79,70,229,0.2)] border border-indigo-400/30 scale-105 z-10">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-white text-black text-[10px] font-black uppercase px-4 py-1 rounded-full tracking-widest">Most Popular</div>
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-2">Professional</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-bold">$19</span>
                        <span class="text-indigo-200">/mo</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-12 flex-1 text-sm">
                    <li class="flex items-center gap-3 text-white"><i data-lucide="check" class="w-4 h-4 text-indigo-300"></i> Unlimited Links</li>
                    <li class="flex items-center gap-3 text-white"><i data-lucide="check" class="w-4 h-4 text-indigo-300"></i> Advanced Real-time Stats</li>
                    <li class="flex items-center gap-3 text-white"><i data-lucide="check" class="w-4 h-4 text-indigo-300"></i> 3 Branded Domains</li>
                    <li class="flex items-center gap-3 text-white"><i data-lucide="check" class="w-4 h-4 text-indigo-300"></i> Bulk QR Generation</li>
                    <li class="flex items-center gap-3 text-white"><i data-lucide="check" class="w-4 h-4 text-indigo-300"></i> Priority Support</li>
                </ul>
                <button class="w-full py-4 rounded-2xl bg-white text-black font-bold hover:bg-zinc-100 transition-all shadow-lg">Start Free Trial</button>
            </div>

            <!-- Enterprise Plan -->
            <div class="reveal glass p-10 rounded-[2.5rem] flex flex-col hover:border-white/20 transition-colors">
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-2">Enterprise</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-bold">$99</span>
                        <span class="text-zinc-500">/mo</span>
                    </div>
                </div>
                <ul class="space-y-4 mb-12 flex-1 text-sm">
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> Everything in Pro</li>
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> Single Sign-On (SSO)</li>
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> SLA Guarantee</li>
                    <li class="flex items-center gap-3 text-zinc-300"><i data-lucide="check" class="w-4 h-4 text-emerald-400"></i> Dedicated Account Manager</li>
                </ul>
                <button class="w-full py-4 rounded-2xl glass font-bold hover:bg-white/5 transition-all">Contact Sales</button>
            </div>
        </div>
    </section> --}}

    <!-- Testimonials -->
    {{-- <section class="pb-32 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">
            <div class="reveal glass p-8 rounded-3xl">
                <div class="flex gap-1 text-yellow-500 mb-4">
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                </div>
                <p class="text-zinc-300 mb-6 italic">"WEBN's API is incredibly robust. We integrated it into our marketing stack in under an hour and haven't looked back."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-zinc-800"></div>
                    <div>
                        <p class="text-sm font-bold">Alex Rivera</p>
                        <p class="text-xs text-zinc-500">CTO at TechFlow</p>
                    </div>
                </div>
            </div>
            <div class="reveal glass p-8 rounded-3xl">
                <div class="flex gap-1 text-yellow-500 mb-4">
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                </div>
                <p class="text-zinc-300 mb-6 italic">"The QR code generator alone is worth the subscription. Clean UI and great tracking data for our physical store locations."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-zinc-800"></div>
                    <div>
                        <p class="text-sm font-bold">Sarah Jenkins</p>
                        <p class="text-xs text-zinc-500">Marketing Lead at RetailGo</p>
                    </div>
                </div>
            </div>
            <div class="reveal glass p-8 rounded-3xl">
                <div class="flex gap-1 text-yellow-500 mb-4">
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                    <i data-lucide="star" class="fill-current w-4 h-4"></i>
                </div>
                <p class="text-zinc-300 mb-6 italic">"Reliable, fast, and the dashboard is a work of art. It’s the tool we needed for our enterprise-wide link management."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-zinc-800"></div>
                    <div>
                        <p class="text-sm font-bold">Michael Chen</p>
                        <p class="text-xs text-zinc-500">Product Manager at Nebula</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- FAQ Section -->
    <section class="pb-32 px-6" id="faq-section">

        <div class="max-w-4xl mx-auto">

            <!-- SECTION HEADER -->

            <div class="text-center mb-16">

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass border border-indigo-500/20 text-indigo-300 text-xs font-semibold mb-6">

                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>

                    Frequently asked questions

                </div>

                <h2 class="text-4xl md:text-5xl font-black font-heading tracking-tight leading-tight mb-5">

                    Questions about
                    <br>
                    WEBN.

                </h2>

                <p class="text-zinc-400 text-lg max-w-2xl mx-auto leading-relaxed">

                    Everything you need to know about shortening links,
                    analytics, QR codes, and getting started.

                </p>

            </div>

            <!-- FAQ ITEMS -->

            <div class="space-y-5">

                <!-- FAQ -->

                <div
                    class="faq-item glass rounded-[1.75rem] border border-white/5 overflow-hidden transition-all duration-300 hover:border-indigo-500/20 hover:bg-white/[0.04]">

                    <button class="faq-btn w-full px-7 py-6 text-left flex items-center justify-between gap-6">

                        <div>

                            <h3 class="text-lg md:text-xl font-bold text-white mb-1">

                                Do I need an account to shorten links?

                            </h3>

                            <p class="text-sm text-zinc-500">

                                Start shortening instantly without signup

                            </p>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center shrink-0">

                            <i data-lucide="plus" class="faq-icon w-5 h-5 text-zinc-400 transition-all duration-300">
                            </i>

                        </div>

                    </button>

                    <div class="faq-content hidden px-7 pb-7 text-zinc-400 text-sm md:text-base leading-relaxed">

                        No. You can create and share short links instantly.
                        Create a free account later to save links and unlock
                        detailed analytics.

                    </div>

                </div>

                <!-- FAQ -->

                <div
                    class="faq-item glass rounded-[1.75rem] border border-white/5 overflow-hidden transition-all duration-300 hover:border-indigo-500/20 hover:bg-white/[0.04]">

                    <button class="faq-btn w-full px-7 py-6 text-left flex items-center justify-between gap-6">

                        <div>

                            <h3 class="text-lg md:text-xl font-bold text-white mb-1">

                                What analytics do you track?

                            </h3>

                            <p class="text-sm text-zinc-500">

                                Real-time insights for every click

                            </p>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center shrink-0">

                            <i data-lucide="plus" class="faq-icon w-5 h-5 text-zinc-400 transition-all duration-300">
                            </i>

                        </div>

                    </button>

                    <div class="faq-content hidden px-7 pb-7 text-zinc-400 text-sm md:text-base leading-relaxed">

                        Track clicks, devices, browsers, referrers, and visitor
                        locations in real time from your analytics dashboard.

                    </div>

                </div>

                <!-- FAQ -->

                <div
                    class="faq-item glass rounded-[1.75rem] border border-white/5 overflow-hidden transition-all duration-300 hover:border-indigo-500/20 hover:bg-white/[0.04]">

                    <button class="faq-btn w-full px-7 py-6 text-left flex items-center justify-between gap-6">

                        <div>

                            <h3 class="text-lg md:text-xl font-bold text-white mb-1">

                                Can I create custom aliases?

                            </h3>

                            <p class="text-sm text-zinc-500">

                                Create clean branded short links

                            </p>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center shrink-0">

                            <i data-lucide="plus" class="faq-icon w-5 h-5 text-zinc-400 transition-all duration-300">
                            </i>

                        </div>

                    </button>

                    <div class="faq-content hidden px-7 pb-7 text-zinc-400 text-sm md:text-base leading-relaxed">

                        Yes. You can create your own memorable aliases like
                        webn.in/summer-sale instead of random characters.

                    </div>

                </div>

                <!-- FAQ -->

                {{-- <div
                class="faq-item glass rounded-[1.75rem] border border-white/5 overflow-hidden transition-all duration-300 hover:border-indigo-500/20 hover:bg-white/[0.04]">

                <button
                    class="faq-btn w-full px-7 py-6 text-left flex items-center justify-between gap-6">

                    <div>

                        <h3
                            class="text-lg md:text-xl font-bold text-white mb-1">

                            Are QR codes included?

                        </h3>

                        <p
                            class="text-sm text-zinc-500">

                            Generate shareable QR codes instantly

                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center shrink-0">

                        <i
                            data-lucide="plus"
                            class="faq-icon w-5 h-5 text-zinc-400 transition-all duration-300">
                        </i>

                    </div>

                </button>

                <div
                    class="faq-content hidden px-7 pb-7 text-zinc-400 text-sm md:text-base leading-relaxed">

                    Yes. Every short link can also generate a QR code
                    for social media, print materials, restaurants,
                    packaging, and more.

                </div>

            </div> --}}

                <!-- FAQ -->

                {{-- <div
                class="faq-item glass rounded-[1.75rem] border border-white/5 overflow-hidden transition-all duration-300 hover:border-indigo-500/20 hover:bg-white/[0.04]">

                <button
                    class="faq-btn w-full px-7 py-6 text-left flex items-center justify-between gap-6">

                    <div>

                        <h3
                            class="text-lg md:text-xl font-bold text-white mb-1">

                            Is WEBN mobile friendly?

                        </h3>

                        <p
                            class="text-sm text-zinc-500">

                            Built for sharing across modern platforms

                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center shrink-0">

                        <i
                            data-lucide="plus"
                            class="faq-icon w-5 h-5 text-zinc-400 transition-all duration-300">
                        </i>

                    </div>

                </button>

                <div
                    class="faq-content hidden px-7 pb-7 text-zinc-400 text-sm md:text-base leading-relaxed">

                    Absolutely. WEBN is optimized for WhatsApp,
                    Instagram, mobile browsers, and fast redirects
                    across all devices.

                </div>

            </div> --}}

            </div>

        </div>

    </section>

    <div id="toast"
        class="fixed bottom-6 left-1/2 -translate-x-1/2 px-5 py-3 rounded-2xl glass border border-white/10 text-white text-sm font-medium opacity-0 pointer-events-none transition-all duration-500 z-50">

        Copied! Ready to share.

    </div>

    <!-- Final CTA -->
    <section class="pb-32 px-6">

        <div
            class="max-w-5xl mx-auto relative overflow-hidden rounded-[3rem] border border-white/10 bg-gradient-to-br from-indigo-600 via-indigo-500 to-violet-600 p-12 md:p-20 text-center shadow-[0_0_80px_rgba(99,102,241,0.25)]">

            <!-- BACKGROUND GLOW -->

            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.18),transparent_60%)]">
            </div>

            <div class="absolute -top-20 -left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl">
            </div>

            <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-violet-400/20 rounded-full blur-3xl">
            </div>

            <!-- CONTENT -->

            <div class="relative z-10">

                <!-- BADGE -->

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 text-white/90 text-xs font-semibold mb-8">

                    <span class="w-2 h-2 rounded-full bg-white"></span>

                    Start shortening in seconds

                </div>

                <!-- TITLE -->

                <h2 class="text-4xl md:text-6xl font-black font-heading text-white leading-[0.95] tracking-tight mb-6">

                    Your next link
                    <br>
                    deserves better analytics.

                </h2>

                <!-- SUBTEXT -->

                <p class="text-indigo-100/90 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto mb-10">

                    Create short links, track clicks in real time,
                    and share beautifully across every platform.

                </p>

                <!-- CTA -->

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

                    <a href="#"
                        class="h-14 px-10 inline-flex items-center justify-center rounded-2xl bg-white text-indigo-600 font-bold text-lg hover:scale-[1.03] active:scale-[0.98] transition-all shadow-[0_10px_40px_rgba(255,255,255,0.2)]">

                        Create Free Link

                    </a>

                    <a href="{{ route('register') }}"
                        class="h-14 px-10 inline-flex items-center justify-center rounded-2xl border border-white/15 bg-white/10 backdrop-blur text-white font-semibold text-lg hover:bg-white/15 transition-all">

                        Create Account

                    </a>

                </div>

                <!-- SMALL TRUST TEXT -->

                <p class="text-sm text-indigo-100/70 mt-6">

                    No credit card required · Instant setup · Mobile friendly

                </p>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer class="relative border-t border-white/5 py-16 px-6 overflow-hidden">

        <!-- BACKGROUND GLOW -->

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom,rgba(99,102,241,0.08),transparent_50%)]">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto">

            <!-- TOP -->

            <div class="grid grid-cols-1 md:grid-cols-4 gap-14 pb-14 border-b border-white/5">

                <!-- BRAND -->

                <div class="md:col-span-2">

                    <a href="#" class="inline-flex items-center gap-3 mb-6 group">

                        <div
                            class="w-11 h-11 rounded-2xl bg-gradient-to-br from-indigo-500 to-violet-500 flex items-center justify-center shadow-[0_0_30px_rgba(99,102,241,0.3)] group-hover:rotate-6 transition-transform duration-300">

                            <i data-lucide="link-2" class="w-5 h-5 text-white">
                            </i>

                        </div>

                        <span class="text-2xl font-black font-heading tracking-tight text-white">

                            WEBN

                        </span>

                    </a>

                    <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-md mb-8">

                        Create short links and track every click with Privacy-focused analytics and modern
                        infrastructure.
                    </p>

                    <!-- SOCIALS -->

                    <div class="flex items-center gap-4 mt-6">

                        <!-- GitHub -->
                        <a href="https://github.com/anirbancodes69" target="_blank"
                            class="text-zinc-500 hover:text-white transition-colors duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    d="M12 0C5.37 0 0 5.37 0 12a12 12 0 008.2 11.4c.6.1.8-.3.8-.6v-2.3c-3.3.7-4-1.4-4-1.4-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1 1.8-.7 2.2-1 .1-.7.4-1.2.7-1.5-2.7-.3-5.5-1.4-5.5-6A4.7 4.7 0 014 5.7a4.3 4.3 0 01.1-3.2s1-.3 3.3 1.2a11.3 11.3 0 016 0C15.9 2.2 17 2.5 17 2.5a4.3 4.3 0 01.1 3.2 4.7 4.7 0 011.2 3.3c0 4.6-2.8 5.6-5.5 6 .4.3.8 1 .8 2v3c0 .3.2.7.8.6A12 12 0 0024 12c0-6.63-5.37-12-12-12z" />
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://linkedin.com/in/anirban-bhowmick/" target="_blank"
                            class="text-zinc-500 hover:text-white transition-colors duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    d="M22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0zM7.12 20.45H3.56V9h3.56v11.45zM5.34 7.44a2.06 2.06 0 110-4.12 2.06 2.06 0 010 4.12zM20.45 20.45h-3.56v-5.57c0-1.33-.03-3.05-1.86-3.05-1.86 0-2.15 1.45-2.15 2.95v5.67H9.32V9h3.42v1.56h.05c.48-.9 1.63-1.86 3.36-1.86 3.6 0 4.27 2.37 4.27 5.45v6.3z" />
                            </svg>
                        </a>

                    </div>
                </div>

                <!-- PRODUCT -->

                <div>

                    <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6">

                        Product

                    </h4>

                    <ul class="space-y-4">

                        <li>

                            <a href="#hero-section" class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Link Shortening

                            </a>

                        </li>

                        {{-- <li>

                        <a
                            href="#features"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">

                            QR Codes

                        </a>

                    </li> --}}

                        <li>

                            <a href="#features" class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Real-time Analytics

                            </a>

                        </li>

                        <li>

                            <a href="{{ route('register') }}"
                                class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Create Account

                            </a>

                        </li>

                    </ul>

                </div>

                <!-- COMPANY -->

                <div>

                    <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6">

                        Company

                    </h4>

                    <ul class="space-y-4">

                        {{-- <li>

                        <a
                            href="{{ route('docs.index') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">

                            Documentation

                        </a>

                    </li> --}}

                        <li>

                            <a href="{{ route('privacy') }}"
                                class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Privacy Policy

                            </a>

                        </li>

                        <li>

                            <a href="{{ route('terms') }}"
                                class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Terms of Service

                            </a>

                        </li>

                        <li>

                            <a href="{{ route('login') }}"
                                class="text-zinc-500 hover:text-white transition-colors text-sm">

                                Log In

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

            <!-- BOTTOM -->

            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4">

                <p class="text-zinc-500 text-sm leading-relaxed max-w-sm">
                    Built independently by
                    <span class="text-zinc-300 font-medium">Anirban Bhowmick</span>.
                    WebN is focused on modern, lightweight link management and analytics.
                </p>

                <div class="flex items-center gap-3 text-xs text-zinc-600 uppercase tracking-[0.2em]">

                    <span>
                        SSL Secured
                    </span>

                    <span class="w-1 h-1 rounded-full bg-zinc-700"></span>

                    <span>
                        Hosted on AWS
                    </span>

                    <span class="w-1 h-1 rounded-full bg-zinc-700"></span>

                    <span>
                        Real-time analytics
                    </span>

                </div>

            </div>

        </div>

    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /*
            |--------------------------------------------------------------------------
            | Lucide Icons
            |--------------------------------------------------------------------------
            */

            lucide.createIcons();

            /*
            |--------------------------------------------------------------------------
            | CSRF Token
            |--------------------------------------------------------------------------
            */

            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');

            /*
            |--------------------------------------------------------------------------
            | Mobile Menu
            |--------------------------------------------------------------------------
            */

            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            function toggleMenu() {

                mobileMenu.classList.toggle('hidden');

                document.body.classList.toggle('overflow-hidden');
            }

            window.toggleMenu = toggleMenu;

            if (mobileMenuBtn) {

                mobileMenuBtn.addEventListener('click', toggleMenu);
            }

            /*
            |--------------------------------------------------------------------------
            | FAQ Toggle
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('.faq-btn').forEach(btn => {

                btn.addEventListener('click', () => {

                    const content = btn.nextElementSibling;

                    const icon = btn.querySelector('svg');

                    content.classList.toggle('hidden');

                    icon.classList.toggle('rotate-180');
                });
            });

            /*
            |--------------------------------------------------------------------------
            | Scroll Reveal
            |--------------------------------------------------------------------------
            */

            const observer = new IntersectionObserver((entries) => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('active');
                    }
                });

            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });

            /*
            |--------------------------------------------------------------------------
            | Device Chart
            |--------------------------------------------------------------------------
            */

            const deviceChartCanvas = document.getElementById('deviceChart');

            if (deviceChartCanvas) {

                const deviceCtx = deviceChartCanvas.getContext('2d');

                new Chart(deviceCtx, {

                    type: 'doughnut',

                    data: {
                        datasets: [{
                            data: [62, 31, 7],
                            backgroundColor: [
                                '#6366f1',
                                '#a855f7',
                                '#3f3f46'
                            ],
                            borderWidth: 0,
                            hoverOffset: 8
                        }]
                    },

                    options: {

                        cutout: '80%',

                        responsive: true,

                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            /*
            |--------------------------------------------------------------------------
            | Hero Elements
            |--------------------------------------------------------------------------
            */

            const urlInput = document.getElementById('urlInput');

            const aliasInput = document.getElementById('aliasInput');

            const createBtn = document.getElementById('createBtn');

            const btnText = document.getElementById('btnText');

            const formState = document.getElementById('formState');

            const successState = document.getElementById('successState');

            const analyticsPreview = document.getElementById('analyticsPreview');

            // const signupCTA = document.getElementById('signupCTA');

            const generatedLink = document.getElementById('generatedLink');

            const copyBtn = document.getElementById('copyBtn');

            const toast = document.getElementById('toast');

            /*
            |--------------------------------------------------------------------------
            | Initial Hidden State
            |--------------------------------------------------------------------------
            */

            successState.style.display = 'none';

            analyticsPreview.style.display = 'none';

            // signupCTA.style.display = 'none';

            /*
            |--------------------------------------------------------------------------
            | Toast Helper
            |--------------------------------------------------------------------------
            */

            function showToast(message = 'Done') {

                toast.innerText = message;

                toast.classList.remove(
                    'opacity-0',
                    'translate-y-4'
                );

                toast.classList.add(
                    'opacity-100'
                );

                setTimeout(() => {

                    toast.classList.add('opacity-0');

                }, 2500);
            }

            /*
            |--------------------------------------------------------------------------
            | URL Validation
            |--------------------------------------------------------------------------
            */

            function isValidUrl(url) {

                try {

                    new URL(url);

                    return true;

                } catch (_) {

                    return false;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Create Link
            |--------------------------------------------------------------------------
            */

            if (createBtn) {

                createBtn.addEventListener('click', async () => {

                    /*
                    |--------------------------------------------------------------------------
                    | Validate
                    |--------------------------------------------------------------------------
                    */

                    const originalUrl = urlInput.value.trim();

                    const alias = aliasInput.value.trim();

                    if (!originalUrl) {

                        showToast('Please enter a URL');

                        return;
                    }

                    if (!isValidUrl(originalUrl)) {

                        showToast('Please enter a valid URL');

                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Disable Button
                    |--------------------------------------------------------------------------
                    */

                    createBtn.disabled = true;

                    btnText.innerHTML = `
                <svg class="animate-spin h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">

                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4">
                    </circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v8H4z">
                    </path>

                </svg>

                Creating...
            `;

                    try {

                        /*
                        |--------------------------------------------------------------------------
                        | API Call
                        |--------------------------------------------------------------------------
                        */

                        const response = await fetch('/api/links', {

                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },

                            body: JSON.stringify({

                                original_url: originalUrl,

                                custom_alias: alias || null,
                            })
                        });

                        const data = await response.json();

                        /*
                        |--------------------------------------------------------------------------
                        | Error Handling
                        |--------------------------------------------------------------------------
                        */

                        if (!response.ok) {

                            if (data?.message) {

                                showToast(data.message);

                            } else {

                                showToast('Something went wrong');
                            }

                            createBtn.disabled = false;

                            btnText.innerHTML = `
                        <i data-lucide="zap"
                           class="w-5 h-5">
                        </i>

                        Create Short Link
                    `;

                            lucide.createIcons();

                            return;
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Generate URL
                        |--------------------------------------------------------------------------
                        */

                        generatedLink.innerText = data.short_url;

                        /*
                        |--------------------------------------------------------------------------
                        | Transition
                        |--------------------------------------------------------------------------
                        */

                        formState.style.transition = 'all 0.35s ease';

                        formState.style.opacity = '0';

                        formState.style.transform = 'translateY(-8px) scale(0.98)';

                        setTimeout(() => {

                            formState.style.display = 'none';

                            /*
                            |--------------------------------------------------------------------------
                            | Success State
                            |--------------------------------------------------------------------------
                            */

                            successState.style.display = 'block';

                            requestAnimationFrame(() => {

                                successState.classList.remove(
                                    'hidden',
                                    'opacity-0',
                                    'translate-y-6'
                                );

                                successState.style.opacity = '1';

                                successState.style.transform = 'translateY(0)';
                            });

                            /*
                            |--------------------------------------------------------------------------
                            | Auto Select Link
                            |--------------------------------------------------------------------------
                            */

                            window.getSelection()
                                .selectAllChildren(generatedLink);

                            lucide.createIcons();

                        }, 250);

                        /*
                        |--------------------------------------------------------------------------
                        | Analytics Reveal
                        |--------------------------------------------------------------------------
                        */

                        setTimeout(() => {

                            analyticsPreview.style.display = 'block';

                            requestAnimationFrame(() => {

                                analyticsPreview.classList.remove(
                                    'hidden',
                                    'opacity-0',
                                    'translate-y-6'
                                );

                                analyticsPreview.style.opacity = '1';

                                analyticsPreview.style.transform = 'translateY(0)';
                            });

                            lucide.createIcons();

                        }, 600);

                        /*
                        |--------------------------------------------------------------------------
                        | CTA Reveal
                        |--------------------------------------------------------------------------
                        */



                    } catch (error) {

                        console.error(error);

                        showToast('Network error');

                        createBtn.disabled = false;

                        btnText.innerHTML = `
                    <i data-lucide="zap"
                       class="w-5 h-5">
                    </i>

                    Create Short Link
                `;

                        lucide.createIcons();
                    }
                });
            }

            /*
            |--------------------------------------------------------------------------
            | Copy Button
            |--------------------------------------------------------------------------
            */

            if (copyBtn) {

                copyBtn.addEventListener('click', async () => {

                    try {

                        await navigator.clipboard.writeText(
                            generatedLink.innerText
                        );

                        /*
                        |--------------------------------------------------------------------------
                        | Button Feedback
                        |--------------------------------------------------------------------------
                        */

                        const originalText = copyBtn.innerHTML;

                        copyBtn.innerHTML = 'Copied ✓';

                        showToast('Link copied');

                        setTimeout(() => {

                            copyBtn.innerHTML = originalText;

                        }, 2000);

                    } catch (error) {

                        console.error(error);

                        showToast('Unable to copy');
                    }
                });
            }

        });
    </script>
</body>

</html>
