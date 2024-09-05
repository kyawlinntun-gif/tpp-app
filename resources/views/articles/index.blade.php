<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
    <div>
        <h1>Article Lists</h1>
        <ul>
            @foreach ($articles as $article)
                <li>{{ $article['title'] }} by {{ $article['author'] }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>