{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let join;
    const details = (id) => {
        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });
        join = id;
        $.ajax({
            type: "get",
            url: `/bergabung/${join}`,
            dataType: "json",
            success: function(response) {
                $('.modal-title').text(response.title);
                $('#body').text(response.body);
                $('#image').attr('src', '{{asset("images/joinus")}}/' + response.image);
                Swal.close();
                $('#detailModal').modal('show');
            }
        });
    }

    const create = () => {
        $.ajax({
            type: "get",
            url: `/bergabung/${join}`,
            dataType: "json",
            success: function(response) {
                $('#program').val(response.id);
            }
        });
        $('#createModal').modal('show');
        $('#program').text(join);
        $(".dropify-clear").click();
        $('#createForm').trigger('reset');
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
                url: "/bergabung",
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
                        $('#detailModalModal').modal('hide');
                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            });
        });
    });
</script>
