@extends('Admin.Layout.app')

@section('content')
    {{--    <embed src="{{ (asset('file/1673174378.pdf')) }}"--}}
    {{--           type="application/pdf"--}}
    {{--           width="800px"--}}
    {{--           height="2100px"/>--}}
    <iframe id="pdf-js-viewer" src="{{ (asset('file/1673174378.pdf')) }}" title="webviewer"
            frameborder="0" width="500" height="600"></iframe>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.2.146/pdf.min.js"
            integrity="sha512-hA0/Bv8+ywjnycIbT0xuCWB1sRgOzPmksIv4Qfvqv0DOKP02jSor8oHuIKpweUCsxiWGIl+QaV0E82mPQ7/gyw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
