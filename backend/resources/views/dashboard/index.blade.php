@extends('layouts.app')

@section('content')

 <!-- Welcome Section -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold font-heading">Welcome back, {{ Auth::user()->name }} 👋</h1>
                        {{-- <p class="text-zinc-500 text-sm mt-1">Your links have performed <span class="text-emerald-400 font-medium">+12% better</span> today.</p> --}}
                    </div>
                    {{-- <div class="flex items-center gap-2 bg-white/5 p-1 rounded-xl border border-border">
                        <button class="px-4 py-1.5 text-xs font-medium bg-white/10 rounded-lg shadow-sm">24h</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-zinc-500 hover:text-white transition-colors">7d</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-zinc-500 hover:text-white transition-colors">30d</button>
                    </div> --}}
                </div>

                {{-- <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
                    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-accent/10 rounded-lg text-accent">
                                <i data-lucide="link" class="w-5 h-5"></i>
                            </div>
                            <span class="text-xs font-medium text-emerald-400 flex items-center">
                                <i data-lucide="arrow-up-right" class="w-3 h-3 mr-1"></i> 8%
                            </span>
                        </div>
                        <p class="text-zinc-500 text-sm font-medium">Total Links</p>
                        <h3 class="text-2xl font-bold mt-1">1,284</h3>
                    </div>
                    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400">
                                <i data-lucide="mouse-pointer-2" class="w-5 h-5"></i>
                            </div>
                            <span class="text-xs font-medium text-emerald-400 flex items-center">
                                <i data-lucide="arrow-up-right" class="w-3 h-3 mr-1"></i> 14%
                            </span>
                        </div>
                        <p class="text-zinc-500 text-sm font-medium">Total Clicks</p>
                        <h3 class="text-2xl font-bold mt-1">48.2k</h3>
                    </div>
                    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-blue-500/10 rounded-lg text-blue-400">
                                <i data-lucide="scan" class="w-5 h-5"></i>
                            </div>
                            <span class="text-xs font-medium text-rose-400 flex items-center">
                                <i data-lucide="arrow-down-right" class="w-3 h-3 mr-1"></i> 2%
                            </span>
                        </div>
                        <p class="text-zinc-500 text-sm font-medium">QR Scans</p>
                        <h3 class="text-2xl font-bold mt-1">3,491</h3>
                    </div>
                    <div class="glass p-6 rounded-2xl group hover:border-accent/40 transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-amber-500/10 rounded-lg text-amber-400">
                                <i data-lucide="layers" class="w-5 h-5"></i>
                            </div>
                            <span class="text-xs font-medium text-emerald-400 flex items-center">
                                <i data-lucide="plus" class="w-3 h-3 mr-1"></i> 4
                            </span>
                        </div>
                        <p class="text-zinc-500 text-sm font-medium">Campaigns</p>
                        <h3 class="text-2xl font-bold mt-1">12</h3>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    
                    <!-- Left Column: Quick Actions & Main Table -->
                    <div class="lg:col-span-8 space-y-8">
                        
                        <!-- Quick Shortener Card -->
                        <div class="glass p-6 rounded-2xl border-accent/20 bg-gradient-to-br from-accent/5 to-transparent">
                            <div class="flex items-center gap-2 mb-4">
                                <i data-lucide="zap" class="w-4 h-4 text-accent fill-accent/20"></i>
                                <h2 class="font-bold">Quick Shorten</h2>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex-1 relative group">
                                    <input type="text" placeholder="https://very-long-destination-url.com/something" 
                                           class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all">
                                </div>
                                <div class="w-full sm:w-48 relative">
                                    <input type="text" placeholder="custom-alias" 
                                           class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all">
                                </div>
                                <button class="bg-white text-black px-6 py-3 rounded-xl text-sm font-bold hover:bg-zinc-200 transition-all">
                                    Shorten
                                </button>
                            </div>
                        </div>

                        <!-- Main Chart -->
                        <div class="glass p-6 rounded-2xl">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="font-bold">Click Performance</h3>
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-accent"></span>
                                        <span class="text-xs text-zinc-400">This Month</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-zinc-600"></span>
                                        <span class="text-xs text-zinc-400">Last Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="h-[300px]">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>

                        <!-- Recent Links Table -->
                        <div class="glass rounded-2xl overflow-hidden">
                            <div class="p-6 border-b border-border flex items-center justify-between">
                                <h3 class="font-bold">Recent Links</h3>
                                <button class="text-xs font-medium text-accent hover:underline">View All</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead class="bg-white/5">
                                        <tr>
                                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">Short URL</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">Original URL</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider text-center">Clicks</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-zinc-400 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-border">
                                        <tr class="hover:bg-white/[0.02] transition-colors group">
                                            <td class="px-6 py-4">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-bold text-accent">forge.li/summer26</span>
                                                    <span class="text-[10px] text-zinc-500">May 12, 2026</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="text-sm text-zinc-400 truncate max-w-[150px] inline-block">https://shop.brand.com/campaigns/summer-collection-2026</span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="text-sm font-medium">1,402</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-1 bg-emerald-400/10 text-emerald-400 text-[10px] font-bold rounded-md uppercase">Active</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <button class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all" title="Copy">
                                                        <i data-lucide="copy" class="w-4 h-4"></i>
                                                    </button>
                                                    <button class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all" title="Analytics">
                                                        <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-white/[0.02] transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-bold text-accent">forge.li/bio-link</span>
                                                    <span class="text-[10px] text-zinc-500">May 10, 2026</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="text-sm text-zinc-400 truncate max-w-[150px] inline-block">https://instagram.com/user_profile_handle</span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="text-sm font-medium">842</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-1 bg-emerald-400/10 text-emerald-400 text-[10px] font-bold rounded-md uppercase">Active</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <button class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all">
                                                        <i data-lucide="copy" class="w-4 h-4"></i>
                                                    </button>
                                                    <button class="p-1.5 text-zinc-500 hover:text-white hover:bg-white/10 rounded-lg transition-all">
                                                        <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Empty State Example -->
                        <div class="glass p-12 rounded-3xl border-dashed border-zinc-800 flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-zinc-900 rounded-2xl flex items-center justify-center mb-6 border border-border">
                                <i data-lucide="folder-plus" class="w-8 h-8 text-zinc-600"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2">No campaigns yet</h3>
                            <p class="text-zinc-500 text-sm max-w-xs mx-auto mb-8">Group your links into campaigns to track performance across different channels.</p>
                            <button class="px-6 py-2.5 bg-white text-black rounded-xl font-bold text-sm hover:bg-zinc-200 transition-all">
                                Create your first campaign
                            </button>
                        </div>

                    </div>

                    <!-- Right Column: Secondary Charts & Feed -->
                    <div class="lg:col-span-4 space-y-8">
                        
                        <!-- Device Breakdown -->
                        <div class="glass p-6 rounded-2xl">
                            <h3 class="font-bold mb-6">Device Breakdown</h3>
                            <div class="h-[220px]">
                                <canvas id="deviceChart"></canvas>
                            </div>
                            <div class="mt-6 space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                                        <div class="w-2 h-2 rounded-full bg-accent"></div>
                                        <span>Mobile</span>
                                    </div>
                                    <span class="text-sm font-bold">58%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                                        <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                                        <span>Desktop</span>
                                    </div>
                                    <span class="text-sm font-bold">32%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-sm text-zinc-400">
                                        <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                        <span>Other</span>
                                    </div>
                                    <span class="text-sm font-bold">10%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Top Locations -->
                        <div class="glass p-6 rounded-2xl">
                            <h3 class="font-bold mb-6">Top Locations</h3>
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="text-lg">🇺🇸</span>
                                        <span class="text-sm font-medium">United States</span>
                                    </div>
                                    <span class="text-sm font-bold">42%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="text-lg">🇬🇧</span>
                                        <span class="text-sm font-medium">United Kingdom</span>
                                    </div>
                                    <span class="text-sm font-bold">18%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="text-lg">🇩🇪</span>
                                        <span class="text-sm font-medium">Germany</span>
                                    </div>
                                    <span class="text-sm font-bold">12%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="text-lg">🇮🇳</span>
                                        <span class="text-sm font-medium">India</span>
                                    </div>
                                    <span class="text-sm font-bold">9%</span>
                                </div>
                            </div>
                            <button class="w-full mt-6 py-2.5 bg-white/5 border border-border rounded-xl text-xs font-medium hover:bg-white/10 transition-all">
                                View Full Report
                            </button>
                        </div>

                        <!-- Recent Activity -->
                        <div class="glass p-6 rounded-2xl">
                            <h3 class="font-bold mb-6">Activity Feed</h3>
                            <div class="space-y-6 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-px before:bg-border">
                                <div class="flex gap-4 relative">
                                    <div class="w-6 h-6 rounded-full bg-accent flex items-center justify-center relative z-10 border-4 border-background shadow-sm">
                                        <i data-lucide="plus" class="w-2.5 h-2.5 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-zinc-200">New link created <span class="font-bold text-accent">forge.li/sum..</span></p>
                                        <span class="text-[10px] text-zinc-500">2 minutes ago</span>
                                    </div>
                                </div>
                                <div class="flex gap-4 relative">
                                    <div class="w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center relative z-10 border-4 border-background shadow-sm">
                                        <i data-lucide="scan" class="w-2.5 h-2.5 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-zinc-200">QR code scanned from <span class="font-bold">London, UK</span></p>
                                        <span class="text-[10px] text-zinc-500">45 minutes ago</span>
                                    </div>
                                </div>
                                <div class="flex gap-4 relative">
                                    <div class="w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center relative z-10 border-4 border-background shadow-sm">
                                        <i data-lucide="share-2" class="w-2.5 h-2.5 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-zinc-200">Campaign shared with <span class="font-bold">3 team members</span></p>
                                        <span class="text-[10px] text-zinc-500">2 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Spacer -->
                <div class="h-20"></div> --}}

@endsection

@push('scripts')

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

@endpush