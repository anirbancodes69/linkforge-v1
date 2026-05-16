<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    @include('brand-meta', ['title' => '404 Not Found', 'description' => 'The page you are looking for cannot be found.'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
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
                    fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Plus Jakarta Sans', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>
        body { background-color: #09090b; color: #fafafa; overflow: hidden; }
        .glow { position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.15; z-index: -1; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.08); }
        @keyframes float { 0%, 100% { transform: translateY(0px) rotate(0deg); } 50% { transform: translateY(-20px) rotate(5deg); } }
        .animate-float { animation: float 6s ease-in-out infinite; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">
    <!-- Background Accents -->
    <div class="glow bg-accent w-96 h-96 -top-20 -left-20"></div>
    <div class="glow bg-purple-600 w-[500px] h-[500px] -bottom-20 -right-20"></div>

    <main class="max-w-2xl w-full text-center space-y-10 relative">
        <!-- 404 Visual -->
        <div class="relative inline-block">
            <div class="text-[12rem] font-extrabold font-heading leading-none opacity-5 select-none">404</div>
            <div class="absolute inset-0 flex items-center justify-center animate-float">
                <div class="glass p-6 rounded-3xl rotate-12 shadow-2xl">
                    <i data-lucide="link-2-off" class="w-16 h-16 text-accent"></i>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold font-heading tracking-tight">Lost in the link void.</h1>
            <p class="text-zinc-400 text-lg max-w-md mx-auto">The page you’re looking for doesn’t exist or has been moved to another dimension.</p>
        </div>

        <!-- Search & Actions -->
        <div class="space-y-6 max-w-sm mx-auto">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/" class="w-full sm:w-auto px-8 py-3 bg-white text-zinc-900 font-bold rounded-xl hover:bg-zinc-200 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="home" class="w-4 h-4"></i> Go Home
                </a>
            </div>
        </div>
    </main>

    <script>lucide.createIcons();</script>
</body>
</html>