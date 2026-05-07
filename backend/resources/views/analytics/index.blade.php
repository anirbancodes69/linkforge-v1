@extends('layouts.app')

@section('content')

<!-- Analytics Header Section -->
                <div class="flex flex-col lg:flex-row justify-between items-start gap-6">
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <h1 class="text-2xl font-bold font-heading text-white">Summer Campaign 2026</h1>
                            <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 text-[10px] font-bold rounded uppercase border border-emerald-500/20">Active</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm">
                            <div class="flex items-center gap-2 text-accent font-bold">
                                <span>forge.li/summer-26</span>
                                <button class="hover:text-white transition-colors"><i data-lucide="copy" class="w-4 h-4"></i></button>
                            </div>
                            <span class="text-zinc-500">Redirects to: <span class="text-zinc-300">brand.com/products/summer...</span></span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="glass p-2.5 rounded-xl hover:bg-white/10 transition-all" title="Share Report"><i data-lucide="share-2" class="w-5 h-5"></i></button>
                        <button class="glass p-2.5 rounded-xl hover:bg-white/10 transition-all" title="QR Analytics"><i data-lucide="qr-code" class="w-5 h-5"></i></button>
                        <button class="bg-accent hover:bg-accent/90 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-accent/20 transition-all">Edit Link</button>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                    <!-- Total Clicks -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-accent/10 text-accent rounded-lg"><i data-lucide="mouse-pointer-2" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-emerald-400 flex items-center gap-1">+12.5% <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">Total Clicks</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">42,892</h3>
                    </div>
                    <!-- Unique Visitors -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-blue-500/10 text-blue-400 rounded-lg"><i data-lucide="users" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-emerald-400 flex items-center gap-1">+8.2% <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">Unique Visitors</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">31,204</h3>
                    </div>
                    <!-- QR Scans -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-purple-500/10 text-purple-400 rounded-lg"><i data-lucide="scan" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-rose-400 flex items-center gap-1">-2.1% <i data-lucide="trending-down" class="w-3 h-3"></i></span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">QR Scans</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">8,431</h3>
                    </div>
                    <!-- Conv. Rate -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-emerald-500/10 text-emerald-400 rounded-lg"><i data-lucide="target" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-emerald-400 flex items-center gap-1">+5.4% <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">Conv. Rate</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">3.24%</h3>
                    </div>
                    <!-- Avg. Time -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-amber-500/10 text-amber-400 rounded-lg"><i data-lucide="timer" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-zinc-500">Stable</span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">Avg. Time</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">14s</h3>
                    </div>
                    <!-- Bounce Rate -->
                    <div class="glass p-5 rounded-2xl stat-card">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-rose-500/10 text-rose-400 rounded-lg"><i data-lucide="unfold-less" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-bold text-emerald-400 flex items-center gap-1">-4.2% <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                        </div>
                        <p class="text-zinc-500 text-xs font-medium">Bounce Rate</p>
                        <h3 class="text-2xl font-bold mt-1 tracking-tight">21.8%</h3>
                    </div>
                </div>

                <!-- Main Chart Section -->
                <div class="glass p-6 rounded-[2rem] space-y-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <h3 class="text-lg font-bold">Performance Over Time</h3>
                        <div class="flex items-center gap-1 bg-white/5 p-1 rounded-xl border border-border">
                            <button class="px-4 py-1.5 text-xs font-bold rounded-lg text-zinc-500 hover:text-white transition-all">24h</button>
                            <button class="px-4 py-1.5 text-xs font-bold rounded-lg bg-accent text-white shadow-sm">7d</button>
                            <button class="px-4 py-1.5 text-xs font-bold rounded-lg text-zinc-500 hover:text-white transition-all">30d</button>
                            <button class="px-4 py-1.5 text-xs font-bold rounded-lg text-zinc-500 hover:text-white transition-all">90d</button>
                        </div>
                    </div>
                    <div class="h-[350px] w-full">
                        <canvas id="mainAnalyticsChart"></canvas>
                    </div>
                </div>

                <!-- Grid: Traffic Sources & Devices -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    
                    <!-- Traffic Sources -->
                    <div class="lg:col-span-8 glass p-6 rounded-[2rem]">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold">Traffic Sources</h3>
                            <button class="text-xs text-accent font-bold hover:underline">View All Referrers</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                            <div class="space-y-6">
                                <!-- Source Item -->
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm font-medium">
                                        <span class="flex items-center gap-2"><i data-lucide="globe" class="w-4 h-4 text-zinc-400"></i> Direct Traffic</span>
                                        <span class="text-zinc-200">18,204 <span class="text-zinc-500 font-normal ml-2">42%</span></span>
                                    </div>
                                    <div class="h-2 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent w-[42%] rounded-full"></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm font-medium">
                                        <span class="flex items-center gap-2"><i data-lucide="instagram" class="w-4 h-4 text-zinc-400"></i> Social Media</span>
                                        <span class="text-zinc-200">12,104 <span class="text-zinc-500 font-normal ml-2">28%</span></span>
                                    </div>
                                    <div class="h-2 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-purple-500 w-[28%] rounded-full"></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm font-medium">
                                        <span class="flex items-center gap-2"><i data-lucide="search" class="w-4 h-4 text-zinc-400"></i> Search Engines</span>
                                        <span class="text-zinc-200">7,341 <span class="text-zinc-500 font-normal ml-2">17%</span></span>
                                    </div>
                                    <div class="h-2 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 w-[17%] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm font-medium">
                                        <span class="flex items-center gap-2"><i data-lucide="mail" class="w-4 h-4 text-zinc-400"></i> Email Marketing</span>
                                        <span class="text-zinc-200">3,492 <span class="text-zinc-500 font-normal ml-2">8%</span></span>
                                    </div>
                                    <div class="h-2 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-emerald-500 w-[8%] rounded-full"></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm font-medium">
                                        <span class="flex items-center gap-2"><i data-lucide="link" class="w-4 h-4 text-zinc-400"></i> Other Referrers</span>
                                        <span class="text-zinc-200">2,151 <span class="text-zinc-500 font-normal ml-2">5%</span></span>
                                    </div>
                                    <div class="h-2 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-zinc-600 w-[5%] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Device Doughnut -->
                    <div class="lg:col-span-4 glass p-6 rounded-[2rem] flex flex-col">
                        <h3 class="text-lg font-bold mb-8">Device Breakdown</h3>
                        <div class="flex-1 min-h-[200px]">
                            <canvas id="deviceChart"></canvas>
                        </div>
                        <div class="mt-6 flex justify-center gap-6">
                            <div class="text-center">
                                <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1">Mobile</p>
                                <p class="text-sm font-bold">64%</p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1">Desktop</p>
                                <p class="text-sm font-bold">31%</p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1">Tablet</p>
                                <p class="text-sm font-bold">5%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid: Geography & Real-time -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    
                    <!-- Geography -->
                    <div class="lg:col-span-7 glass p-6 rounded-[2rem]">
                        <h3 class="text-lg font-bold mb-8">Top Locations</h3>
                        <div class="space-y-4">
                            <!-- Country Item -->
                            <div class="flex items-center gap-4 group cursor-default">
                                <span class="text-xl">🇺🇸</span>
                                <div class="flex-1 space-y-1.5">
                                    <div class="flex justify-between text-sm font-bold">
                                        <span>United States</span>
                                        <span class="text-zinc-400">14,204 <span class="text-[10px] ml-2 px-1.5 py-0.5 bg-white/5 rounded tracking-tighter">33.1%</span></span>
                                    </div>
                                    <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent w-[33.1%] group-hover:bg-accent/80 transition-all"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group cursor-default">
                                <span class="text-xl">🇬🇧</span>
                                <div class="flex-1 space-y-1.5">
                                    <div class="flex justify-between text-sm font-bold">
                                        <span>United Kingdom</span>
                                        <span class="text-zinc-400">8,102 <span class="text-[10px] ml-2 px-1.5 py-0.5 bg-white/5 rounded tracking-tighter">18.9%</span></span>
                                    </div>
                                    <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent w-[18.9%] group-hover:bg-accent/80 transition-all"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group cursor-default">
                                <span class="text-xl">🇩🇪</span>
                                <div class="flex-1 space-y-1.5">
                                    <div class="flex justify-between text-sm font-bold">
                                        <span>Germany</span>
                                        <span class="text-zinc-400">4,391 <span class="text-[10px] ml-2 px-1.5 py-0.5 bg-white/5 rounded tracking-tighter">10.2%</span></span>
                                    </div>
                                    <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent w-[10.2%] group-hover:bg-accent/80 transition-all"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 group cursor-default">
                                <span class="text-xl">🇮🇳</span>
                                <div class="flex-1 space-y-1.5">
                                    <div class="flex justify-between text-sm font-bold">
                                        <span>India</span>
                                        <span class="text-zinc-400">3,492 <span class="text-[10px] ml-2 px-1.5 py-0.5 bg-white/5 rounded tracking-tighter">8.1%</span></span>
                                    </div>
                                    <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                        <div class="h-full bg-accent w-[8.1%] group-hover:bg-accent/80 transition-all"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="w-full mt-8 py-3 text-xs font-bold text-zinc-500 hover:text-white transition-all border border-border rounded-xl bg-white/5">Show More Countries</button>
                    </div>

                    <!-- Real-time Activity -->
                    <div class="lg:col-span-5 glass p-6 rounded-[2rem] flex flex-col">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold">Live Activity</h3>
                            <span class="flex items-center gap-2 text-[10px] font-bold text-emerald-400">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> LIVE
                            </span>
                        </div>
                        <div class="flex-1 space-y-6 overflow-hidden">
                            <!-- Activity Item -->
                            <div class="flex items-start gap-4 relative">
                                <div class="w-0.5 h-full bg-border absolute left-[11px] top-6"></div>
                                <div class="w-6 h-6 rounded-full bg-accent flex items-center justify-center relative z-10 border-4 border-background">
                                    <i data-lucide="mouse-pointer-2" class="w-2 h-2 text-white"></i>
                                </div>
                                <div class="flex-1 -mt-1">
                                    <p class="text-sm font-medium text-zinc-200">New click from <span class="text-white">New York, US</span></p>
                                    <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest mt-0.5">iPhone • Safari • 2s ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 relative">
                                <div class="w-0.5 h-full bg-border absolute left-[11px] top-6"></div>
                                <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center relative z-10 border-4 border-background">
                                    <i data-lucide="scan" class="w-2 h-2 text-white"></i>
                                </div>
                                <div class="flex-1 -mt-1">
                                    <p class="text-sm font-medium text-zinc-200">QR Scan from <span class="text-white">London, UK</span></p>
                                    <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest mt-0.5">Android • Chrome • 14s ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 relative">
                                <div class="w-6 h-6 rounded-full bg-accent flex items-center justify-center relative z-10 border-4 border-background">
                                    <i data-lucide="mouse-pointer-2" class="w-2 h-2 text-white"></i>
                                </div>
                                <div class="flex-1 -mt-1">
                                    <p class="text-sm font-medium text-zinc-200">New click from <span class="text-white">Berlin, DE</span></p>
                                    <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest mt-0.5">Macintosh • Firefox • 52s ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referrer Table -->
                <div class="glass rounded-[2rem] overflow-hidden">
                    <div class="p-8 border-b border-border">
                        <h3 class="text-lg font-bold">Top Referrers</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white/5">
                                <tr class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                                    <th class="px-8 py-4">Source URL</th>
                                    <th class="px-8 py-4">Clicks</th>
                                    <th class="px-8 py-4">Conv. Rate</th>
                                    <th class="px-8 py-4">Bounce Rate</th>
                                    <th class="px-8 py-4 text-right">Trend</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-4 text-sm font-medium text-zinc-300">instagram.com/p/C6...</td>
                                    <td class="px-8 py-4 text-sm font-bold">8,401</td>
                                    <td class="px-8 py-4 text-sm">4.2%</td>
                                    <td class="px-8 py-4 text-sm">18%</td>
                                    <td class="px-8 py-4 text-right"><span class="text-emerald-400 font-bold text-xs">+2.4%</span></td>
                                </tr>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-4 text-sm font-medium text-zinc-300">twitter.com/ads/status...</td>
                                    <td class="px-8 py-4 text-sm font-bold">5,202</td>
                                    <td class="px-8 py-4 text-sm">3.1%</td>
                                    <td class="px-8 py-4 text-sm">22%</td>
                                    <td class="px-8 py-4 text-right"><span class="text-emerald-400 font-bold text-xs">+0.8%</span></td>
                                </tr>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-4 text-sm font-medium text-zinc-300">facebook.com/l.php?u=...</td>
                                    <td class="px-8 py-4 text-sm font-bold">2,101</td>
                                    <td class="px-8 py-4 text-sm">2.4%</td>
                                    <td class="px-8 py-4 text-sm">31%</td>
                                    <td class="px-8 py-4 text-right"><span class="text-rose-400 font-bold text-xs">-1.2%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer Spacer -->
                <div class="h-12"></div>

@endsection


@push('scripts')

<script src="{{ asset('assets/js/analytics.js') }}"></script>

@endpush