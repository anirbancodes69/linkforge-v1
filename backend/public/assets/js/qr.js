 // Initialize Lucide Icons
        lucide.createIcons();

        // QR Code Logic
        const qrContainer = document.getElementById("qrcode");
        const qrInput = document.getElementById("qrInput");
        const fgColorInput = document.getElementById("fgColor");
        const bgColorInput = document.getElementById("bgColor");
        const qrType = document.getElementById("qrType");

        let qrcode = new QRCode(qrContainer, {
            text: qrInput.value,
            width: 180,
            height: 180,
            colorDark : "#6366f1",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        function updateQR() {
            const val = qrInput.value;
            const fg = fgColorInput.value;
            const bg = bgColorInput.value;

            // Clear previous
            qrContainer.innerHTML = "";
            
            // Generate New
            qrcode = new QRCode(qrContainer, {
                text: val || "LinkForge",
                width: 180,
                height: 180,
                colorDark : fg,
                colorLight : bg,
                correctLevel : QRCode.CorrectLevel.H
            });
        }

        // Event Listeners for Live Preview
        qrInput.addEventListener("input", updateQR);
        fgColorInput.addEventListener("input", updateQR);
        bgColorInput.addEventListener("input", updateQR);
        qrType.addEventListener("change", () => {
            // Update placeholder based on type
            const placeholders = {
                url: "https://linkforge.li/summer-campaign",
                text: "Enter your custom message here...",
                email: "hello@linkforge.li",
                wifi: "WIFI:S:NetworkName;P:Password;;",
                whatsapp: "https://wa.me/123456789"
            };
            qrInput.value = placeholders[qrType.value];
            updateQR();
        });