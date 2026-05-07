<!DOCTYPE html>
<html lang="en" class="dark">

@include('partials.head')

<body class="overflow-hidden">

    <div id="sidebar-overlay"
         class="fixed inset-0 bg-black/60 z-40 hidden md:hidden backdrop-blur-sm">
    </div>

    <div class="flex h-screen overflow-hidden">

        @include('partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0 bg-background overflow-hidden">

            @include('partials.navbar')

            <main class="flex-1 overflow-y-auto p-4 md:p-8 custom-scrollbar">

                @yield('content')

            </main>

        </div>
    </div>

    <!-- Global Create/Edit Modal -->
    <div id="createModal"
         class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">

        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"
             onclick="closeModal('createModal')"></div>

        <div class="glass w-full max-w-xl rounded-[2rem] p-8 modal-enter relative shadow-2xl">

            <h2 id="modalTitle"
                class="text-2xl font-bold mb-1">
                Create Short Link
            </h2>

            <p class="text-zinc-500 text-sm mb-8">
                Setup your destination URL and custom alias.
            </p>

            <form id="createLinkForm" class="space-y-6">

                <input type="hidden" id="link_id">

                <!-- Destination URL -->
                <div>

                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                        Destination URL
                    </label>

                    <input
                        id="original_url"
                        type="text"
                        placeholder="https://very-long-url.com/campaign-2026"
                        class="w-full bg-background border border-border rounded-2xl px-5 py-4 text-sm focus:outline-none focus:border-accent transition-all"
                    >

                </div>

                <!-- Alias -->
                <div>

                    <label class="block text-[10px] font-bold text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                        Custom Alias
                    </label>

                    <input
                        id="custom_alias"
                        type="text"
                        placeholder="my-custom-slug"
                        class="w-full bg-background border border-border rounded-2xl px-5 py-4 text-sm focus:outline-none focus:border-accent transition-all"
                    >

                </div>

                <!-- Actions -->
                <div class="flex gap-4 mt-8">

                    <button
                        type="button"
                        onclick="closeModal('createModal')"
                        class="flex-1 py-4 text-sm font-bold glass rounded-2xl hover:bg-white/10 transition-all"
                    >
                        Cancel
                    </button>

                    <button
                        id="submitButton"
                        type="submit"
                        class="flex-1 py-4 text-sm font-bold bg-accent text-white rounded-2xl shadow-lg shadow-accent/20 hover:scale-[1.02] active:scale-[0.98] transition-all"
                    >
                        Create Link
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Global Delete Modal -->
    <div id="deleteModal"
         class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">

        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"
             onclick="closeModal('deleteModal')"></div>

        <div class="glass w-full max-w-sm rounded-[2rem] p-8 modal-enter relative text-center">

            <div class="w-16 h-16 bg-rose-500/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i data-lucide="alert-triangle"
                   class="text-rose-500 w-8 h-8"></i>
            </div>

            <h2 class="text-xl font-bold mb-2">
                Delete Link?
            </h2>

            <p class="text-zinc-500 text-sm mb-8 leading-relaxed">
                This action is permanent and will delete all associated analytics.
            </p>

            <div class="flex gap-4">

                <button
                    onclick="closeModal('deleteModal')"
                    class="flex-1 py-3 text-sm font-bold glass rounded-2xl"
                >
                    Cancel
                </button>

                <button
                    onclick="confirmDelete()"
                    class="flex-1 py-3 text-sm font-bold bg-rose-600 text-white rounded-2xl hover:bg-rose-700 transition-all"
                >
                    Delete
                </button>

            </div>

        </div>

    </div>

    <!-- Toast Container -->
    <div
        id="toastContainer"
        class="fixed top-6 right-6 z-[9999] flex flex-col gap-3"
    ></div>

    <script src="{{ asset('assets/js/api.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>