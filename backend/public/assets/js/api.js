async function initCsrf() {

    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
}

async function api(url, options = {}) {

    const response = await fetch(url, {

        credentials: 'include',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .content,
        },

        ...options
    });

    return response.json();
}