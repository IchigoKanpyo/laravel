<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>テスト</title>
    </head>
    <body>
        <div id="tes"></div>
        <script src="{{ mix('js/test.js') }}"></script>
    </body>
</html>