 // Initialize Icons
        lucide.createIcons();

        // Copy function
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            // Optional: Add a toast notification here
        }

        // Mock interaction for playground send button
        document.addEventListener('DOMContentLoaded', () => {
            Prism.highlightAll();
        });