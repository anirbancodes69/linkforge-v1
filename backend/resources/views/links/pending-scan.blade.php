<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    @include('brand-meta', [
        'title' => 'WEBN — Processing Your Link',
        'description' =>
            'Your link is being processed and scanned for security. Please wait while we verify your destination.',
    ])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBN — Processing Your Link</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        background: "#09090b",
                        accent: "#6366f1",
                        surface: "rgba(24, 24, 27, 0.6)",
                        border: "rgba(255, 255, 255, 0.08)",
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif']
                    },
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #09090b;
            color: #fafafa;
            /* Changed to allow vertical scroll on very small screens or landscape mobile */
            overflow-x: hidden;
            overflow-y: auto;
        }

        .glow {
            position: fixed;
            /* Fixed so they stay in place during scroll */
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            z-index: -1;
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        @keyframes loader {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            100% {
                width: 100%;
            }
        }

        .progress-fill {
            animation: loader 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">
    <!-- Background Accents - Adjusted sizes for mobile -->
    <div class="glow bg-accent w-64 h-64 sm:w-96 sm:h-96 -top-10 -left-10"></div>
    <div class="glow bg-purple-600 w-80 h-80 sm:w-[500px] sm:h-[500px] -bottom-20 -right-20"></div>

    <main class="max-w-2xl w-full text-center space-y-10 relative">
        <div class="space-y-6 text-center">

            <!-- Icon Container -->
            <div class="glass p-5 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] inline-flex">
                <i data-lucide="refresh-cw" class="w-10 h-10 sm:w-12 sm:h-12 text-accent animate-spin"></i>
            </div>

            <div class="space-y-4">
                <!-- Responsive text sizes -->
                <h1 class="text-3xl sm:text-4xl font-bold font-heading tracking-tight px-2">
                    Destination verification pending
                </h1>

                <p class="text-zinc-400 text-sm sm:text-base max-w-md mx-auto leading-relaxed px-4">
                    This link is currently being reviewed for security and safety.
                    Please refresh this page or try again shortly.
                </p>
            </div>

            <!-- Enhanced Button Touch Target for mobile -->
            <button onclick="location.reload()"
                class="mt-4 px-10 py-3 sm:py-4 bg-white text-zinc-900 font-bold rounded-xl hover:bg-zinc-200 active:scale-95 transition-all shadow-xl shadow-white/5">
                Refresh Status
            </button>

        </div>

        <!-- Security Badge -->
        <div
            class="pt-8 sm:pt-12 flex items-center justify-center gap-2 text-zinc-500 text-[10px] sm:text-xs font-medium uppercase tracking-widest">
            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
            WebN Safe-Redirect Active
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>
