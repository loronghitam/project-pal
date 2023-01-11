{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let donate;

    const create = () => {
        $(".dropify-clear").click();
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#createSubmit').click(function(e) {
            e.preventDefault();
            var formData = new FormData($("#createForm")[0]);
            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "post",
                url: "/donate",
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.close();
                    if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )
                        $('#createModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            response.msg,
                            'warning'
                        )
                    }
                }
            });
        });
    });
</script>
