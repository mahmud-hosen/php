<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2> Crud Operations</h2> <br> <hr>
  <form class="form-inline" method="POST" action="{{ route('teacher.store') }}">
   @csrf

    
    <label for="name" class="mb-2 mr-sm-2">Name:</label>
    <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Enter name" name="name">
  
    <label for="age" class="mb-2 mr-sm-2">Age:</label>
    <input type="text" class="form-control mb-2 mr-sm-2" id="age" placeholder="Enter age" name="age">
   
    <label for="email" class="mb-2 mr-sm-2">Email:</label>
    <input type="text" class="form-control mb-2 mr-sm-2" id="email" placeholder="Enter email" name="email">
   
   
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>
</div>

</body>
</html>
