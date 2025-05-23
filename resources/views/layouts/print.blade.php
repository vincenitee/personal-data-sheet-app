<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDS | {{ $title ?? 'Page Title' }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-D7eHD1Gb.css') }}">

    <style>
        :root {
            --primary-color: #0f4c81;
            --accent-color: #c8102e;
            --text-color: #333;
        }

        body {
            font-family: 'Lato', sans-serif;
            color: var(--text-color);
            line-height: 1.5;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .header {
            padding: 1.5rem 0 1rem;
            border-bottom: 3px solid var(--primary-color);
            margin-bottom: 2rem;
        }

        .header-content {
            text-align: center;
        }

        .location {
            font-size: 0.85rem;
            color: #555;
            margin: 0;
        }

        .municipality {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--primary-color);
            margin: 0.3rem 0 0;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .document-content {
            margin-bottom: 2rem;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <p class="location">Republic of the Philippines</p>
                <p class="location">Province of La Union</p>
                <h1 class="municipality">Municipality of Rosario</h1>
            </div>
        </div>
    </header>

    <main class="container">
        <h2 class="page-title">@yield('title', 'Document Title')</h2>
        <div class="document-content">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('build/assets/app-BdMOg7Xo.js') }}"></script>
</body>

</html>