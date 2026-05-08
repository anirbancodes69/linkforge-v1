<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | DBA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        background: "#09090b",
                        accent: "#6366f1",
                        surface: "#121217",
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
            -webkit-font-smoothing: antialiased;
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glow {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(60px);
            z-index: -1;
        }

        .auth-animate {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="overflow-hidden h-screen flex">

    <!-- Glowing Background Effects -->
    <div class="glow top-[-10%] left-[-5%]"></div>
    <div class="glow bottom-[-10%] right-[-5%] bg-purple-500/10"></div>

    <div class="flex flex-1 min-h-full">

        <!-- Left: Auth Form -->
        <div class="flex-1 flex flex-col justify-center px-8 md:px-12 lg:px-24 xl:px-32 z-10">
            <div class="max-w-md w-full mx-auto auth-animate">
                <!-- Logo -->
                <div class="flex items-center gap-2 mb-10">
                    <div
                        class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center shadow-lg shadow-accent/25">
                        <i data-lucide="link-2" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-bold font-heading tracking-tight">DBA</span>
                </div>

                <a href="{{ route('index') }}"
                    class="inline-flex items-center gap-2 mb-8 text-sm text-zinc-400 hover:text-white transition-colors group">

                    <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform">
                    </i>

                    <span>
                        Back to homepage
                    </span>

                </a>
                <h1 class="text-3xl font-bold mb-2">Welcome back</h1>
                <p class="text-zinc-500 mb-8 text-sm">Enter your credentials to access your dashboard.</p>

                <form id="loginForm" class="space-y-5">
                    <div>
                        <label
                            class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">Email
                            Address</label>
                        <input type="email" id="email" required placeholder="name@company.com"
                            class="w-full bg-white/5 border border-border rounded-2xl px-5 py-4 text-sm focus:outline-none focus:border-accent transition-all placeholder:text-zinc-600">
                    </div>
                    <div class="relative">

                        <div class="flex justify-between items-center mb-2">

                            <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">
                                Password
                            </label>

                            {{-- <a href="#" class="text-[10px] font-bold text-accent hover:text-accent/80 uppercase">
            Forgot?
        </a> --}}
                        </div>

                        <input type="password" id="password" required placeholder="••••••••"
                            class="w-full bg-white/5 border border-border rounded-2xl px-5 pr-14 py-4 text-sm focus:outline-none focus:border-accent transition-all placeholder:text-zinc-600">

                        <button type="button" onclick="togglePassword()"
                            class="absolute right-5 bottom-4 text-zinc-500 hover:text-zinc-300 transition-colors">

                            <i id="passwordEye" data-lucide="eye" class="w-5 h-5">
                            </i>

                        </button>

                    </div>

                    {{-- <div class="flex items-center gap-3 py-2">
                        <input type="checkbox" id="remember" class="w-4 h-4 rounded border-border bg-white/5 text-accent focus:ring-accent accent-accent">
                        <label for="remember" class="text-xs text-zinc-400 select-none cursor-pointer">Remember this device for 30 days</label>
                    </div> --}}

                    <button type="submit" id="submitBtn"
                        class="w-full py-4 bg-accent hover:bg-accent/90 text-white font-bold rounded-2xl shadow-lg shadow-accent/20 transition-all flex items-center justify-center gap-2 group">
                        <span>Sign In</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
                {{-- 
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-border"></div></div>
                    <div class="relative flex justify-center text-[10px] uppercase font-bold"><span class="bg-background px-4 text-zinc-500 tracking-widest">Or continue with</span></div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 py-3 glass rounded-xl hover:bg-white/10 transition-all text-xs font-semibold">
                        <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/><path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                        Google
                    </button>
                    <button class="flex items-center justify-center gap-2 py-3 glass rounded-xl hover:bg-white/10 transition-all text-xs font-semibold">
                        <i data-lucide="github" class="w-4 h-4"></i>
                        GitHub
                    </button>
                </div> --}}

                <p class="text-center mt-10 text-xs text-zinc-500">
                    Don't have an account? <a href="{{ route('register') }}"
                        class="text-accent font-bold hover:underline">Create account</a>
                </p>
            </div>
        </div>

        <!-- Right: Visual Panel -->
        <div class="hidden lg:flex flex-1 relative items-center justify-center overflow-hidden bg-surface">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_#312e81,_transparent_60%)] opacity-30">
            </div>

            <div class="relative z-10 w-full max-w-lg p-8">
                <!-- Mockup Elements -->
                <div class="space-y-6">
                    <div
                        class="glass p-6 rounded-[2rem] shadow-2xl rotate-[-2deg] hover:rotate-0 transition-transform duration-500">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-sm font-bold">Clicks Distribution</h3>
                            <div class="flex gap-1">
                                <div class="w-2 h-2 rounded-full bg-rose-500"></div>
                                <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            </div>
                        </div>
                        <div class="flex items-end gap-2 h-32">
                            <div class="flex-1 bg-accent/20 rounded-t-lg h-[60%]"></div>
                            <div class="flex-1 bg-accent/40 rounded-t-lg h-[40%]"></div>
                            <div class="flex-1 bg-accent rounded-t-lg h-[90%]"></div>
                            <div class="flex-1 bg-accent/60 rounded-t-lg h-[70%]"></div>
                            <div class="flex-1 bg-accent/30 rounded-t-lg h-[50%]"></div>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div
                            class="glass flex-1 p-6 rounded-[2rem] shadow-2xl translate-x-12 hover:translate-x-0 transition-transform duration-500">
                            <i data-lucide="qr-code" class="w-8 h-8 text-purple-400 mb-4"></i>
                            <div class="h-2 w-2/3 bg-white/10 rounded-full mb-2"></div>
                            <div class="h-2 w-1/2 bg-white/5 rounded-full"></div>
                        </div>
                        <div class="glass flex-1 p-6 rounded-[2rem] shadow-2xl bg-accent/10 border-accent/20">
                            <div class="text-2xl font-bold">14.2k</div>
                            <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Global Reach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/api.js') }}"></script>

    <script>
        lucide.createIcons();

        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
        document.addEventListener('DOMContentLoaded', () => {

            const form = document.getElementById('loginForm');

            if (!form) return;

            form.addEventListener('submit', async (e) => {

                e.preventDefault();

                const email = document.getElementById('email').value;

                const password = document.getElementById('password').value;

                try {

                    await initCsrf();

                    const response = await api('/login', {
                        method: 'POST',
                        body: JSON.stringify({
                            email,
                            password
                        })
                    });

                    if (response.success) {

                        window.location.href = response.redirect || '/dashboard';

                    } else {

                        alert(response.message || 'Login failed');
                    }

                } catch (error) {

                    console.error(error);

                    alert('Something went wrong');
                }
            });

        });
    </script>
</body>

</html>
