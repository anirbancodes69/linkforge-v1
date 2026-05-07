   // Initialize Icons
        lucide.createIcons();

        // Billing Toggle Logic
        const billingToggle = document.getElementById('billingToggle');
        const prices = document.querySelectorAll('.price-val');

        billingToggle.addEventListener('change', () => {
            prices.forEach(price => {
                const isYearly = billingToggle.checked;
                price.textContent = isYearly ? `$${price.dataset.yearly}` : `$${price.dataset.monthly}`;
                
                // Animate change
                price.classList.add('scale-110', 'text-accent');
                setTimeout(() => price.classList.remove('scale-110', 'text-accent'), 200);
            });
        });

        // FAQ Toggle Logic
        document.querySelectorAll('.glass.cursor-pointer').forEach(item => {
            item.addEventListener('click', () => {
                const p = item.querySelector('p');
                if (p) p.classList.toggle('hidden');
                item.querySelector('i').classList.toggle('rotate-180');
            });
        });