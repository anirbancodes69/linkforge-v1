@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/pricing.css') }}">

@endpush

@section('content')

           <!-- Pricing Header -->
                <section class="text-center max-w-2xl mx-auto space-y-6 pt-8 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold font-heading tracking-tight">Simple pricing for <span class="text-accent">growing teams.</span></h1>
                    <p class="text-zinc-500 text-lg">Start free. Upgrade when your links start scaling.</p>
                    
                    <!-- Billing Toggle -->
                    <div class="flex items-center justify-center gap-4 pt-4">
                        <span class="text-sm font-medium text-zinc-400">Monthly</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="billingToggle" class="sr-only billing-toggle">
                            <div class="toggle-bg w-11 h-6 bg-zinc-800 rounded-full transition-all">
                                <div class="toggle-dot absolute top-1 left-1 bg-white w-4 h-4 rounded-full transition-all"></div>
                            </div>
                        </label>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-medium text-white">Yearly</span>
                            <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 text-[10px] font-bold rounded-full border border-emerald-500/20">Save 20%</span>
                        </div>
                    </div>
                </section>

                <!-- Pricing Cards Section -->
                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 animate-fade-in" style="animation-delay: 0.1s;">
                    <!-- Free Plan -->
                    <div class="glass p-8 rounded-[2rem] flex flex-col hover:border-zinc-700 transition-all">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Free</h3>
                            <p class="text-zinc-500 text-sm">For individuals getting started.</p>
                        </div>
                        <div class="mb-8">
                            <span class="text-4xl font-bold">$0</span>
                            <span class="text-zinc-500">/mo</span>
                        </div>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> 100 links/month
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Basic analytics
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> QR generation
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Community support
                            </li>
                        </ul>
                        <button class="w-full py-3 border border-border hover:bg-white/5 rounded-xl text-sm font-bold transition-all">Get Started</button>
                    </div>

                    <!-- Pro Plan (Recommended) -->
                    <div class="glass p-8 rounded-[2rem] flex flex-col pricing-card-highlight relative scale-105 z-10">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-accent rounded-full text-[10px] font-bold uppercase tracking-widest text-white shadow-lg">Most Popular</div>
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Pro</h3>
                            <p class="text-zinc-500 text-sm">Everything you need to grow.</p>
                        </div>
                        <div class="mb-8">
                            <span class="text-4xl font-bold price-val" data-monthly="29" data-yearly="24">$29</span>
                            <span class="text-zinc-500">/mo</span>
                        </div>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex items-center gap-3 text-sm text-zinc-200 font-medium">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Unlimited links
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-200 font-medium">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Advanced analytics
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-200 font-medium">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Custom aliases
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-200 font-medium">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Branded QR codes
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-200 font-medium">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Priority support
                            </li>
                        </ul>
                        <button class="w-full py-3 bg-accent hover:bg-accent/90 text-white rounded-xl text-sm font-bold transition-all shadow-xl shadow-accent/20">Upgrade Now</button>
                    </div>

                    <!-- Business Plan -->
                    <div class="glass p-8 rounded-[2rem] flex flex-col hover:border-zinc-700 transition-all">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Business</h3>
                            <p class="text-zinc-500 text-sm">Scale your brand with the team.</p>
                        </div>
                        <div class="mb-8">
                            <span class="text-4xl font-bold price-val" data-monthly="99" data-yearly="79">$99</span>
                            <span class="text-zinc-500">/mo</span>
                        </div>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Team collaboration
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Custom domains
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Webhooks & API
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Export reports
                            </li>
                        </ul>
                        <button class="w-full py-3 border border-border hover:bg-white/5 rounded-xl text-sm font-bold transition-all">Try Business</button>
                    </div>

                    <!-- Enterprise Plan -->
                    <div class="glass p-8 rounded-[2rem] flex flex-col hover:border-zinc-700 transition-all">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Enterprise</h3>
                            <p class="text-zinc-500 text-sm">Custom solutions for big orgs.</p>
                        </div>
                        <div class="mb-8">
                            <span class="text-4xl font-bold">Custom</span>
                        </div>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Unlimited everything
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> SSO & Advanced security
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> SLA Support
                            </li>
                            <li class="flex items-center gap-3 text-sm text-zinc-300">
                                <i data-lucide="check" class="w-4 h-4 text-accent"></i> Account manager
                            </li>
                        </ul>
                        <button class="w-full py-3 bg-white text-zinc-900 hover:bg-zinc-200 rounded-xl text-sm font-bold transition-all">Contact Sales</button>
                    </div>
                </section>

                <hr class="border-border">

                <!-- Feature Comparison Table -->
                <section class="space-y-12 animate-fade-in">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold font-heading">Compare Plans</h2>
                        <p class="text-zinc-500">Pick the perfect fit for your workflow.</p>
                    </div>
                    
                    <div class="glass rounded-[2rem] overflow-hidden border-border/50">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-white/5 border-b border-border">
                                    <th class="p-6 text-sm font-bold text-zinc-400 uppercase tracking-widest">Features</th>
                                    <th class="p-6 text-sm font-bold">Free</th>
                                    <th class="p-6 text-sm font-bold text-accent">Pro</th>
                                    <th class="p-6 text-sm font-bold">Business</th>
                                    <th class="p-6 text-sm font-bold">Enterprise</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">Monthly Links</td>
                                    <td class="p-6 text-sm">100</td>
                                    <td class="p-6 text-sm font-bold">Unlimited</td>
                                    <td class="p-6 text-sm">Unlimited</td>
                                    <td class="p-6 text-sm">Unlimited</td>
                                </tr>
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">Analytics History</td>
                                    <td class="p-6 text-sm">30 days</td>
                                    <td class="p-6 text-sm font-bold">1 year</td>
                                    <td class="p-6 text-sm">Unlimited</td>
                                    <td class="p-6 text-sm">Unlimited</td>
                                </tr>
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">Custom Domains</td>
                                    <td class="p-6 text-sm">-</td>
                                    <td class="p-6 text-sm font-bold">1</td>
                                    <td class="p-6 text-sm">5</td>
                                    <td class="p-6 text-sm">Unlimited</td>
                                </tr>
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">API Access</td>
                                    <td class="p-6 text-sm">-</td>
                                    <td class="p-6 text-sm font-bold text-accent"><i data-lucide="check" class="w-5 h-5 mx-auto"></i></td>
                                    <td class="p-6 text-sm"><i data-lucide="check" class="w-5 h-5"></i></td>
                                    <td class="p-6 text-sm"><i data-lucide="check" class="w-5 h-5"></i></td>
                                </tr>
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">Webhooks</td>
                                    <td class="p-6 text-sm">-</td>
                                    <td class="p-6 text-sm">-</td>
                                    <td class="p-6 text-sm"><i data-lucide="check" class="w-5 h-5"></i></td>
                                    <td class="p-6 text-sm"><i data-lucide="check" class="w-5 h-5"></i></td>
                                </tr>
                                <tr class="feature-row">
                                    <td class="p-6 text-sm text-zinc-400">Support</td>
                                    <td class="p-6 text-sm">Email</td>
                                    <td class="p-6 text-sm font-bold">Priority</td>
                                    <td class="p-6 text-sm">24/7 Support</td>
                                    <td class="p-6 text-sm">Dedicated AM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Usage / Billing Overview Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 glass p-8 rounded-[2rem] space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold">Billing Overview</h3>
                            <span class="px-3 py-1 bg-white/5 border border-border rounded-lg text-xs font-bold uppercase">Free Plan</span>
                        </div>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-medium mb-1">
                                    <span class="text-zinc-400">Link Usage</span>
                                    <span>84 / 100 links</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="w-[84%] h-full bg-accent"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-medium mb-1">
                                    <span class="text-zinc-400">API Requests</span>
                                    <span>2.1k / 5k reqs</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="w-[42%] h-full bg-accent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass p-8 rounded-[2rem] space-y-6">
                        <h4 class="text-sm font-bold text-zinc-500 uppercase tracking-widest">Next Billing Date</h4>
                        <div>
                            <p class="text-2xl font-bold">June 12, 2026</p>
                            <p class="text-xs text-zinc-500 mt-1">Your plan will automatically renew.</p>
                        </div>
                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-5 bg-zinc-800 rounded flex items-center justify-center">
                                    <div class="w-4 h-2 bg-white/20 rounded-full"></div>
                                </div>
                                <span class="text-sm text-zinc-300">•••• 4242</span>
                            </div>
                            <button class="text-xs font-bold text-accent hover:underline">Update</button>
                        </div>
                    </div>
                </section>

                <!-- Testimonials -->
                <section class="space-y-12">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold font-heading">Trusted by builders</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="glass p-6 rounded-2xl space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500"></div>
                                <div>
                                    <p class="text-sm font-bold">Alex Rivera</p>
                                    <p class="text-[10px] text-zinc-500 uppercase">Founder @ TechFlow</p>
                                </div>
                            </div>
                            <p class="text-zinc-400 text-sm italic">"LinkForge Pro changed how we track our marketing campaigns. The API is flawlessly designed."</p>
                        </div>
                        <div class="glass p-6 rounded-2xl space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-500 to-pink-500"></div>
                                <div>
                                    <p class="text-sm font-bold">Sarah Chen</p>
                                    <p class="text-[10px] text-zinc-500 uppercase">CMO @ Prism</p>
                                </div>
                            </div>
                            <p class="text-zinc-400 text-sm italic">"The QR generator and analytics are worth the Pro price alone. Best-in-class UI."</p>
                        </div>
                        <div class="glass p-6 rounded-2xl space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-500"></div>
                                <div>
                                    <p class="text-sm font-bold">James Wilson</p>
                                    <p class="text-[10px] text-zinc-500 uppercase">Lead Eng @ Stacked</p>
                                </div>
                            </div>
                            <p class="text-zinc-400 text-sm italic">"Enterprise support is top-notch. They helped us migrate 50k links in a weekend."</p>
                        </div>
                    </div>
                </section>

                <!-- FAQ Section -->
                <section class="max-w-3xl mx-auto space-y-8">
                    <h2 class="text-2xl font-bold font-heading text-center">Frequently Asked Questions</h2>
                    <div class="space-y-4">
                        <div class="glass rounded-2xl p-6 cursor-pointer group">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">Can I cancel my subscription at any time?</h4>
                                <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500 group-hover:text-white transition-all"></i>
                            </div>
                            <p class="text-zinc-500 text-sm mt-3 hidden group-active:block">Yes, you can cancel at any time from your settings page. You will maintain access until the end of your billing cycle.</p>
                        </div>
                        <div class="glass rounded-2xl p-6 cursor-pointer group">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">What happens if I exceed my link limit?</h4>
                                <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500 group-hover:text-white transition-all"></i>
                            </div>
                        </div>
                        <div class="glass rounded-2xl p-6 cursor-pointer group">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">Do you offer discounts for non-profits?</h4>
                                <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500 group-hover:text-white transition-all"></i>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Enterprise CTA -->
                <section class="pt-12 pb-24">
                    <div class="glass p-12 rounded-[3rem] text-center space-y-8 bg-gradient-to-br from-accent/10 to-purple-500/10 border-accent/20">
                        <div class="space-y-2">
                            <h2 class="text-3xl font-bold font-heading">Need custom infrastructure?</h2>
                            <p class="text-zinc-400">We support millions of links for the world's largest enterprises.</p>
                        </div>
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                            <button class="px-8 py-3 bg-white text-zinc-900 font-bold rounded-xl hover:bg-zinc-200 transition-all">Contact Sales</button>
                            <button class="px-8 py-3 glass hover:bg-white/5 font-bold rounded-xl transition-all">Schedule Demo</button>
                        </div>
                    </div>
                </section>

@endsection


@push('scripts')

<script src="{{ asset('assets/js/pricing.js') }}"></script>

@endpush