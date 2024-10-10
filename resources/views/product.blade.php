<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategory Form</title>
    
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('index')}}">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="{{route('adding')}}">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('subadding')}}">Add SubCategory</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('add.product')}}">Add Product</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Create a new product</h1>
            
            <!-- Category Select -->
            <div class="mb-3">
                <label for="category" class="form-label">Category select</label>
                <select name="category_id" name="categorySelect"id="categorySelect" class="form-select" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($cat as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Subcategory Select -->
            <div class="mb-3">
                <label for="subcategory" class="form-label">Subcategory select</label>
                <select name="sub_cats_id" id="subcategorySelect" class="form-select" required>
                    <option value="" disabled selected>Select Subcategory</option>
                </select>
            </div>
            
            <!-- Product Title and Description -->
            <div class="mb-3">
                <label for="subcatTitle" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="subcatTitle" name="title" placeholder="Enter sub Category Title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="discription" placeholder="Enter description" required>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div>

   {{-- DATA GET --}}

   <div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Subcategory Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->title }}</td>
                        <td>{{ $pro->category_id}}</td> <!-- Display category name -->
                        <td>{{ $pro->subcat_id }}</td> <!-- Display subcategory name -->
                        <td>{{ $pro->discription }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- END --}}
    <!-- jQuery to Handle AJAX for Subcategory Loading -->
    <script>
        $('#categorySelect').on('change', function() {
            var categoryId = $(this).val();

            // Clear existing options in subcategory dropdown
            $('#subcategorySelect').html('<option value="" disabled selected>Select Subcategory</option>');

            if (categoryId) {
                // Make an AJAX request to fetch subcategories
                $.ajax({
                    url: '/subcategories/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        // Populate the subcategory dropdown
                        $.each(data, function(index, subcategory) {
                            $('#subcategorySelect').append('<option value="' + subcategory.id + '">' + subcategory.title + '</option>');
                        });
                    },
                    error: function() {
                        console.error('Error fetching subcategories.');
                    }
                });
            }
        });
    </script>

    <!-- Bootstrap JavaScript and Popper.js (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
