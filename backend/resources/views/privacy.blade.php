<!DOCTYPE html>
<html lang="en" class="dark">

<head>

    @include('brand-meta', [
        'title' => 'WEBN — Privacy Policy',
        'description' => 'Learn how WEBN collects, uses, and protects your data.',
    ])

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #030303;
            color: #fafafa;
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>

</head>

<body class="min-h-screen">

    @php

        $sections = [

            [
                'title' => '1. Information We Collect',
                'content' => 'We may collect account information such as your name, email address, login credentials, click events, browser details, device type, referrer data, and approximate geographic location.',
            ],

            [
                'title' => '2. How We Use Information',
                'content' => 'Collected data is used for link shortening, analytics, fraud prevention, abuse detection, platform security, and product improvements.',
            ],

            [
                'title' => '3. Analytics Tracking',
                'content' => 'WEBN tracks link visits to provide analytics insights including browser type, operating system, referral source, timestamps, and device category.',
            ],

            [
                'title' => '4. Data Security',
                'content' => 'We implement reasonable safeguards to protect user data, though no online platform can guarantee absolute security.',
            ],

            [
                'title' => '5. Third-Party Services',
                'content' => 'We may use third-party infrastructure and monitoring providers for hosting, analytics, and operational support.',
            ],

            [
                'title' => '6. Contact',
                'content' => 'For questions regarding this Privacy Policy, contact us through our official support channels.',
            ],
        ];

    @endphp

    <!-- Navbar -->

    <nav class="sticky top-0 z-50 border-b border-white/5 bg-black/70 backdrop-blur-xl">

        <div class="max-w-5xl mx-auto px-6 h-20 flex items-center justify-between">

            <a href="{{ route('index') }}" class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center">

                    <span class="font-bold text-white">
                        W
                    </span>

                </div>

                <span class="text-xl font-bold">
                    WEBN
                </span>

            </a>

            <a href="{{ route('index') }}"
               class="text-sm text-zinc-400 hover:text-white transition-colors">

                Back to Home

            </a>

        </div>

    </nav>

    <!-- Hero -->

    <section class="py-20 px-6 border-b border-white/5">

        <div class="max-w-5xl mx-auto">

            <div class="inline-flex px-4 py-2 mb-6 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 text-xs font-semibold">
                LEGAL
            </div>

            <h1 class="text-5xl md:text-6xl font-black tracking-tight mb-6">
                Privacy Policy
            </h1>

            <p class="max-w-2xl text-lg leading-relaxed text-zinc-400">

                This policy explains how WEBN collects, uses,
                and protects your information.

            </p>

            <p class="mt-6 text-sm text-zinc-500">
                Last updated: May 2026
            </p>

        </div>

    </section>

    <!-- Content -->

    <section class="py-20 px-6">

        <div class="max-w-4xl mx-auto space-y-8">

            @foreach ($sections as $section)

                <div class="glass rounded-3xl p-8">

                    <h2 class="text-2xl font-bold mb-4">
                        {{ $section['title'] }}
                    </h2>

                    <p class="leading-relaxed text-zinc-400">
                        {{ $section['content'] }}
                    </p>

                </div>

            @endforeach

        </div>

    </section>

</body>
</html>