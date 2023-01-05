<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/jquery-ui.min.css">
        <link rel="stylesheet" href="/css/tailwind.css">
        <link rel="stylesheet" href="/css/app.css">
        <title>テスト</title>
    </head>
    <body>
        <h1>Top</h1>
        <div id="app">
            <index/>
        </div>
        <script src="{{ mix('js/top/app.js') }}"></script>
    </body>
</html>