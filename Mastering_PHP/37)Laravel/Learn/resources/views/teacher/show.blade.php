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
  <h2>Table</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach($teacherInfos as $teacherInfo)
      <tr>
        <td>{{ $teacherInfo->name }}</td>
        <td>{{ $teacherInfo->email }}</td>
        <td> {{ $teacherInfo->age }} </td>
        <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <form action="{{route('teacher.destroy', $teacherInfo->id)}}" method="POST">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>

                        <a href="{{route('teacher.edit', $teacherInfo->id)}}" class="btn btn-success">Edit</a>
                    </div>
        </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>
</div>

</body>
</html>
