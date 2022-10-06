@if ($errors->any())
    <script>
        Swal.fire(
            'Oops...',
            'Something went wrong!',
            'error'
        )

    </script>
@endif

@if (session('successMessage'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('successMessage') }}",
            showConfirmButton: false,
            timer: 1500
        })

    </script>
@endif

@if (session('errorMessage'))
    <script>
        Swal.fire(
            'Error',
            "{{ session('errorMessage') }}",
            'error'
        )

    </script>
@endif
