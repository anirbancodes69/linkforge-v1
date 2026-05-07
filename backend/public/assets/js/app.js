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

    function initSidebarToggle() {
        const mobileToggle = document.querySelector('#mobile-toggle');
        const sidebar = document.querySelector('#sidebar');
        const overlay = document.querySelector('#sidebar-overlay');

        if (!mobileToggle || !sidebar || !overlay) {
            return;
        }

        let sidebarOpen = false;

        function toggleSidebar(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            sidebarOpen = !sidebarOpen;
            
            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            }
        }

        mobileToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    }

    initSidebarToggle();

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