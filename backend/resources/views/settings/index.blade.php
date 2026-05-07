@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/settings.css') }}">

@endpush

@section('content')

    <!-- Settings Header -->
                <div class="flex flex-col gap-1">
                    <h1 class="text-3xl font-bold font-heading">Settings</h1>
                    <p class="text-zinc-500 text-sm">Manage your account preferences and workspace settings.</p>
                </div>

                <!-- Profile Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-1">Profile Information</h3>
                        <p class="text-sm text-zinc-500">Update your photo and personal details.</p>
                    </div>
                    <div class="lg:col-span-2 glass p-8 rounded-[2rem] space-y-6">
                        <div class="flex items-center gap-6">
                            <div class="relative group">
                                <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-accent to-purple-600 flex items-center justify-center text-2xl font-bold border-4 border-white/5">
                                    JD
                                </div>
                                <button class="absolute -bottom-2 -right-2 p-2 bg-accent rounded-lg border-2 border-background shadow-xl hover:scale-110 transition-transform">
                                    <i data-lucide="camera" class="w-4 h-4 text-white"></i>
                                </button>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold mb-1 text-zinc-200">Profile Photo</h4>
                                <p class="text-xs text-zinc-500">PNG, JPG or GIF. Max 2MB.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Full Name</label>
                                <input type="text" value="John Doe" class="w-full px-4 py-2.5 rounded-xl text-sm" oninput="showSaveBar()">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Username</label>
                                <input type="text" value="johndoe_forge" class="w-full px-4 py-2.5 rounded-xl text-sm" oninput="showSaveBar()">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Email Address</label>
                            <input type="email" value="john@linkforge.io" class="w-full px-4 py-2.5 rounded-xl text-sm" oninput="showSaveBar()">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Bio</label>
                            <textarea rows="3" class="w-full px-4 py-2.5 rounded-xl text-sm resize-none" oninput="showSaveBar()">Product Designer & Link Management Enthusiast.</textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Timezone</label>
                            <select class="w-full px-4 py-2.5 rounded-xl text-sm appearance-none" onchange="showSaveBar()">
                                <option>Pacific Time (US & Canada)</option>
                                <option>Central Time (US & Canada)</option>
                                <option selected>Eastern Time (US & Canada)</option>
                                <option>UTC / GMT</option>
                            </select>
                        </div>
                    </div>
                </section>

                <hr class="border-border">

                <!-- Security Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-1">Security</h3>
                        <p class="text-sm text-zinc-500">Protect your account with high-grade security.</p>
                    </div>
                    <div class="lg:col-span-2 space-y-6">
                        <div class="glass p-8 rounded-[2rem] space-y-6">
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2 relative">
                                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">New Password</label>
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl text-sm">
                                        <i data-lucide="eye" class="w-4 h-4 absolute right-4 bottom-3 text-zinc-500 cursor-pointer"></i>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Confirm Password</label>
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl text-sm">
                                    </div>
                                </div>
                                <div class="h-1 w-full bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full w-2/3 bg-gradient-to-r from-amber-500 to-emerald-500"></div>
                                </div>
                                <p class="text-[10px] text-zinc-500">Password strength: <span class="text-emerald-500">Strong</span></p>
                            </div>

                            <div class="pt-6 border-t border-border flex items-center justify-between">
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-accent/10 flex items-center justify-center text-accent">
                                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold">Two-Factor Authentication</h4>
                                        <p class="text-xs text-zinc-500">Add an extra layer of security to your account.</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                    <input type="checkbox" name="toggle" id="2fa" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-zinc-600 border-4 border-transparent appearance-none cursor-pointer transition-all duration-300"/>
                                    <label for="2fa" class="toggle-label block overflow-hidden h-5 rounded-full bg-zinc-800 cursor-pointer transition-all duration-300"></label>
                                </div>
                            </div>
                        </div>

                        <!-- Sessions List -->
                        <div class="glass p-8 rounded-[2rem] space-y-4">
                            <h4 class="text-sm font-bold">Active Sessions</h4>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <i data-lucide="monitor" class="w-5 h-5 text-zinc-400"></i>
                                        <div>
                                            <p class="text-xs font-bold">Chrome on macOS (Current)</p>
                                            <p class="text-[10px] text-zinc-500">San Francisco, US • 192.168.1.1</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] px-2 py-1 bg-emerald-500/10 text-emerald-500 rounded-lg font-bold uppercase">Active</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <i data-lucide="smartphone" class="w-5 h-5 text-zinc-400"></i>
                                        <div>
                                            <p class="text-xs font-bold">iOS LinkForge App</p>
                                            <p class="text-[10px] text-zinc-500">San Francisco, US • 2 days ago</p>
                                        </div>
                                    </div>
                                    <button class="text-[10px] font-bold text-danger hover:underline">Revoke</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="border-border">

                <!-- Notifications Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-1">Notifications</h3>
                        <p class="text-sm text-zinc-500">Control how we communicate with you.</p>
                    </div>
                    <div class="lg:col-span-2 glass p-8 rounded-[2rem] space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-semibold">Email Notifications</h4>
                                    <p class="text-xs text-zinc-500">Receive system alerts via email.</p>
                                </div>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                    <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-zinc-600 border-4 border-transparent appearance-none cursor-pointer transition-all duration-300"/>
                                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-zinc-800 cursor-pointer transition-all duration-300"></label>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-semibold">QR Scan Alerts</h4>
                                    <p class="text-xs text-zinc-500">Notify me immediately when a QR code is scanned.</p>
                                </div>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                    <input type="checkbox" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-zinc-600 border-4 border-transparent appearance-none cursor-pointer transition-all duration-300"/>
                                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-zinc-800 cursor-pointer transition-all duration-300"></label>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-semibold">Weekly Analytics Reports</h4>
                                    <p class="text-xs text-zinc-500">Get a summary of your link performance every Monday.</p>
                                </div>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                    <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-zinc-600 border-4 border-transparent appearance-none cursor-pointer transition-all duration-300"/>
                                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-zinc-800 cursor-pointer transition-all duration-300"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="border-border">

                <!-- API Management Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-1">API Management</h3>
                        <p class="text-sm text-zinc-500">Connect LinkForge to your existing stack.</p>
                    </div>
                    <div class="lg:col-span-2 glass p-8 rounded-[2rem] space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-bold">API Keys</h4>
                            <button class="px-4 py-2 bg-accent hover:bg-accent/90 text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                                <i data-lucide="plus" class="w-4 h-4"></i> Create New Key
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-white/5 border border-border rounded-xl">
                                <div class="flex items-center gap-4">
                                    <div class="p-2 bg-background rounded-lg"><i data-lucide="key" class="w-4 h-4 text-accent"></i></div>
                                    <div>
                                        <p class="text-xs font-bold">Production_Key_01</p>
                                        <p class="text-[10px] text-zinc-500 tracking-wider">lf_live_••••••••••••••••</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="text-[10px] text-zinc-500">Created 4 months ago</span>
                                    <button class="p-2 hover:bg-white/10 rounded-lg text-danger"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="border-border">

                <!-- Team/Workspace Section -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-1">Workspace Members</h3>
                        <p class="text-sm text-zinc-500">Manage your team and their permissions.</p>
                    </div>
                    <div class="lg:col-span-2 glass p-8 rounded-[2rem]">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-white/5 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                                    <tr>
                                        <th class="px-4 py-3 rounded-tl-xl">Member</th>
                                        <th class="px-4 py-3">Role</th>
                                        <th class="px-4 py-3 rounded-tr-xl text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border">
                                    <tr>
                                        <td class="px-4 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-[10px] font-bold">JD</div>
                                                <div>
                                                    <p class="text-xs font-bold">John Doe (You)</p>
                                                    <p class="text-[10px] text-zinc-500">john@linkforge.io</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <span class="px-2 py-0.5 bg-accent/10 text-accent text-[10px] font-bold rounded-lg uppercase">Owner</span>
                                        </td>
                                        <td class="px-4 py-4 text-right">
                                            <i data-lucide="more-horizontal" class="w-4 h-4 text-zinc-500 cursor-pointer ml-auto"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-[10px] font-bold">SM</div>
                                                <div>
                                                    <p class="text-xs font-bold">Sarah Miller</p>
                                                    <p class="text-[10px] text-zinc-500">sarah@linkforge.io</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <select class="bg-transparent border-none text-[10px] font-bold uppercase text-zinc-400">
                                                <option>Admin</option>
                                                <option selected>Editor</option>
                                                <option>Viewer</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-4 text-right">
                                            <button class="text-danger hover:underline text-[10px] font-bold uppercase">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="mt-6 w-full py-3 border border-dashed border-border rounded-xl text-xs text-zinc-500 hover:text-white hover:border-accent transition-all flex items-center justify-center gap-2">
                            <i data-lucide="user-plus" class="w-4 h-4"></i> Invite New Member
                        </button>
                    </div>
                </section>

                <hr class="border-border">

                <!-- Danger Zone -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold text-danger mb-1">Danger Zone</h3>
                        <p class="text-sm text-zinc-500">Irreversible actions for your account.</p>
                    </div>
                    <div class="lg:col-span-2 glass border-danger/20 p-8 rounded-[2rem] space-y-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-bold">Deactivate Account</h4>
                                <p class="text-xs text-zinc-500">Permanently remove all your data and links.</p>
                            </div>
                            <button class="px-4 py-2 bg-danger/10 hover:bg-danger text-danger hover:text-white rounded-xl text-xs font-bold transition-all">
                                Delete Everything
                            </button>
                        </div>
                        <div class="flex items-center justify-between pt-6 border-t border-border">
                            <div>
                                <h4 class="text-sm font-bold">Export All Data</h4>
                                <p class="text-xs text-zinc-500">Download a JSON/CSV of all your historical analytics.</p>
                            </div>
                            <button class="px-4 py-2 bg-white/5 hover:bg-white/10 text-zinc-300 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                                <i data-lucide="download" class="w-4 h-4"></i> Export Data
                            </button>
                        </div>
                    </div>
                </section>

@endsection


@push('scripts')

<script src="{{ asset('assets/js/settings.js') }}"></script>

@endpush