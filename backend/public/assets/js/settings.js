        // Initialize Icons
        lucide.createIcons();

        const saveBar = document.getElementById('saveBar');
        const saveBtn = document.getElementById('saveBtn');

        function showSaveBar() {
            saveBar.classList.add('save-bar-active');
        }

        function hideSaveBar() {
            saveBar.classList.remove('save-bar-active');
        }

        function saveChanges() {
            saveBtn.innerHTML = `<div class="w-4 h-4 border-2 border-white/20 border-t-white rounded-full animate-spin"></div>`;
            setTimeout(() => {
                saveBtn.innerHTML = 'Saved Successfully!';
                saveBtn.classList.replace('bg-accent', 'bg-emerald-600');
                setTimeout(() => {
                    hideSaveBar();
                    saveBtn.innerHTML = 'Save Changes';
                    saveBtn.classList.replace('bg-emerald-600', 'bg-accent');
                }, 2000);
            }, 1000);
        }

        // Dropdown interactions or mock sidebar behavior can be added here