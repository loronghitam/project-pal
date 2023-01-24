<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script>
    $(function () {
        $('#createImage').dropify({
            messages: {
                'default': 'Masukan CV atau Resume Anda',
                'replace': 'Drag and drop atau click untuk mengganti',
                'remove': 'Remove',
                'error': 'File yang dimasukan hanya pdf atau word saja'
            }
        });
        $('.dropify-clear').click();
    });
</script>
