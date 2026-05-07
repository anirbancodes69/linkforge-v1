@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/docs.css') }}">

@endpush

@section('content')

          <!-- Docs Header -->
                <section class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase border border-emerald-500/20">System Operational</span>
                        </div>
                        <h1 class="text-4xl font-bold font-heading">API Documentation</h1>
                        <p class="text-zinc-500 max-w-2xl">Integrate LinkForge's powerful link management and tracking capabilities directly into your applications with our REST API.</p>
                        
                        <div class="flex items-center gap-3 pt-4">
                            <div class="glass px-4 py-2 rounded-xl flex items-center gap-3">
                                <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Base URL</span>
                                <code class="text-accent text-sm font-mono">https://api.linkforge.dev/v1</code>
                                <button onclick="copyToClipboard('https://api.linkforge.dev/v1')" class="text-zinc-500 hover:text-white"><i data-lucide="copy" class="w-4 h-4"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="glass px-4 py-2 rounded-xl text-xs font-bold hover:bg-white/5 transition-all flex items-center gap-2">
                            <i data-lucide="file-text" class="w-4 h-4"></i> OpenAPI Spec
                        </button>
                        <button class="bg-accent px-4 py-2 rounded-xl text-xs font-bold text-white hover:bg-accent/90 transition-all flex items-center gap-2">
                            <i data-lucide="play" class="w-4 h-4"></i> Launch Playground
                        </button>
                    </div>
                </section>

                <!-- Quick Start -->
                <section class="space-y-6">
                    <h2 class="text-xl font-bold font-heading">Getting Started</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="glass p-5 rounded-2xl group cursor-pointer hover:border-accent transition-all relative overflow-hidden">
                            <div class="w-10 h-10 rounded-xl bg-accent/10 flex items-center justify-center text-accent mb-4">
                                <i data-lucide="key-round" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-sm font-bold mb-1">Generate API Key</h3>
                            <p class="text-xs text-zinc-500">Obtain your secret tokens from the settings dashboard.</p>
                            <i data-lucide="chevron-right" class="w-4 h-4 absolute bottom-5 right-5 text-zinc-600 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        <div class="glass p-5 rounded-2xl group cursor-pointer hover:border-accent transition-all relative overflow-hidden">
                            <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 mb-4">
                                <i data-lucide="zap" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-sm font-bold mb-1">First Request</h3>
                            <p class="text-xs text-zinc-500">Learn the structure of a standard LinkForge API call.</p>
                            <i data-lucide="chevron-right" class="w-4 h-4 absolute bottom-5 right-5 text-zinc-600 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        <div class="glass p-5 rounded-2xl group cursor-pointer hover:border-accent transition-all relative overflow-hidden">
                            <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 mb-4">
                                <i data-lucide="link" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-sm font-bold mb-1">Create Links</h3>
                            <p class="text-xs text-zinc-500">Programmatically generate short links at scale.</p>
                            <i data-lucide="chevron-right" class="w-4 h-4 absolute bottom-5 right-5 text-zinc-600 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        <div class="glass p-5 rounded-2xl group cursor-pointer hover:border-accent transition-all relative overflow-hidden">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 mb-4">
                                <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-sm font-bold mb-1">Read Analytics</h3>
                            <p class="text-xs text-zinc-500">Fetch click data and scan metrics for your links.</p>
                            <i data-lucide="chevron-right" class="w-4 h-4 absolute bottom-5 right-5 text-zinc-600 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                    </div>
                </section>

                <!-- Authentication Section -->
                <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <div class="space-y-4">
                        <h2 class="text-xl font-bold font-heading">Authentication</h2>
                        <p class="text-sm text-zinc-400 leading-relaxed">The LinkForge API uses API keys to authenticate requests. You can view and manage your API keys in the <a href="#" class="text-accent hover:underline">LinkForge Settings</a>.</p>
                        <p class="text-sm text-zinc-400 leading-relaxed">Your API keys carry many privileges, so be sure to keep them secure! Do not share your secret API keys in publicly accessible areas such as GitHub, client-side code, and so forth.</p>
                        
                        <div class="p-4 bg-amber-500/5 border border-amber-500/20 rounded-2xl flex gap-4">
                            <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500 shrink-0"></i>
                            <p class="text-xs text-amber-200/70">All API requests must be made over HTTPS. Calls made over plain HTTP will fail. API requests without authentication will also fail.</p>
                        </div>
                    </div>
                    
                    <div class="rounded-2xl overflow-hidden border border-border shadow-2xl">
                        <div class="bg-surface px-4 py-2 border-b border-border flex justify-between items-center">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-rose-500/20"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500/20"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500/20"></div>
                            </div>
                            <span class="text-[10px] font-bold text-zinc-500 uppercase">Authentication Header</span>
                            <button class="text-zinc-500 hover:text-white"><i data-lucide="copy" class="w-3.5 h-3.5"></i></button>
                        </div>
                        <pre class="language-bash"><code># Pass your API key in the Authorization header
Authorization: Bearer YOUR_SECRET_KEY</code></pre>
                    </div>
                </section>

                <!-- API Usage Analytics Mini -->
                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="glass p-5 rounded-2xl">
                        <p class="text-[10px] font-bold text-zinc-500 uppercase mb-2">Requests (Today)</p>
                        <div class="flex items-end justify-between">
                            <h4 class="text-xl font-bold">42,891</h4>
                            <span class="text-emerald-500 text-[10px] font-bold">+12%</span>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl">
                        <p class="text-[10px] font-bold text-zinc-500 uppercase mb-2">Rate Limit Usage</p>
                        <div class="flex items-end justify-between">
                            <h4 class="text-xl font-bold">14%</h4>
                            <div class="w-16 h-1 bg-white/5 rounded-full overflow-hidden mb-2">
                                <div class="w-1/4 h-full bg-accent"></div>
                            </div>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl">
                        <p class="text-[10px] font-bold text-zinc-500 uppercase mb-2">Avg. Response Time</p>
                        <div class="flex items-end justify-between">
                            <h4 class="text-xl font-bold">84ms</h4>
                            <span class="text-emerald-500 text-[10px] font-bold">Optimal</span>
                        </div>
                    </div>
                    <div class="glass p-5 rounded-2xl">
                        <p class="text-[10px] font-bold text-zinc-500 uppercase mb-2">Success Rate</p>
                        <div class="flex items-end justify-between">
                            <h4 class="text-xl font-bold">99.98%</h4>
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-500 mb-1"></i>
                        </div>
                    </div>
                </section>

                <!-- Endpoints Section -->
                <section class="space-y-6">
                    <h2 class="text-xl font-bold font-heading">Core Endpoints</h2>
                    
                    <!-- Create Short Link Card -->
                    <div class="glass rounded-[2rem] overflow-hidden endpoint-card transition-all">
                        <div class="p-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
                            <div class="lg:col-span-7 space-y-6">
                                <div class="flex items-center gap-3">
                                    <span class="px-2 py-1 bg-accent/20 text-accent text-xs font-bold rounded-lg uppercase">POST</span>
                                    <code class="text-sm font-mono text-zinc-300">/links</code>
                                </div>
                                <h3 class="text-2xl font-bold">Create a Short Link</h3>
                                <p class="text-zinc-400 text-sm">Creates a new shortened URL for a specific destination. You can optionally provide a custom alias or tags.</p>
                                
                                <div class="space-y-4 pt-4">
                                    <h4 class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Parameters</h4>
                                    <table class="w-full text-xs">
                                        <thead class="text-zinc-500 border-b border-border">
                                            <tr>
                                                <th class="py-2 text-left">Name</th>
                                                <th class="py-2 text-left">Type</th>
                                                <th class="py-2 text-left">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border/50">
                                            <tr>
                                                <td class="py-3 font-mono text-accent">destination</td>
                                                <td class="py-3 text-zinc-500 italic">string</td>
                                                <td class="py-3 text-zinc-400">The full URL to shorten (required).</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3 font-mono text-accent">alias</td>
                                                <td class="py-3 text-zinc-500 italic">string</td>
                                                <td class="py-3 text-zinc-400">A custom back-half for the link.</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3 font-mono text-accent">tags</td>
                                                <td class="py-3 text-zinc-500 italic">array</td>
                                                <td class="py-3 text-zinc-400">List of strings to categorize.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="lg:col-span-5 space-y-4">
                                <div class="rounded-xl overflow-hidden border border-border">
                                    <div class="bg-surface px-4 py-2 border-b border-border flex gap-4 text-[10px] font-bold text-zinc-500">
                                        <button class="text-white border-b-2 border-accent pb-2">REQUEST</button>
                                        <button class="hover:text-white transition-all pb-2">RESPONSE</button>
                                    </div>
                                    <pre class="language-json"><code>{
  "destination": "https://linkforge.li/pricing",
  "alias": "special-offer",
  "tags": ["marketing", "q2-sale"]
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Get Analytics Card -->
                    <div class="glass rounded-[2rem] overflow-hidden endpoint-card transition-all">
                        <div class="p-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
                            <div class="lg:col-span-7 space-y-6">
                                <div class="flex items-center gap-3">
                                    <span class="px-2 py-1 bg-emerald-500/20 text-emerald-400 text-xs font-bold rounded-lg uppercase">GET</span>
                                    <code class="text-sm font-mono text-zinc-300">/links/{id}/analytics</code>
                                </div>
                                <h3 class="text-2xl font-bold">Get Link Analytics</h3>
                                <p class="text-zinc-400 text-sm">Retrieve detailed click statistics, including geographic data and device types for a specific link.</p>
                            </div>

                            <div class="lg:col-span-5 space-y-4">
                                <div class="rounded-xl overflow-hidden border border-border">
                                    <div class="bg-surface px-4 py-2 border-b border-border flex gap-4 text-[10px] font-bold text-zinc-500 uppercase">
                                        <span class="text-white">Example JSON Response</span>
                                    </div>
                                    <pre class="language-json"><code>{
  "total_clicks": 1420,
  "unique_clicks": 890,
  "top_countries": { "US": 600, "UK": 200 },
  "status": "active"
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SDKs Section -->
                <section class="space-y-6">
                    <h2 class="text-xl font-bold font-heading">Official SDKs</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        <div class="glass p-5 rounded-2xl flex flex-col items-center text-center group hover:bg-accent/5 transition-all">
                            <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="code-2" class="w-6 h-6 text-yellow-500"></i></div>
                            <span class="text-xs font-bold">JavaScript</span>
                            <code class="text-[10px] text-zinc-500 mt-2 px-2 py-1 bg-background rounded">npm i @linkforge/sdk</code>
                        </div>
                        <div class="glass p-5 rounded-2xl flex flex-col items-center text-center group hover:bg-accent/5 transition-all">
                            <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="box" class="w-6 h-6 text-blue-500"></i></div>
                            <span class="text-xs font-bold">Python</span>
                            <code class="text-[10px] text-zinc-500 mt-2 px-2 py-1 bg-background rounded">pip install linkforge</code>
                        </div>
                        <div class="glass p-5 rounded-2xl flex flex-col items-center text-center group hover:bg-accent/5 transition-all">
                            <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="terminal" class="w-6 h-6 text-purple-400"></i></div>
                            <span class="text-xs font-bold">PHP</span>
                            <code class="text-[10px] text-zinc-500 mt-2 px-2 py-1 bg-background rounded">composer require lf/sdk</code>
                        </div>
                        <div class="glass p-5 rounded-2xl flex flex-col items-center text-center group hover:bg-accent/5 transition-all">
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="cpu" class="w-6 h-6 text-cyan-400"></i></div>
                            <span class="text-xs font-bold">Go</span>
                            <code class="text-[10px] text-zinc-500 mt-2 px-2 py-1 bg-background rounded">go get linkforge-go</code>
                        </div>
                        <div class="glass p-5 rounded-2xl flex flex-col items-center text-center group hover:bg-accent/5 transition-all">
                            <div class="w-12 h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="coffee" class="w-6 h-6 text-orange-400"></i></div>
                            <span class="text-xs font-bold">Java</span>
                            <code class="text-[10px] text-zinc-500 mt-2 px-2 py-1 bg-background rounded">maven: linkforge-java</code>
                        </div>
                    </div>
                </section>

                <!-- API Playground -->
                <section class="space-y-6">
                    <h2 class="text-xl font-bold font-heading">Interactive Playground</h2>
                    <div class="glass rounded-[2rem] overflow-hidden grid grid-cols-1 lg:grid-cols-2">
                        <!-- Request Editor -->
                        <div class="p-8 space-y-6 border-b lg:border-b-0 lg:border-r border-border">
                            <div class="flex gap-2">
                                <select class="bg-white/5 border border-border rounded-xl px-4 py-2 text-xs font-bold text-zinc-400 outline-none">
                                    <option>POST</option>
                                    <option>GET</option>
                                    <option>PUT</option>
                                    <option>DELETE</option>
                                </select>
                                <input type="text" value="https://api.linkforge.dev/v1/links" class="flex-1 bg-white/5 border border-border rounded-xl px-4 py-2 text-xs text-zinc-300 focus:border-accent outline-none">
                            </div>
                            
                            <div class="space-y-4">
                                <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Body (JSON)</label>
                                <div class="rounded-xl overflow-hidden border border-border h-48">
                                    <textarea class="w-full h-full bg-[#0f1117] text-zinc-300 font-mono text-xs p-4 outline-none resize-none">
{
  "destination": "https://google.com",
  "alias": "my-search"
}</textarea>
                                </div>
                            </div>
                            
                            <button class="w-full py-4 bg-accent hover:bg-accent/90 text-white font-bold rounded-2xl transition-all shadow-lg shadow-accent/20 flex items-center justify-center gap-2">
                                <i data-lucide="send" class="w-4 h-4"></i> Send API Request
                            </button>
                        </div>
                        <!-- Response Viewer -->
                        <div class="bg-[#0f1117]/50 p-8 flex flex-col">
                            <div class="flex justify-between items-center mb-4">
                                <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Response</label>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-500 text-[10px] font-bold uppercase">201 Created</span>
                                    <span class="text-zinc-500 text-[10px]">120ms</span>
                                </div>
                            </div>
                            <div class="flex-1 rounded-xl overflow-hidden border border-border/20">
                                <pre class="language-json h-full"><code>{
  "id": "lnk_9210",
  "short_url": "https://forge.li/my-search",
  "created_at": "2026-05-07T12:00:00Z"
}</code></pre>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Support Resources -->
                <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="glass p-6 rounded-2xl flex items-center gap-6 group cursor-pointer hover:bg-white/5 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500"><i data-lucide="github" class="w-6 h-6"></i></div>
                        <div>
                            <h4 class="font-bold">Open Source SDKs</h4>
                            <p class="text-xs text-zinc-500">Contribute or view source on GitHub.</p>
                        </div>
                    </div>
                    <div class="glass p-6 rounded-2xl flex items-center gap-6 group cursor-pointer hover:bg-white/5 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center text-accent"><i data-lucide="message-square" class="w-6 h-6"></i></div>
                        <div>
                            <h4 class="font-bold">Community Forum</h4>
                            <p class="text-xs text-zinc-500">Connect with other developers building on LinkForge.</p>
                        </div>
                    </div>
                </section>

                <!-- Footer Spacer -->
                <div class="h-12"></div>  

@endsection


@push('scripts')

<script src="{{ asset('assets/js/docs.js') }}"></script>

@endpush