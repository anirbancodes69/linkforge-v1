<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkForge | Short Links. Powerful Insights.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="#" class="flex items-center gap-2 group">
                    <div
                        class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center transition-transform group-hover:rotate-12">
                        <i data-lucide="link-2" class="text-white w-5 h-5"></i>
                    </div>
                    <span class="text-xl font-bold font-heading tracking-tight">LinkForge</span>
                </a>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-400">
                    <a href="#features" class="hover:text-white transition-colors">Features</a>
                    <a href="#pricing" class="hover:text-white transition-colors">Pricing</a>
                    <a href="{{ route('docs.index') }}" class="hover:text-white transition-colors">Docs</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}"
                    class="hidden sm:block text-sm font-medium hover:text-white transition-colors px-4">Log in</a>
                <a href="{{ route('register') }}"
                    class="bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-zinc-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)]">Get
                    Started</a>
                <button class="md:hidden text-zinc-400" id="mobile-menu-btn">
                    <i data-lucide="menu"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="fixed inset-0 z-40 bg-background hidden pt-24 px-6">
        <div class="flex flex-col gap-6 text-2xl font-bold">
            <a href="#features" onclick="toggleMenu()">Features</a>
            <a href="#pricing" onclick="toggleMenu()">Pricing</a>
            <a href="#" onclick="toggleMenu()">Docs</a>
            <hr class="border-white/10">
            <a href="{{ route('login') }}" class="text-indigo-400">Log In</a>
        </div>
    </div>

    <!-- ===================================================== --><!-- HERO SECTION (REPLACE YOUR CURRENT HERO SECTION) --><!-- ===================================================== -->
    <section class="relative min-h-screen pt-32 md:pt-40 pb-20 flex items-start md:items-center justify-center px-6 overflow-hidden">
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
                    link analytics </div> <!-- Heading -->
                <h1 class="text-5xl md:text-7xl font-black tracking-tight leading-[0.95] mb-6 max-w-5xl"> Shorten and
                    <span class="bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent"> track
                    </span> every link instantly. </h1> <!-- Subtext -->
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
                            <div class="flex items-center gap-2"> <i data-lucide="zap" class="w-4 h-4 text-indigo-400">
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
                                <i data-lucide="check" class="w-10 h-10 text-emerald-400"> </i> </div>
                        </div> <!-- TITLE -->
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 leading-tight"> Your short link is ready </h2> <!-- GENERATED URL -->
                        <div class="relative max-w-xl mx-auto mb-6">
                            <div class="absolute inset-0 bg-indigo-500/20 blur-2xl"></div>
                            <div
                                class="relative h-20 bg-gradient-to-r from-indigo-500/10 to-violet-500/10 border border-indigo-500/20 rounded-3xl flex items-center justify-center text-2xl md:text-3xl font-black tracking-tight">
                                <span id="generatedLink"
                                    class="bg-gradient-to-r from-indigo-300 to-violet-300 bg-clip-text text-transparent break-all text-center leading-tight">
                                    linkpe.io/summer24 </span> </div>
                        </div> <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-lg mx-auto"> <button id="copyBtn"
                                class="h-14 w-full sm:w-auto px-8 rounded-2xl bg-white text-black font-bold hover:bg-zinc-200 transition-all hover:scale-[1.02] active:scale-[0.98]">
                                Copy Link </button> <button
                                class="h-14 w-full sm:w-auto px-8 rounded-2xl glass border border-white/10 font-semibold hover:bg-white/5 transition-all">
                                Open Link </button> </div>
                        <!-- ===================================================== --> <!-- ANALYTICS PREVIEW -->
                        <!-- ===================================================== -->
                        <div id="analyticsPreview"
                            class="hidden opacity-0 translate-y-6 transition-all duration-700 mt-12">
                            <div class="flex items-center justify-center gap-2 mb-8"> <i data-lucide="bar-chart-3"
                                    class="w-5 h-5 text-indigo-400"> </i>
                                <h3 class="text-xl font-bold"> Track every interaction </h3>
                            </div> <!-- MINI CARDS -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div
                                    class="glass rounded-2xl p-5 border border-white/5 hover:border-indigo-500/20 transition-all hover:-translate-y-1">
                                    <p class="text-zinc-500 text-sm mb-3">Clicks</p>
                                    <h4 class="text-3xl font-black">0</h4>
                                </div>
                                <div
                                    class="glass rounded-2xl p-5 border border-white/5 hover:border-indigo-500/20 transition-all hover:-translate-y-1">
                                    <p class="text-zinc-500 text-sm mb-3">Devices</p>
                                    <h4 class="text-sm font-medium text-zinc-300"> Waiting for traffic... </h4>
                                </div>
                                <div
                                    class="glass rounded-2xl p-5 border border-white/5 hover:border-indigo-500/20 transition-all hover:-translate-y-1">
                                    <p class="text-zinc-500 text-sm mb-3">Locations</p>
                                    <h4 class="text-sm font-medium text-zinc-300"> No visits yet </h4>
                                </div>
                                <div
                                    class="glass rounded-2xl p-5 border border-white/5 hover:border-indigo-500/20 transition-all hover:-translate-y-1">
                                    <p class="text-zinc-500 text-sm mb-3">Browsers</p>
                                    <h4 class="text-sm font-medium text-zinc-300"> Ready to track </h4>
                                </div>
                            </div>
                        </div> <!-- ===================================================== --> <!-- ACCOUNT CTA -->
                        <!-- ===================================================== -->
                        <div id="signupCTA" class="hidden opacity-0 translate-y-6 transition-all duration-700 mt-10">
                            <div class="glass rounded-[2rem] border border-white/10 p-8 bg-white/[0.03]">
                                <h3 class="text-2xl font-bold mb-4"> Save this link and unlock analytics </h3>
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
                        </div>
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
    <section id="features" class="pb-32 px-6 max-w-7xl mx-auto">
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
                <p class="text-zinc-500 leading-relaxed">Connect your own custom domain to replace linkforge.app with your own branded short links.</p>
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
                <p class="text-zinc-400 text-lg mb-8">Stop guessing. LinkForge provides industry-leading attribution
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
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://linkforge.app&color=4f46e5" alt="QR Preview" class="w-48 h-48">
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
                <p class="text-zinc-300 mb-6 italic">"LinkForge's API is incredibly robust. We integrated it into our marketing stack in under an hour and haven't looked back."</p>
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
    <section class="pb-32 px-6 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold font-heading mb-12 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div class="glass rounded-2xl overflow-hidden">
                <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center group">
                    <span class="font-bold">Can I use my own custom domain?</span>
                    <i data-lucide="chevron-down" class="transition-transform group-active:rotate-180"></i>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-zinc-400 text-sm">
                    Yes, our Professional and Enterprise plans allow you to connect your own domains (e.g.,
                    links.yourbrand.com) to maintain brand consistency.
                </div>
            </div>
            <div class="glass rounded-2xl overflow-hidden">
                <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center group">
                    <span class="font-bold">Is there a limit on clicks?</span>
                    <i data-lucide="chevron-down" class="transition-transform"></i>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-zinc-400 text-sm">
                    We offer unlimited clicks on all paid plans. Our Hobby plan is limited to 1,000 tracked clicks per
                    month.
                </div>
            </div>
            <div class="glass rounded-2xl overflow-hidden">
                <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center group">
                    <span class="font-bold">Do you support API access?</span>
                    <i data-lucide="chevron-down" class="transition-transform"></i>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-zinc-400 text-sm">
                    Absolutely. We have a robust REST API that allows you to shorten links, create QR codes, and fetch
                    analytics data programmatically.
                </div>
            </div>
        </div>
    </section>

    <div id="toast"
        class="fixed bottom-6 left-1/2 -translate-x-1/2 px-5 py-3 rounded-2xl glass border border-white/10 text-white text-sm font-medium opacity-0 pointer-events-none transition-all duration-500 z-50">

        Copied! Ready to share.

    </div>

    <!-- Final CTA -->
    <section class="pb-32 px-6">
        <div class="max-w-5xl mx-auto p-12 md:p-24 rounded-[3rem] bg-indigo-600 relative overflow-hidden text-center">
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
            </div>
            <h2 class="text-4xl md:text-6xl font-extrabold font-heading text-white mb-6 relative z-10">Take control of
                your <br>links today.</h2>
            <p class="text-indigo-100 text-lg mb-12 max-w-xl mx-auto relative z-10">Join over 10,000+ teams using
                LinkForge to power their digital growth.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 relative z-10">
                <button
                    class="bg-white text-indigo-600 px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transition-transform">Get
                    Started for Free</button>
                <button
                    class="bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-indigo-800 transition-colors">Talk
                    to Sales</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 px-6 border-t border-white/5">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-5 gap-12 mb-20">
            <div class="col-span-2">
                <a href="#" class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="link-2" class="text-white w-4 h-4"></i>
                    </div>
                    <span class="text-xl font-bold font-heading tracking-tight">LinkForge</span>
                </a>
                <p class="text-zinc-500 text-sm max-w-xs mb-8 leading-relaxed">Making the web more accessible,
                    trackable, and brand-focused, one link at a time.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i
                            data-lucide="twitter" class="w-5 h-5"></i></a>
                    <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i
                            data-lucide="github" class="w-5 h-5"></i></a>
                    <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i
                            data-lucide="linkedin" class="w-5 h-5"></i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-6">Product</h4>
                <ul class="space-y-4 text-sm text-zinc-500">
                    <li><a href="#" class="hover:text-white transition-colors">Link Shortening</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">QR Codes</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Analytics</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Integrations</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6">Company</h4>
                <ul class="space-y-4 text-sm text-zinc-500">
                    <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                </ul>
            </div>
            {{-- <div class="col-span-2 md:col-span-1">
                <h4 class="font-bold mb-6">Newsletter</h4>
                <div class="relative">
                    <input type="email" placeholder="Email address" class="w-full bg-zinc-900 border border-white/5 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-indigo-500">
                    <button class="absolute right-2 top-2 bottom-2 bg-zinc-800 hover:bg-zinc-700 px-3 rounded-lg text-xs transition-colors">Join</button>
                </div>
            </div> --}}
        </div>
        <div
            class="max-w-7xl mx-auto pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-zinc-500 text-xs uppercase tracking-widest font-medium">
            <p>© 2026 LINKFORGE PLATFORM INC.</p>
            <p>DESIGNED IN SAN FRANCISCO.</p>
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
    | FAQ
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
    | Hero Flow
    |--------------------------------------------------------------------------
    */

    const createBtn = document.getElementById('createBtn');

    const btnText = document.getElementById('btnText');

    const formState = document.getElementById('formState');

    const successState = document.getElementById('successState');

    const analyticsPreview = document.getElementById('analyticsPreview');

    const signupCTA = document.getElementById('signupCTA');

    const generatedLink = document.getElementById('generatedLink');

    const toast = document.getElementById('toast');

    const aliasInput = document.getElementById('aliasInput');

    /*
    |--------------------------------------------------------------------------
    | Initial State Improvements
    |--------------------------------------------------------------------------
    */

    successState.style.display = 'none';

    analyticsPreview.style.display = 'none';

    signupCTA.style.display = 'none';

    /*
    |--------------------------------------------------------------------------
    | Create Link
    |--------------------------------------------------------------------------
    */

    if (createBtn) {

        createBtn.addEventListener('click', () => {

            createBtn.disabled = true;

            /*
            |--------------------------------------------------------------------------
            | Loading Button
            |--------------------------------------------------------------------------
            */

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

            /*
            |--------------------------------------------------------------------------
            | Fake Delay
            |--------------------------------------------------------------------------
            */

            setTimeout(() => {

                /*
                |--------------------------------------------------------------------------
                | Generate Alias
                |--------------------------------------------------------------------------
                */

                let alias = aliasInput.value.trim();

                if (!alias) {

                    alias = Math.random()
                        .toString(36)
                        .substring(2, 8);
                }

                generatedLink.innerText = `linkpe.io/${alias}`;

                /*
                |--------------------------------------------------------------------------
                | Smooth Morph Transition
                |--------------------------------------------------------------------------
                */

                formState.style.transition = 'all 0.35s ease';

                formState.style.opacity = '0';

                formState.style.transform = 'translateY(-8px) scale(0.98)';

                setTimeout(() => {

                    formState.style.display = 'none';

                    /*
                    |--------------------------------------------------------------------------
                    | Show Success State
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

                }, 700);

                /*
                |--------------------------------------------------------------------------
                | CTA Reveal
                |--------------------------------------------------------------------------
                */

                setTimeout(() => {

                    signupCTA.style.display = 'block';

                    requestAnimationFrame(() => {

                        signupCTA.classList.remove(
                            'hidden',
                            'opacity-0',
                            'translate-y-6'
                        );

                        signupCTA.style.opacity = '1';

                        signupCTA.style.transform = 'translateY(0)';
                    });

                    lucide.createIcons();

                }, 1200);

            }, 1100);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Copy Button
    |--------------------------------------------------------------------------
    */

    const copyBtn = document.getElementById('copyBtn');

    if (copyBtn) {

        copyBtn.addEventListener('click', async () => {

            try {

                await navigator.clipboard.writeText(
                    generatedLink.innerText
                );

                toast.classList.remove(
                    'opacity-0',
                    'translate-y-4'
                );

                toast.classList.add(
                    'opacity-100'
                );

                setTimeout(() => {

                    toast.classList.add('opacity-0');

                }, 2200);

            } catch (e) {

                console.error(e);
            }
        });
    }

});

</script>
</body>

</html>
