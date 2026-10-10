<script src="{{ asset("template/vendors/popper/popper.min.js")}}"></script>
<script src="{{ asset("template/vendors/bootstrap/bootstrap.min.js")}}"></script>
<script src="{{ asset("template/vendors/anchorjs/anchor.min.js")}}"></script>
<script src="{{ asset("template/vendors/is/is.min.js")}}"></script>
<script src="{{ asset("template/vendors/fontawesome/all.min.js")}}"></script>
<script src="{{ asset("template/vendors/lodash/lodash.min.js")}}"></script>
<script src="{{ asset("template/vendors/list.js/list.min.js")}}"></script>
<script src="{{ asset("template/vendors/feather-icons/feather.min.js")}}"></script>
<script src="{{ asset("template/vendors/dayjs/dayjs.min.js")}}"></script>
<script src="{{ asset("template/assets/js/phoenix.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showAlert(type, message) {
        if (!message) return;
        let title = 'Informasi';
        if (type === 'success') title = 'Berhasil!';
        if (type === 'error') title = 'Oops!';
        if (type === 'warning') title = 'Peringatan!';
        if (type === 'info') title = 'Informasi';

        Swal.fire({
            title: title,
            text: message,
            icon: type
        });
    }

    function autoShowSessionAlert(sessionData) {
        if (!sessionData) return;
        Object.entries(sessionData).forEach(([type, msg]) => {
            if (msg) {
                showAlert(type, msg);
            }
        });
    }

    function autoHideAlert(selector = '.alert-invalid', delay = 5000) {
        const alerts = document.querySelectorAll(selector);
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 200);
            }, delay);
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        autoHideAlert('.alert-invalid', 5000);
    });

    function confirmDelete(url, button = null) {
        Swal.fire({
            title: "Hapus Data",
            text: "Apakah Anda yakin ingin menghapus data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                if (button) {
                    button.setAttribute('disabled', 'disabled');
                    button.innerHTML = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>';
                }

                const form = document.getElementById('delete-form');
                form.action = url;
                form.submit();
            }
        });
    }
</script>
<script src="{{ asset('template/vendors/flatpickr/flatpickr.min.js') }}"></script>