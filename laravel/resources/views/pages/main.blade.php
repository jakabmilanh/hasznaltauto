<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cars List</h1>

        <!-- Show "Add New Car" Button for Admins -->
        @if (Auth::check() && Auth::user()->role === 'admin')
            <div class="mb-3 text-end">
                <a href="/new-car" class="btn btn-primary">Add New Car</a>
            </div>
        @endif

        <!-- Logout Button -->
        <div class="mb-3 text-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Type</th>
                    <th>Brand Name</th>
                    <th>Car Name</th>
                    <th>Color</th>
                    <th>Engine (Liters)</th>
                    <th>Horsepower</th>
                    <th>Fuel Type</th>
                    <th>Price</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->carType->name ?? 'N/A' }}</td> <!-- Assumes 'name' in 'car_types' table -->
                        <td>{{ $car->brand_name }}</td>
                        <td>{{ $car->car_name }}</td>
                        <td>{{ $car->color }}</td>
                        <td>{{ $car->engine_liter }}</td>
                        <td>{{ $car->horsepower }}</td>
                        <td>{{ $car->fuel }}</td>
                        <td>${{ number_format($car->price, 2) }}</td>
                        <td>{{ $car->created_at->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No cars found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
