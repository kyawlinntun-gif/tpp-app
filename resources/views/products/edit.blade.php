<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>Product Update</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-success">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="price">Price:</label>
                                <input type="number" name="price" id="price" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>