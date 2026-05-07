 <header class="h-16 border-b border-border bg-background/60 backdrop-blur-xl sticky top-0 z-30 flex items-center justify-between px-4 md:px-8">
                <div class="flex items-center gap-4">
                    <button type="button" id="mobile-toggle" class="md:hidden p-2 text-zinc-400 hover:text-white hover:bg-white/10 rounded-lg transition-all">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <div class="hidden sm:flex items-center gap-3 bg-white/5 border border-border px-3 py-1.5 rounded-xl w-64 md:w-96 group focus-within:border-accent transition-all">
                        <i data-lucide="search" class="w-4 h-4 text-zinc-500"></i>
                        <input type="text" placeholder="Search links or campaigns..." class="bg-transparent border-none outline-none text-sm w-full text-zinc-200">
                        <kbd class="hidden md:block px-1.5 py-0.5 rounded border border-border text-[10px] text-zinc-500 font-sans">⌘K</kbd>
                    </div>
                </div>

                <div class="flex items-center gap-3 md:gap-5">
                    {{-- <button class="relative p-2 text-zinc-400 hover:text-white hover:bg-white/5 rounded-full transition-all">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-accent rounded-full border-2 border-background"></span>
                    </button> --}}
                    {{-- <button onclick="openModal('createModal')" class="hidden sm:flex items-center gap-2 bg-accent hover:bg-accent/90 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-all shadow-lg shadow-accent/20">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>Create New</span>
                    </button> --}}
                    <div class="h-8 w-px bg-border"></div>
                    <div class="flex items-center gap-3 pl-2 cursor-pointer group">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-accent to-purple-500 flex items-center justify-center border border-white/20">
                            <span class="text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </span>
                        </div>
                        {{-- <i data-lucide="chevron-down" class="w-4 h-4 text-zinc-500 group-hover:text-white transition-colors"></i> --}}
                    </div>
                </div>
            </header>