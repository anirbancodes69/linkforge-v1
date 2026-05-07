document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Initialize Lucide
    |--------------------------------------------------------------------------
    */

    lucide.createIcons();

    /*
    |--------------------------------------------------------------------------
    | Mobile Sidebar Toggle
    |--------------------------------------------------------------------------
    */

    const mobileToggle =
        document.getElementById('mobile-toggle');

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebar-overlay');

    function toggleSidebar() {

        if (!sidebar || !overlay) return;

        sidebar.classList.toggle('-translate-x-full');

        overlay.classList.toggle('hidden');
    }

    if (mobileToggle) {

        mobileToggle.addEventListener(
            'click',
            toggleSidebar
        );
    }

    if (overlay) {

        overlay.addEventListener(
            'click',
            toggleSidebar
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    window.logout = async function() {

        try {

            await initCsrf();

            const response = await api('/logout', {
                method: 'POST'
            });

            if (response.message) {

                window.location.href = '/auth/login';
            }

        } catch (error) {

            console.error(error);

            alert('Logout failed');
        }
    };

});