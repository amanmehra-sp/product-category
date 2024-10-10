<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    
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
        <form action="{{route('add.cat')}}" method="POST">
            @csrf
            <h1>Create a new category</h1>
            <div class="mb-3">
                <label for="categoryTitle" class="form-label">Category Title</label>
                <input type="text" class="form-control" id="categoryTitle" name="title" placeholder="Enter Category Title" required>
            </div>
        
            <div class="mb-3">
                <label for="categoryStatus" class="form-label">Status</label>
                <select class="form-select" id="categoryStatus" name="status" required>
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
                    <th>  id</th>
                    <th>  title</th>
                    <th>  status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cat as $item)
               <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>@if($item->status == '1')
                    <button class=" form-control btn btn-primary"><p>Active</p></button>
                   @else
                  <button class="form-control btn btn-danger"><p>Inactive</p></button> 
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
