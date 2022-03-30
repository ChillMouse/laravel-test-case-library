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

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="container">
<form method="post" action="{{ route('add-new-book-submit') }}" class="mt-5">
    @csrf
    <div class="mb-3">
        <label>
            <input type="text" placeholder="Имя книги" name="title" class="p-2">
        </label>
    </div>
    <div class="mb-3">
        <label class="p-2">Дата издания: <input type="date" name="date_out"></label>
    </div>

    <input type="submit" class="btn btn-success">
</form>
</body>
</html>
