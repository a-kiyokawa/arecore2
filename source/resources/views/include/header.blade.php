<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>Laravel-test</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google Tag Manager -->

        <!-- End Google Tag Manager -->

        
        <!-- favicon tag 挿入 -->
        <link rel="icon" href="/images/favicon.ico">
        <link rel="icon" href="/images/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" id="apple-touch-icon" />
        <!-- //favicon tag 挿入 -->
        
        <title>Laravel-test</title>
        {{-- IE対応 --}}
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keyword')">

        <!-- OGT tag 挿入 -->
        <meta property="og:url" content="">
        <meta property="og:title" content="Laravel-test">
        <meta property="og:image" content="/images/logo.svg">
        <meta property="og:type" content="article">
        <meta property="og:site_name" content="">
        <!-- //OGT tag 挿入 -->

        <!-- NOINDEX tag 挿入 -->
        <meta name="robots" content="noindex">
        <!-- //NOINDEX tag 挿入 -->
        

        <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
</head>

        <body id="@yield('pageId')" class="@yield('pageClass')">
            {{-- <div id="wrap">
                <div id="content"> --}}