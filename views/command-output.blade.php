<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Development Kit') }} | Command Output</title>
    <style>
        .text-style {
            font-weight: bold;
            font-size: 20px;
            color: green;
        }
    </style>
</head>
<body>
<div>
    <h1 style="text-align: center;">OUTPUT</h1>
    <hr>
    @if(is_array($output))
        <pre class="text-style">{{ var_export($output, true) }}</pre>
    @else
        <pre class="text-style">{{ $output }}</pre>
    @endif
    <hr>
</div>
</body>
</html>