<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subcat Category Form</title>
    
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <!-- Your form goes here -->
        <form action="{{route('add.subcat')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Create a new sub  category</h1>
            <div class="mb-3">
                <label for="subcatTitle" class="form-label">Category select </label>
               <select name="category_id" id="">
                @foreach ($cat as $catgory)
                    <option value="{{$catgory->id}}">{{$catgory->title}}</option>
                @endforeach
              
               </select>
            </div>
            <div class="mb-3">
                <label for="subcatTitle" class="form-label">Sub Category Title</label>
                <input type="text" class="form-control" id="subcatTitle" name="title" placeholder="Enter sub Category Title" required>
            </div>
            <div class="mb-3">
                <label for="categoryStatus" class="form-label">Status</label>
                <select class="form-select" id="subcatStatus" name="status" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>
   <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th> id</th>
                        <th> title</th>
                        <th>category_name<th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($subCategory as $subcat)
                
                <tr>
                    <td>{{$subcat->id}}</td>
                    <td>{{$subcat->title}}</td>
                    <td>{{ $subcat->category->title }}</td> <!-- Displaying category name instead of ID -->
                    <td>@if($subcat->status == '1')
                        <button class="form-control btn btn-primary"><span>Active</span></button>
                    @else
                    <button class="form-control btn btn-danger"><span>Inactive</span></button> 
                    @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
   </div>

    <!-- Bootstrap JavaScript and Popper.js (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
