<?php
$id = session()->get('admin_id');
//if ($id > 0) {
if (empty($id)) {
    header("Location: " . url('wh-admin') . "");
    exit();
}
?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">


    <link rel="stylesheet" href="{{asset('admin/fonts/open-sans/style.min.css')}}"> <!-- common font  styles  -->
    <link rel="stylesheet" href="{{asset('admin/fonts/universe-admin/style.css')}}">
    <!-- universeadmin icon font styles -->
    <link rel="stylesheet" href="{{asset('admin/fonts/mdi/css/materialdesignicons.min.css')}}">
    <!-- meterialdesignicons -->
    <link rel="stylesheet" href="{{asset('admin/fonts/iconfont/style.css')}}"> <!-- DEPRECATED iconmonstr -->
    <link rel="stylesheet" href="{{asset('admin/vendor/flatpickr/flatpickr.min.css')}}">
    <!-- original flatpickr plugin (datepicker) styles -->
    <link rel="stylesheet" href="{{asset('admin/vendor/simplebar/simplebar.css')}}">
    <!-- original simplebar plugin (scrollbar) styles  -->
    <link rel="stylesheet" href="{{asset('admin/vendor/tagify/tagify.css')}}"> <!-- styles for tags -->
    <link rel="stylesheet" href="{{asset('admin/vendor/tippyjs/tippy.css')}}">
    <!-- original tippy plugin (tooltip) styles -->
    <link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.min.css')}}">
    <!-- original select2 plugin styles -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- original bootstrap styles -->
    <link rel="stylesheet" href="{{asset('admin/css/style.min.css')}}" id="stylesheet"> <!-- universeadmin styles -->

    <style>
        html, body {
            overflow: initial !important;
        }

        .modal-footer {
            justify-content: center;
        }

        table {
            display: block;
            overflow-x: auto;
        }

        table thead {
            white-space: nowrap;
        }

        .single_session {
            border: 1px solid lightgray;
            padding: 10px;
        }
        .single_session h3{
            text-align: center
        }
    </style>

    <script src="{{asset('admin/js/ie.assign.fix.min.js')}}"></script>
</head>