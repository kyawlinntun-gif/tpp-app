<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>Products List</h1>
                        <a href="{{ route('product.create') }}" class="btn btn-outline-success">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark text-center">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white" scope="col">#ID</th>
                                    <th class="bg-primary text-white" scope="col">NAME</th>
                                    <th class="bg-primary text-white" scope="col">DESCRIPTION</th>
                                    <th class="bg-primary text-white" scope="col">PRICE</th>
                                    <th class="bg-primary text-white" scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['description'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td><a href="{{ route('product.edit') }}" class="btn btn-outline-warning">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>