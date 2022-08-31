<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
    {{ config('app.name', 'Laravel') }}
    @if (isset($subTitle) === true)
        | {{ $subTitle }}
    @endif
    - Derive Point
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/css/common.css') }}">
</head>
<body>

<header class="cmn-header">
    <div class="h-inner">
        <div class="h-logo">
            <a href="{{ url('/') }}">Derive Point<strong>{{ config('app.name', 'Laravel') }}</strong></a>
        </div>
    </div>
</header>