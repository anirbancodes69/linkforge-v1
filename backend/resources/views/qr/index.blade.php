@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/qr.css') }}">

@endpush

@section('content')

 <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold font-heading">QR Code Generator</h1>
                        <p class="text-zinc-500 text-sm mt-1">Create beautiful, trackable, and customizable QR codes.</p>
                    </div>
                </div>

                <!-- Mini Analytics (Matching the style of previous pages) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="glass p-5 rounded-2xl flex items-center gap-4">
                        <div class="p-3 bg-accent/10 text-accent rounded-xl"><i data-lucide="mouse-pointer-click" class="w-5 h-5"></i></div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-zinc-500">Total Scans</p>
                            <h3 class="text-xl font-bold">12,842</h3>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl flex items-center gap-4">
                        <div class="p-3 bg-purple-500/10 text-purple-400 rounded-xl"><i data-lucide="qr-code" class="w-5 h-5"></i></div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-zinc-500">Active QRs</p>
                            <h3 class="text-xl font-bold">48</h3>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl flex items-center gap-4">
                        <div class="p-3 bg-emerald-500/10 text-emerald-400 rounded-xl"><i data-lucide="trending-up" class="w-5 h-5"></i></div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-zinc-500">Avg Scan Rate</p>
                            <h3 class="text-xl font-bold">8.4%</h3>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl flex items-center gap-4">
                        <div class="p-3 bg-amber-500/10 text-amber-400 rounded-xl"><i data-lucide="zap" class="w-5 h-5"></i></div>
                        <div>
                            <p class="text-[10px] uppercase font-bold text-zinc-500">Top Format</p>
                            <h3 class="text-xl font-bold">WiFi</h3>
                        </div>
                    </div>
                </div>

                <!-- Main Generator Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left: Configuration & Customization -->
                    <div class="lg:col-span-7 space-y-8">
                        
                        <!-- Content Card -->
                        <div class="glass p-8 rounded-[2rem] space-y-6">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-accent">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </div>
                                <h2 class="text-xl font-bold">1. Configure Content</h2>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">QR Type</label>
                                    <select id="qrType" class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent transition-all text-zinc-200">
                                        <option value="url">Website URL</option>
                                        <option value="text">Plain Text</option>
                                        <option value="email">Email Address</option>
                                        <option value="wifi">WiFi Network</option>
                                        <option value="whatsapp">WhatsApp</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Template</label>
                                    <select class="w-full bg-background border border-border rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent transition-all text-zinc-200">
                                        <option>Default (Minimalist)</option>
                                        <option>Business Pro</option>
                                        <option>Restaurant Glow</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Redirect Destination</label>
                                <input type="text" id="qrInput" value="https://linkforge.li/summer-campaign" placeholder="Enter URL or text..." class="w-full bg-background border border-border rounded-2xl px-5 py-4 text-sm focus:outline-none focus:border-accent transition-all">
                            </div>
                        </div>

                        <!-- Customization Card -->
                        <div class="glass p-8 rounded-[2rem] space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-purple-400">
                                    <i data-lucide="palette" class="w-5 h-5"></i>
                                </div>
                                <h2 class="text-xl font-bold">2. Customize Design</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-6">
                                    <div class="space-y-4">
                                        <div class="flex justify-between items-center">
                                            <label class="text-xs font-semibold text-zinc-300">Foreground Color</label>
                                            <input type="color" id="fgColor" value="#6366f1" class="bg-transparent w-8 h-8 rounded-lg cursor-pointer border-none overflow-hidden">
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <label class="text-xs font-semibold text-zinc-300">Background Color</label>
                                            <input type="color" id="bgColor" value="#ffffff" class="bg-transparent w-8 h-8 rounded-lg cursor-pointer border-none overflow-hidden">
                                        </div>
                                    </div>
                                    <div class="space-y-4 pt-4 border-t border-border">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-semibold text-zinc-300">Rounded Corners</span>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" checked class="sr-only peer">
                                                <div class="w-10 h-5 bg-zinc-800 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent"></div>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-semibold text-zinc-300">Add Logo Center</span>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer">
                                                <div class="w-10 h-5 bg-zinc-800 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div class="space-y-4">
                                        <label class="text-xs font-semibold text-zinc-300">Frame Style</label>
                                        <div class="grid grid-cols-3 gap-2">
                                            <button class="h-12 bg-white/5 border-2 border-accent rounded-xl flex items-center justify-center"><i data-lucide="square" class="w-4 h-4"></i></button>
                                            <button class="h-12 bg-white/5 border border-border rounded-xl flex items-center justify-center opacity-50 hover:opacity-100"><i data-lucide="circle" class="w-4 h-4"></i></button>
                                            <button class="h-12 bg-white/5 border border-border rounded-xl flex items-center justify-center opacity-50 hover:opacity-100"><i data-lucide="triangle" class="w-4 h-4"></i></button>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <label class="text-xs font-semibold text-zinc-300">Resolution (Size)</label>
                                            <span class="text-[10px] font-bold text-accent">1024x1024</span>
                                        </div>
                                        <input type="range" class="w-full h-1.5 bg-zinc-800 rounded-lg appearance-none cursor-pointer accent-accent">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Preview & Actions -->
                    <div class="lg:col-span-5 sticky top-8">
                        <div class="glass p-10 rounded-[2rem] flex flex-col items-center text-center">
                            <div class="mb-8 relative group">
                                <div class="absolute -inset-4 bg-accent/20 blur-3xl rounded-full opacity-50 group-hover:opacity-80 transition-opacity"></div>
                                <div class="relative phone-mockup flex items-center justify-center p-8">
                                    <!-- Inner Phone Content -->
                                    <div class="w-full flex flex-col items-center gap-8">
                                        <div class="w-12 h-1 bg-zinc-800 rounded-full mb-4"></div>
                                        <div class="p-6 bg-white rounded-3xl shadow-2xl qr-preview-container" id="qrcode">
                                            <!-- QR Generated here -->
                                        </div>
                                        <div class="space-y-2 px-4">
                                            <p class="text-xs font-bold text-zinc-400">Scan to preview</p>
                                            <p class="text-[10px] text-zinc-600">Scan the QR to test the destination in real-time before saving.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full grid grid-cols-2 gap-4">
                                <button class="py-4 bg-accent hover:bg-accent/90 text-white font-bold rounded-2xl shadow-lg shadow-accent/20 transition-all flex items-center justify-center gap-2">
                                    <i data-lucide="download" class="w-5 h-5"></i>
                                    Download PNG
                                </button>
                                <button class="py-4 glass hover:bg-white/10 text-white font-bold rounded-2xl transition-all flex items-center justify-center gap-2">
                                    <i data-lucide="file-type-2" class="w-5 h-5"></i>
                                    SVG Format
                                </button>
                                <button class="col-span-2 py-4 border border-border hover:border-accent/50 text-zinc-400 hover:text-white font-bold rounded-2xl transition-all flex items-center justify-center gap-2">
                                    <i data-lucide="save" class="w-5 h-5"></i>
                                    Save to Templates
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template Gallery Section -->
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold font-heading">Popular Templates</h2>
                        <button class="text-sm text-accent font-bold hover:underline">Browse Library</button>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="contact-2" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Business Card</p>
                        </div>
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="utensils" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Menu Pro</p>
                        </div>
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="wifi" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Fast WiFi</p>
                        </div>
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="instagram" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Social Link</p>
                        </div>
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="ticket" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Event Pass</p>
                        </div>
                        <div class="glass p-4 rounded-2xl group cursor-pointer hover:border-accent transition-all">
                            <div class="aspect-square bg-white/5 rounded-xl mb-3 flex items-center justify-center text-zinc-600 group-hover:text-accent transition-all">
                                <i data-lucide="shopping-bag" class="w-8 h-8"></i>
                            </div>
                            <p class="text-xs font-bold text-center">Product Tag</p>
                        </div>
                    </div>
                </div>

                <!-- Recent QR Codes Table -->
                <div class="glass rounded-[2rem] overflow-hidden">
                    <div class="p-8 border-b border-border flex justify-between items-center">
                        <h3 class="text-lg font-bold">Recently Generated</h3>
                        <div class="flex gap-2">
                             <button class="p-2 text-zinc-500 hover:text-white transition-all"><i data-lucide="filter" class="w-4 h-4"></i></button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white/5 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                                <tr>
                                    <th class="px-8 py-4">Preview</th>
                                    <th class="px-8 py-4">Name / Destination</th>
                                    <th class="px-8 py-4">Type</th>
                                    <th class="px-8 py-4">Scans</th>
                                    <th class="px-8 py-4">Created</th>
                                    <th class="px-8 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-4">
                                        <div class="w-10 h-10 bg-white p-1 rounded-lg">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://forge.li/promo" class="w-full h-full">
                                        </div>
                                    </td>
                                    <td class="px-8 py-4">
                                        <p class="text-sm font-bold text-white">Summer Promo 2026</p>
                                        <p class="text-xs text-zinc-500">forge.li/summer-26</p>
                                    </td>
                                    <td class="px-8 py-4">
                                        <span class="px-2 py-0.5 bg-blue-500/10 text-blue-400 text-[10px] font-bold rounded uppercase">URL</span>
                                    </td>
                                    <td class="px-8 py-4">
                                        <span class="text-sm font-medium">1,248</span>
                                    </td>
                                    <td class="px-8 py-4 text-xs text-zinc-500">2 hours ago</td>
                                    <td class="px-8 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="p-2 text-zinc-500 hover:text-white"><i data-lucide="bar-chart-2" class="w-4 h-4"></i></button>
                                            <button class="p-2 text-zinc-500 hover:text-white"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-2 text-zinc-500 hover:text-rose-500"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-4">
                                        <div class="w-10 h-10 bg-white p-1 rounded-lg">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=WIFI:S:Guest;P:123456;;" class="w-full h-full">
                                        </div>
                                    </td>
                                    <td class="px-8 py-4">
                                        <p class="text-sm font-bold text-white">Office Guest WiFi</p>
                                        <p class="text-xs text-zinc-500">SSID: LinkForge_Guest</p>
                                    </td>
                                    <td class="px-8 py-4">
                                        <span class="px-2 py-0.5 bg-amber-500/10 text-amber-400 text-[10px] font-bold rounded uppercase">WiFi</span>
                                    </td>
                                    <td class="px-8 py-4">
                                        <span class="text-sm font-medium">42</span>
                                    </td>
                                    <td class="px-8 py-4 text-xs text-zinc-500">May 05, 2026</td>
                                    <td class="px-8 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="p-2 text-zinc-500 hover:text-white"><i data-lucide="bar-chart-2" class="w-4 h-4"></i></button>
                                            <button class="p-2 text-zinc-500 hover:text-white"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-2 text-zinc-500 hover:text-rose-500"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Spacer -->
                <div class="h-20"></div>

@endsection


@push('scripts')

<script src="{{ asset('assets/js/qr.js') }}"></script>

@endpush