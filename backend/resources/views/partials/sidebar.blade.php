<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-surface border-r border-border transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0 md:static md:inset-0">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-border">
                    <div class="flex items-center gap-2 group cursor-pointer">
                        <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center transition-transform group-hover:rotate-12">
                            <i data-lucide="link-2" class="text-white w-5 h-5"></i>
                        </div>
                        <span class="text-xl font-bold font-heading tracking-tight">WEBN</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto custom-scrollbar">
                    <p class="px-3 text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2">Main Menu</p>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-accent text-white' : 'text-zinc-400 hover:text-white hover:bg-white/5' }} group transition-all">
                        <i data-lucide="layout-grid" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('links.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('links.index') ? 'bg-accent text-white' : 'text-zinc-400 hover:text-white hover:bg-white/5' }} group transition-all">
                        <i data-lucide="link" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Links</span>
                    </a>
                    {{-- <a href="{{ route('analytics.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-zinc-400 hover:text-white hover:bg-white/5 group transition-all">
                        <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Analytics</span>
                    </a>
                    <a href="{{ route('qr.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-zinc-400 hover:text-white hover:bg-white/5 group transition-all">
                        <i data-lucide="qr-code" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">QR Codes</span>
                    </a> --}}
                    
                    {{-- <p class="px-3 text-[10px] font-bold text-zinc-500 uppercase tracking-widest mt-8 mb-2">Management</p>
                    <a href="{{ route('pricing') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-zinc-400 hover:text-white hover:bg-white/5 group transition-all">
                        <i data-lucide="credit-card" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Pricing</span>
                    </a>
                    <a href="{{ route('docs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-zinc-400 hover:text-white hover:bg-white/5 group transition-all">
                        <i data-lucide="terminal" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">API Docs</span>
                    </a>
                    <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-zinc-400 hover:text-white hover:bg-white/5 group transition-all">
                        <i data-lucide="settings" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Settings</span>
                    </a> --}}
                </nav>

                <!-- Footer -->
                <div class="p-4 border-t border-border">
                    <button     onclick="logout()"
 class="flex items-center gap-3 w-full px-3 py-2 rounded-lg text-zinc-400 hover:text-red-400 hover:bg-red-400/10 transition-all">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span class="text-sm font-medium">Logout</span>
                    </button>

                </div>
            </div>
        </aside>