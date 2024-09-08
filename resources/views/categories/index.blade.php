<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4">Categories List</h1>
                <a href="{{ route('category.create') }}" class="btn btn-outline-success">Create</a>
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td><a href="{{ route('category.edit') }}" class="btn btn-outline-warning">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>