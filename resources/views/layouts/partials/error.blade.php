<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>
<script>
  @if (Session::has('error'))
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: '{{ Session::get('error') }}',
      })
  @endif

  @if (Session::has('success'))
      Swal.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}',
        position: 'top-end',
        showConfirmButton: false,
        background : '#343a40',
        toast: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
  @endif
  @if (Session::has('info'))
      Swal.fire({
          icon: 'info',
          title: '{{ Session::get('info') }}',
          position: 'top-end',
          showConfirmButton: false,
          background: '#343a40',
          toast: true,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
      })
  @endif
</script>