<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Car</h1>

        <!-- Form to Add New Car -->
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf <!-- CSRF Token for security -->

            <div class="mb-3">
                <label for="car_type_id" class="form-label">Car Type</label>
                <select name="car_type_id" id="car_type_id" class="form-select" required>
                    <option value="" disabled selected>Select a car type</option>
                    @foreach ($carTypes as $carType)
                        <option value="{{ $carType->id }}">{{ $carType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="brand_name" class="form-label">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="car_name" class="form-label">Car Name</label>
                <input type="text" name="car_name" id="car_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="engine_liter" class="form-label">Engine Size (Liters)</label>
                <input type="number" step="0.1" name="engine_liter" id="engine_liter" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="horsepower" class="form-label">Horsepower</label>
                <input type="number" name="horsepower" id="horsepower" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fuel" class="form-label">Fuel Type</label>
                <input type="text" name="fuel" id="fuel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Add Car</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>
