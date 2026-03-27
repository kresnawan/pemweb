@props([
    'title' => 'Log Keuangan'
])

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="A brief description of the page content.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <style>
            a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <h1 class="text-12">Log Keuangan</h1>
        <div>
            <a href="/">
                <button>Tampilkan semua data</button>
            </a>
            <a href="/tambah">
                <button>Tambah data</button>
            </a>
        </div>
        {{ $slot }}
    </body>
</html>
