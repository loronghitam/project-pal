<script>
    let donate;

    const create = () => {
        $('#createForm').trigger('reset');
        $('#body').summernote({
            placeholder: 'Deskripsi',
            height: 300
        });
        $('#body').summernote('reset');

        $(".dropify-clear").click();
        $('#createModal').modal('show');
    }

    const edit = (id) => {
        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });
        donate = id;

        $.ajax({
            type: "get",
            url: `/joinuslist/${donate}`,
            dataType: "json",
            success: function (response) {
                $('#name-edit').val(response.name);
                $('#phone-edit').val(response.phone);
                $('#image-edit').val(response.image);
                $('#status-edit').val(response.status);
                $('#email-edit').val(response.email);
                $('#motivation-edit').val(response.motivation);
                $('#image-edit').attr('src', '{{ asset('images/donate') }}/' + response.image);
                Swal.close();

                $('#editModal').modal('show');
            }
        });
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus Berita ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            Swal.close();

            if (result.value) {
                Swal.fire({
                    title: 'Mohon tunggu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/joinuslist/${id}`,
                    dataType: "json",
                    success: function (response) {
                        Swal.close();
                        if (response.status) {
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )
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
            }
        });
    }
    $(function () {
        $('#body-edit').summernote();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#createSubmit').click(function (e) {
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
                url: "/joinuslist",
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
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
                        $('#createError').html("<div class='alert alert-danger alert-dismissible' role='alert'> " + data.msg + " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' id='error-close'></button></div>")
                        setTimeout(function () {
                            $('#error-close').trigger('click');
                        }, 5000)
                    }
                }
            });
        });

        $('#editSubmit').click(function (e) {
            e.preventDefault();

            var formData = new FormData($('#editForm')[0]);

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
                url: `/joinuslist/${donate}`,
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    Swal.close();
                    if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        $('#editModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    } else {
                        $('#editError').html("<div class='alert alert-danger alert-dismissible' role='alert'> " + data.msg + " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' id='error-close'></button></div>")
                        setTimeout(function () {
                            $('#error-close').trigger('click');
                        }, 5000)
                    }
                }
            })
        });

        $('#table').DataTable({
            dom: 'Bfrtip',
            // Configure the drop down options.
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength', 'excel', 'pdf', 'print'
            ],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '/joinuslist/all'
            },
            "columns": [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
                {
                    data: 'updated_at',

                },
                {
                    data: 'name',

                },
                {
                    data: 'email',

                },
                {
                    data: 'phone',

                },
                {
                    data: 'program',

                },
                {
                    data: 'status',

                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
