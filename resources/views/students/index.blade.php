<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
    <div>

        <h1>Student List</h1>
        @foreach ($students as $result)
                <p>{{ $result['name'] }}</p>
        @endforeach
    </div>
</body>
</html>
