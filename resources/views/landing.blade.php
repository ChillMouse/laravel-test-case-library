<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            #table {
                display: flex;
                flex-direction: column;
                padding: 15px;
                max-width: 70%;
                margin: 0 auto;
            }

            .tr:nth-child(even){
                background: #dedede;
            }
            .tr {
                justify-content: space-between;
            }
            .tr, .td {
                display: flex;
                flex-flow: row nowrap;
            }
            .td {
                margin: 5px;
                text-align: left;
            }
            .td:first-child::after{
                content: ":";
            }
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <div id="table">
        @forelse($authors as $author)
        <div class="tr">
            <div class="td">{{ $author->name }} {{ $author->surname }} {{ $author->patronymic }}</div>
            <div class="td">
                @forelse($author->books as $book)
                    "{{ $book->title }}"
                @empty Нет книг
                @endforelse
            </div>
        </div>
        @empty
        <p>Ничего нет...</p>
        @endforelse
    </div>
    </body>
</html>
