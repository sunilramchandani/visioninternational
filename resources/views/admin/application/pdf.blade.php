<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Full Name</th>
      <th>Address</th>
      <th>City</th>
      <th>Zip Code</th>
    </thead>
    <tbody>
      @foreach($application_table as $app)
      <tr>
        <td>{{$app->id}}</td>
        <td>{{$app->program_name}}</td>
        <td>{{$app->country_name}}</td>
        <td>{{$app->location_name}}</td>
        <td>{{$app->last_name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>