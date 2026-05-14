document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Initialize Lucide
    |--------------------------------------------------------------------------
    */

    lucide.createIcons();

    /*
    |--------------------------------------------------------------------------
    | Global Delete State
    |--------------------------------------------------------------------------
    */

    let deletingLinkId = null;

    /*
    |--------------------------------------------------------------------------
    | Table Selection Logic
    |--------------------------------------------------------------------------
    */

    const masterCheckbox =
        document.getElementById('masterCheckbox');

    const bulkToolbar =
        document.getElementById('bulkActions');

    const selectedCount =
        document.getElementById('selectedCount');

    function bindRowCheckboxes() {

        const rowCheckboxes =
            document.querySelectorAll('.row-checkbox');

        function updateToolbar() {

            const checked = Array.from(rowCheckboxes)
                .filter(c => c.checked).length;

            if (checked > 0) {

                bulkToolbar?.classList.remove('hidden');

                if (selectedCount) {
                    selectedCount.innerText = checked;
                }

            } else {

                bulkToolbar?.classList.add('hidden');
            }
        }

        if (masterCheckbox) {

            masterCheckbox.addEventListener('change', () => {

                rowCheckboxes.forEach(c => {

                    c.checked = masterCheckbox.checked;

                    c.closest('tr')
                        ?.classList.toggle(
                            'bg-accent/5',
                            masterCheckbox.checked
                        );
                });

                updateToolbar();
            });
        }

        rowCheckboxes.forEach(c => {

            c.addEventListener('change', () => {

                c.closest('tr')
                    ?.classList.toggle(
                        'bg-accent/5',
                        c.checked
                    );

                updateToolbar();
            });
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Create / Edit Link
    |--------------------------------------------------------------------------
    */

    const createForm =
        document.getElementById('createLinkForm');

    if (createForm) {

        createForm.addEventListener('submit', async (e) => {

            e.preventDefault();

            const linkId =
                document.getElementById('link_id').value;

            const original_url =
                document.getElementById('original_url').value;

            const custom_alias =
                document.getElementById('custom_alias').value;

            const isEdit = !!linkId;

            const url = isEdit
                ? `/api/links/${linkId}`
                : '/api/links';

            const method = isEdit
                ? 'PUT'
                : 'POST';

            try {

                await initCsrf();

                const response = await api(url, {
                    method,
                    body: JSON.stringify({
                        original_url,
                        custom_alias
                    })
                });

                if (response.success) {

                    showToast(
                        isEdit
                            ? 'Link updated successfully'
                            : 'Link created successfully'
                    );

                    closeModal('createModal');

                    fetchLinks(currentPage);

                } else {

                    showToast(
                        response.message || 'Operation failed',
                        'error'
                    );
                }

            } catch (error) {

                console.error(error);

                showToast(
                    'Something went wrong',
                    'error'
                );
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Links
    |--------------------------------------------------------------------------
    */

    let currentPage = 1;
    let lastPage = 1;

    async function fetchLinks(page = 1) {
        try {

            page = parseInt(page);

            currentPage = page;

            window.history.pushState(
                {},
                '',
                `?page=${page}`
            );

            const response = await api(
                `/api/links?page=${page}&per_page=10`
            );

            lastPage = response.last_page;

            renderLinks(response.data);

            renderPagination(response);

        } catch (error) {

            console.error(error);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Render Links
    |--------------------------------------------------------------------------
    */

    function renderLinks(links) {

        const tableBody =
            document.getElementById('linksTableBody');

        const emptyState =
            document.getElementById('emptyState');

        if (!tableBody) return;

        tableBody.innerHTML = '';

        /*
        |--------------------------------------------------------------------------
        | Empty State
        |--------------------------------------------------------------------------
        */

        if (!links.length) {

            emptyState?.classList.remove('hidden');

            return;
        }

        emptyState?.classList.add('hidden');

        /*
        |--------------------------------------------------------------------------
        | Render Rows
        |--------------------------------------------------------------------------
        */

        links.forEach(link => {

            const shortUrl =
                `${window.location.origin}/${link.custom_alias || link.short_code}`;

            const row = `
                <tr class="hover:bg-white/[0.02] transition-colors group"
                    data-id="${link.id}">

                    

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">

                            <div class="w-8 h-8 rounded-lg bg-zinc-800 flex items-center justify-center">
                                <img
                                    src="https://www.google.com/s2/favicons?domain=${link.original_url}"
                                    class="w-4 h-4"
                                >
                            </div>

                            <div class="flex flex-col">

                                <span class="text-sm font-medium truncate max-w-[200px]">
                                    ${link.custom_alias || 'Untitled'}
                                </span>

                                <span class="text-[10px] text-zinc-500 truncate max-w-[200px]">
                                    ${link.original_url}
                                </span>

                            </div>

                        </div>
                    </td>

                    <td class="px-6 py-4">

                        <a
                            href="${shortUrl}"
                            target="_blank"
                            class="text-sm font-bold text-accent hover:underline"
                        >
                            ${shortUrl}
                        </a>

                    </td>

                    

                    <td class="px-6 py-4 text-center">

                        <span class="text-sm font-medium">
                            ${link.clicks_count}
                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <span class="
                            px-2 py-0.5 rounded-md uppercase
                            text-[10px] font-bold
                            ${link.is_active
                    ? 'bg-emerald-400/10 text-emerald-400'
                    : 'bg-rose-400/10 text-rose-400'}
                        ">
                            ${link.is_active ? 'Active' : 'Inactive'}
                        </span>

                    </td>

                    <td class="px-6 py-4 text-xs text-zinc-500">

                        ${new Date(link.created_at).toLocaleDateString()}

                    </td>

                    <td class="px-6 py-4 text-right">

                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">

                            <a
                                href="${shortUrl}"
                                target="_blank"
                                class="p-2 text-zinc-500 hover:text-white"
                            >
                                <i data-lucide="external-link"
                                   class="w-4 h-4"></i>
                            </a>

                            <button
                                onclick="copyLink('${shortUrl}')"
                                class="p-2 text-zinc-500 hover:text-white"
                            >
                                <i data-lucide="copy"
                                   class="w-4 h-4"></i>
                            </button>

                            <button
                                onclick='openEditModal(${JSON.stringify(link)})'
                                class="p-2 text-zinc-500 hover:text-white"
                            >
                                <i data-lucide="edit-3"
                                   class="w-4 h-4"></i>
                            </button>

                            <button
                                onclick="openDeleteModal(${link.id})"
                                class="p-2 text-zinc-500 hover:text-rose-500"
                            >
                                <i data-lucide="trash-2"
                                   class="w-4 h-4"></i>
                            </button>

                        </div>

                    </td>

                </tr>
            `;

            tableBody.innerHTML += row;
        });

        lucide.createIcons();

        bindRowCheckboxes();
    }

    /*
 |--------------------------------------------------------------------------
 | Render Pagination
 |--------------------------------------------------------------------------
 */

    function renderPagination(data) {
        const container =
            document.getElementById('paginationContainer');

        if (!container) return;

        /*
        |--------------------------------------------------------------------------
        | Hide If No Data
        |--------------------------------------------------------------------------
        */

        if (!data.data.length) {

            container.classList.add('hidden');

            return;
        }

        container.classList.remove('hidden');

        /*
        |--------------------------------------------------------------------------
        | Meta Info
        |--------------------------------------------------------------------------
        */

        document.getElementById('paginationFrom').innerText =
            data.from ?? 0;

        document.getElementById('paginationTo').innerText =
            data.to ?? 0;

        document.getElementById('paginationTotal').innerText =
            data.total ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Prev / Next Buttons
        |--------------------------------------------------------------------------
        */

        const prevBtn =
            document.getElementById('prevPageBtn');

        const nextBtn =
            document.getElementById('nextPageBtn');

        prevBtn.disabled = !data.prev_page_url;

        nextBtn.disabled = !data.next_page_url;

        prevBtn.onclick = () => {

            if (data.prev_page_url) {

                fetchLinks(currentPage - 1);
            }
        };

        nextBtn.onclick = () => {

            if (data.next_page_url) {

                fetchLinks(currentPage + 1);
            }
        };

        /*
        |--------------------------------------------------------------------------
        | Page Numbers
        |--------------------------------------------------------------------------
        */

        const numbersContainer =
            document.getElementById('paginationNumbers');

        numbersContainer.innerHTML = '';

        for (
            let page = 1;
            page <= data.last_page;
            page++
        ) {

            const button =
                document.createElement('button');

            button.innerText = page;

            button.className = `
            w-9
            h-9
            rounded-xl
            text-sm
            font-bold
            transition-all
            ${page === currentPage
                    ? 'bg-accent text-white'
                    : 'glass text-zinc-400 hover:text-white'}
        `;

            button.onclick = () => {

                currentPage = page;

                fetchLinks(page);
            };

            numbersContainer.appendChild(button);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Copy Link
    |--------------------------------------------------------------------------
    */

    window.copyLink = async function (url) {

        try {

            await navigator.clipboard.writeText(url);

            showToast('Short link copied');

        } catch (error) {

            console.error(error);

            showToast(
                'Failed to copy link',
                'error'
            );
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Open Create Modal
    |--------------------------------------------------------------------------
    */

    window.openCreateModal = function() {

        document.getElementById('createLinkForm').reset();

        document.getElementById('link_id').value = '';

        document.getElementById('modalTitle').innerText =
            'Create Short Link';

        document.getElementById('submitButton').innerText =
            'Create Link';

        openModal('createModal');
    };

    /*
    |--------------------------------------------------------------------------
    | Open Edit Modal
    |--------------------------------------------------------------------------
    */

    window.openEditModal = function(link) {

        document.getElementById('link_id').value =
            link.id;

        document.getElementById('original_url').value =
            link.original_url;

        document.getElementById('custom_alias').value =
            link.custom_alias || '';

        document.getElementById('modalTitle').innerText =
            'Edit Link';

        document.getElementById('submitButton').innerText =
            'Update Link';

        openModal('createModal');
    };

    /*
    |--------------------------------------------------------------------------
    | Open Delete Modal
    |--------------------------------------------------------------------------
    */

    window.openDeleteModal = function(id) {

        deletingLinkId = id;

        openModal('deleteModal');
    };

    /*
    |--------------------------------------------------------------------------
    | Confirm Delete
    |--------------------------------------------------------------------------
    */

    window.confirmDelete = async function() {

        if (!deletingLinkId) return;

        try {

            const response = await api(
                `/api/links/${deletingLinkId}`,
                {
                    method: 'DELETE'
                }
            );

            if (response.success) {

                closeModal('deleteModal');

                showToast(
                    'Link deleted successfully'
                );

                fetchLinks(currentPage);
            }

        } catch (error) {

            console.error(error);

            showToast(
                'Failed to delete link',
                'error'
            );
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Modal Helpers
    |--------------------------------------------------------------------------
    */

    window.openModal = function(id) {

        const modal = document.getElementById(id);

        if (!modal) return;

        modal.classList.remove('hidden');

        lucide.createIcons();
    };

    window.closeModal = function(id) {

        const modal = document.getElementById(id);

        if (!modal) return;

        modal.classList.add('hidden');
    };

    /*
    |--------------------------------------------------------------------------
    | Toast Notifications
    |--------------------------------------------------------------------------
    */

    window.showToast = function(
        message,
        type = 'success'
    ) {

        const container =
            document.getElementById('toastContainer');

        if (!container) return;

        const toast =
            document.createElement('div');

        const variants = {

            success:
                'border-emerald-500/30 bg-emerald-500/10 text-emerald-400',

            error:
                'border-rose-500/30 bg-rose-500/10 text-rose-400',

            info:
                'border-blue-500/30 bg-blue-500/10 text-blue-400',
        };

        toast.className = `
            glass
            border
            ${variants[type]}
            px-5
            py-4
            rounded-2xl
            text-sm
            font-medium
            shadow-2xl
            backdrop-blur-xl
            transition-all
            duration-300
            translate-x-10
            opacity-0
        `;

        toast.innerHTML = `
            <div class="flex items-center gap-3">
                <span>${message}</span>
            </div>
        `;

        container.appendChild(toast);

        requestAnimationFrame(() => {

            toast.classList.remove(
                'translate-x-10',
                'opacity-0'
            );
        });

        setTimeout(() => {

            toast.classList.add(
                'translate-x-10',
                'opacity-0'
            );

            setTimeout(() => {

                toast.remove();

            }, 300);

        }, 3000);
    };

    /*
    |--------------------------------------------------------------------------
    | Initial Fetch
    |--------------------------------------------------------------------------
    */

    const params =
        new URLSearchParams(window.location.search);

    const page =
        params.get('page') || 1;

    fetchLinks(page);

});

{/* <td class="px-6 py-4">
    <input
        type="checkbox"
        class="row-checkbox rounded border-zinc-700 bg-zinc-900 text-accent"
    >
</td> */}

{/* <td class="px-6 py-4">

    <button
        onclick="openModal('qrModal')"
        class="p-1.5 bg-white/5 rounded-lg hover:bg-white/10 transition-all"
    >
        <i data-lucide="qr-code"
            class="w-4 h-4 text-zinc-400"></i>
    </button>

</td> */}