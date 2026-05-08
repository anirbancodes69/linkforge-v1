<header class="h-16 border-b border-border bg-background/60 backdrop-blur-xl sticky top-0 z-30 flex items-center justify-between px-4 md:px-8">

    <!-- LEFT -->
    <div class="flex items-center gap-4">

        <!-- MOBILE MENU -->
        <button
            id="mobile-toggle"
            class="md:hidden flex items-center justify-center w-10 h-10 rounded-xl hover:bg-white/5 transition-all"
        >
            <i
                data-lucide="menu"
                class="w-6 h-6 text-white"
            ></i>
        </button>

        <!-- SEARCH -->
        <div class="hidden sm:flex items-center gap-3 bg-white/5 border border-border px-3 py-2 rounded-xl w-64 md:w-96 group focus-within:border-accent transition-all">

            <i
                data-lucide="search"
                class="w-4 h-4 text-zinc-500"
            ></i>

            <input
                type="text"
                placeholder="Search links..."
                class="bg-transparent border-none outline-none text-sm w-full text-zinc-200 placeholder:text-zinc-500"
            >

        </div>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-3 md:gap-5">

        <!-- CREATE BUTTON -->
        {{-- <button
            onclick="openCreateModal()"
            class="hidden sm:flex items-center gap-2 bg-accent hover:bg-accent/90 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-all shadow-lg shadow-accent/20"
        >

            <i
                data-lucide="plus"
                class="w-4 h-4"
            ></i>

            <span>Create New</span>

        </button> --}}

        <!-- DIVIDER -->
        <div class="h-8 w-px bg-border"></div>

        <!-- USER -->
        <div class="flex items-center gap-3 pl-2">

            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-accent to-purple-500 flex items-center justify-center border border-white/20 shadow-lg">

                <span class="text-xs font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </span>

            </div>

        </div>

    </div>

</header>