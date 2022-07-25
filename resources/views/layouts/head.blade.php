<!-- Title -->
<title>{{__('admin.adminDasboard')}}</title>

<!-- Favicon -->
{{-- <link rel="shortcut icon" href="{{ URL::asset('admin/assets/images/favicon.ico') }}" type="image/x-icon" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    {{-- Summernote CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    {{-- Select2 Style CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('admin/assets/css/style.css') }}" rel="stylesheet">

<!--- Style aos -->
<link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

{{-- toogle --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'ar')
    <link href="{{ URL::asset('admin/assets/css/rtl.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('admin/assets/css/ltr.css') }}" rel="stylesheet">
@endif

@yield('styles')