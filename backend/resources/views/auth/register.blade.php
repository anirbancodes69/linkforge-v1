<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register | DBA</title>
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
                        border: "rgba(255, 255, 255, 0.08)",
                        surface: "#121217",
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
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
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

    <div class="glow top-[-10%] right-[-5%]"></div>

    <div class="flex flex-1 min-h-full">

        <!-- Left: Visual Content -->
        <div
            class="hidden lg:flex flex-1 relative items-center justify-center overflow-hidden bg-background border-r border-border">
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-5">
            </div>
            <div class="relative z-10 w-full max-w-lg space-y-12 text-center">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold font-heading">ADB links that <span
                            class="text-accent italic">convert.</span></h2>
                    <p class="text-zinc-500 px-12">Join 5,000+ creators and businesses scaling their brand with
                        advanced link management.</p>
                </div>

                <div class="relative h-64">
                    <div class="glass p-6 rounded-3xl absolute top-0 left-1/4 w-64 shadow-2xl -rotate-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-500 flex items-center justify-center">
                                <i data-lucide="bar-chart" class="w-4 h-4"></i>
                            </div>
                            <span class="text-xs font-bold">Live Conversion</span>
                        </div>
                        <div class="text-2xl font-bold">24.8%</div>
                    </div>
                    <div
                        class="glass p-6 rounded-3xl absolute bottom-0 right-1/4 w-64 shadow-2xl rotate-3 bg-accent/5 border-accent/20">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center"><i
                                    data-lucide="link" class="w-4 h-4"></i></div>
                            <span class="text-xs font-bold">New Custom Alias</span>
                        </div>
                        <div class="text-xs text-zinc-400 truncate">devbyanirban.com/summer-sale</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Registration Form -->
        <div class="flex-1 flex flex-col justify-center px-8 md:px-12 lg:px-24 xl:px-32 bg-surface">
            <div class="max-w-md w-full mx-auto auth-animate">
                <div class="flex items-center gap-2 mb-8">
                    <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center">
                        <i data-lucide="link-2" class="text-white w-5 h-5"></i>
                    </div>
                    <span class="text-xl font-bold font-heading">DBA</span>
                </div>


                <a href="/"
                    class="inline-flex items-center gap-2 mb-8 text-sm text-zinc-400 hover:text-white transition-colors group">

                    <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform">
                    </i>

                    <span>
                        Back to homepage
                    </span>

                </a>

                <h1 class="text-2xl font-bold mb-1">Create your account</h1>
                <p class="text-zinc-500 mb-8 text-sm">Start tracking your links in no time. No credit card required.</p>

                <form id="registerForm" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">Full
                                Name</label>
                            <input type="text" id="name" required placeholder="John Doe"
                                class="w-full bg-white/5 border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent transition-all placeholder:text-zinc-600">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">Email</label>
                            <input type="email" id="email" placeholder="john@work.com"
                                class="w-full bg-white/5 border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent transition-all placeholder:text-zinc-600">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                            Password
                        </label>

                        <div class="relative">

                            <input type="password" id="password" required placeholder="Min. 8 characters"
                                oninput="checkStrength()"
                                class="w-full bg-white/5 border border-border rounded-xl px-4 pr-12 py-3 text-sm focus:outline-none focus:border-accent transition-all placeholder:text-zinc-600">

                            <button type="button" id="togglePassword"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-white transition-colors">

                                <i data-lucide="eye" id="passwordEye" class="w-4 h-4">
                                </i>

                            </button>

                        </div>

                        <!-- Strength Meter -->
                        <div class="mt-3 flex gap-1 h-1">
                            <div id="bar1" class="flex-1 rounded-full bg-zinc-800 transition-colors"></div>
                            <div id="bar2" class="flex-1 rounded-full bg-zinc-800 transition-colors"></div>
                            <div id="bar3" class="flex-1 rounded-full bg-zinc-800 transition-colors"></div>
                        </div>
                    </div>

                    {{-- <div class="flex items-start gap-3 py-2">
                        <input type="checkbox" required id="terms" class="mt-1 w-4 h-4 rounded border-border bg-white/5 text-accent focus:ring-accent accent-accent">
                        <label for="terms" class="text-[11px] text-zinc-500 leading-relaxed">
                            I agree to the <a href="#" class="text-zinc-300 underline underline-offset-4">Terms of Service</a> and <a href="#" class="text-zinc-300 underline underline-offset-4">Privacy Policy</a>.
                        </label>
                    </div> --}}

                    <button type="submit" id="regBtn"
                        class="w-full py-4 bg-accent hover:bg-accent/90 text-white font-bold rounded-2xl shadow-lg shadow-accent/20 transition-all">
                        Create Account
                    </button>
                </form>

                {{-- <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-border"></div></div>
                    <div class="relative flex justify-center text-[10px] uppercase font-bold"><span class="bg-surface px-4 text-zinc-500 tracking-widest">Or signup with</span></div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 py-3 glass rounded-xl hover:bg-white/10 transition-all text-xs font-semibold">
                        <i data-lucide="github" class="w-4 h-4"></i> GitHub
                    </button>
                    <button class="flex items-center justify-center gap-2 py-3 glass rounded-xl hover:bg-white/10 transition-all text-xs font-semibold">
                        <i data-lucide="twitter" class="w-4 h-4"></i> Twitter
                    </button>
                </div> --}}

                <p class="text-center mt-8 text-xs text-zinc-500">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-accent font-bold hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/api.js') }}"></script>

    <script>
        lucide.createIcons();

        function checkStrength() {
            const val = document.getElementById('password').value;
            const b1 = document.getElementById('bar1');
            const b2 = document.getElementById('bar2');
            const b3 = document.getElementById('bar3');

            [b1, b2, b3].forEach(b => b.className = "flex-1 rounded-full bg-zinc-800");

            if (val.length > 0) b1.classList.add('bg-rose-500');
            if (val.length > 5) b2.classList.add('bg-amber-500');
            if (val.length > 10) b3.classList.add('bg-emerald-500');
        }

        /*
    |--------------------------------------------------------------------------
    | Password Toggle
    |--------------------------------------------------------------------------
    */

        const togglePasswordBtn = document.getElementById('togglePassword');

        const passwordInput = document.getElementById('password');

        // const passwordEye = document.getElementById('passwordEye');

        if (togglePasswordBtn) {

            togglePasswordBtn.addEventListener('click', () => {

                const isPassword =
                    passwordInput.getAttribute('type') === 'password';

                passwordInput.setAttribute(
                    'type',
                    isPassword ? 'text' : 'password'
                );

                // passwordEye.setAttribute(
                //     'data-lucide',
                //     isPassword ? 'eye-off' : 'eye'
                // );

                lucide.createIcons();
            });
        }
        document.addEventListener('DOMContentLoaded', () => {

            const form = document.getElementById('registerForm');

            if (!form) return;

            form.addEventListener('submit', async (e) => {

                e.preventDefault();

                const name = document.getElementById('name').value;

                const email = document.getElementById('email').value;

                const password = document.getElementById('password').value;

                try {

                    await initCsrf();

                    const response = await api('/register', {
                        method: 'POST',
                        body: JSON.stringify({
                            name,
                            email,
                            password
                        })
                    });

                    if (response.success) {

                        window.location.href = response.redirect || '/dashboard';

                    } else {

                        alert(response.message || 'Registration failed');
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
