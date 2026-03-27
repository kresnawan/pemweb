@props([
    'title' => 'Log Keuangan',
    'header' => 'Log Keuangan'
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
        <style>
            body {
                width: inherit;
            }
            .wrapper {
                margin-left: 30px;
            }

            .section {
                margin-top: 20px;
            }

            .is-first-section {
                margin-top: 0;
            }

            .btn {
                padding: 5px 10px;
                cursor: pointer;
            }

            .slct {
                padding: 5px 10px;
            }

            .alert-txt {
                font-size: 15px;
                font-style: italic;
                margin-top: 12px
            }

            .is-success {
                color: green;
            }

            .is-failed {
                color: red;
            }
        </style>
    </head>
    <body>

        <div class="wrapper">

            <div>
                <div>
                <h1>Log Keuangan</h1>

                <h3>{{ $header }}</h3>
                <div>
                    <?php if ($_SERVER["REQUEST_URI"] == "/"): ?>
                    <a href="/tambah">
                        <button class="btn">Tambah data</button>
                    </a>

                    <?php else: ?>
                    <a href="/">
                        <button class="btn">Tampilkan semua data</button>
                    </a>

                    <?php endif; ?>
                </div>
                </div>
                <div style="margin-top: 20px;">
                    {{ $slot }}
                </div>

            </div>
        </div>
    </body>
</html>
