<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: '{{ session('error') }}',
            confirmButtonText: "CERRAR"
        })
    </script>
    @endif
    @if (session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'INFORMACIÓN',
        text: '{{ session('success') }}',
        confirmButtonText: "CERRAR",
    })
    </script>
    @endif
