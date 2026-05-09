<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    @include('brand-meta', [
        'title' => 'WEBN — Terms & Conditions',
        'description' => 'Review the terms and conditions for using the DevByAnirban (WEBN) platform.',
    ])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #030303;
            color: #fafafa;
        }

        .glass {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.08);
        }
    </style>
</head>

<body class="min-h-screen">

    <!-- Navbar -->
    <nav class="border-b border-white/5 sticky top-0 bg-black/70 backdrop-blur-xl z-50">
        <div class="max-w-5xl mx-auto px-6 h-20 flex items-center justify-between">

            <a href="/" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <span class="font-bold text-white">L</span>
                </div>

                <span class="font-bold text-xl">
                    DevByAnirban (WEBN)
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

            <div class="inline-flex px-4 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 text-xs font-semibold mb-6">
                LEGAL
            </div>

            <h1 class="text-5xl md:text-6xl font-black tracking-tight mb-6">
                Terms & Conditions
            </h1>

            <p class="text-zinc-400 text-lg max-w-2xl leading-relaxed">
                These Terms govern your access to and use of the DevByAnirban (WEBN) platform.
            </p>

            <p class="text-sm text-zinc-500 mt-6">
                Last updated: May 2026
            </p>

        </div>
    </section>

    <!-- Content -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto space-y-10">

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    1. Acceptance of Terms
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    By using DevByAnirban (WEBN), you agree to comply with these Terms
                    and all applicable laws and regulations.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    2. Platform Usage
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    You may use DevByAnirban (WEBN) to create shortened links,
                    manage redirects, and access analytics features.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    3. Prohibited Activities
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    Users may not use DevByAnirban (WEBN) for phishing, malware distribution,
                    spam campaigns, illegal activities, deceptive practices,
                    or harmful content distribution.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    4. Account Responsibility
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    You are responsible for maintaining the security
                    of your account credentials and activities associated
                    with your account.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    5. Service Availability
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We aim to provide reliable uptime but do not guarantee
                    uninterrupted service availability at all times.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    6. Limitation of Liability
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    DevByAnirban (WEBN) shall not be liable for any indirect,
                    incidental, or consequential damages arising from
                    platform usage.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    7. Changes to Terms
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We may update these Terms periodically.
                    Continued usage of the platform indicates acceptance
                    of updated terms.
                </p>
            </div>

        </div>
    </section>

</body>
</html>