<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | DevByAnirban (DBA)</title>

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
                    DevByAnirban (DBA)
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
                Privacy Policy
            </h1>

            <p class="text-zinc-400 text-lg max-w-2xl leading-relaxed">
                Your privacy matters to us. This policy explains how DevByAnirban (DBA) collects,
                uses, and protects your information when using our platform.
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
                    1. Information We Collect
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We may collect account information such as your name,
                    email address, and login credentials. We also collect
                    analytics-related information including click events,
                    device type, browser information, referrer data,
                    and approximate geographic location.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    2. How We Use Information
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We use collected data to provide link shortening services,
                    analytics dashboards, fraud prevention, abuse detection,
                    platform security, and product improvements.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    3. Analytics Tracking
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    DevByAnirban (DBA) tracks link visits to provide analytics insights.
                    This may include browser type, operating system, device category,
                    referral source, and timestamps.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    4. Data Security
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We implement reasonable security measures to protect user data.
                    However, no online platform can guarantee absolute security.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    5. Third-Party Services
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    We may use third-party infrastructure and analytics tools
                    for hosting, monitoring, and platform operations.
                </p>
            </div>

            <div class="glass rounded-3xl p-8">
                <h2 class="text-2xl font-bold mb-4">
                    6. Contact
                </h2>

                <p class="text-zinc-400 leading-relaxed">
                    If you have any questions regarding this Privacy Policy,
                    please contact us through our official support channels.
                </p>
            </div>

        </div>
    </section>

</body>
</html>