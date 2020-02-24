<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PCI Clock In</title>
  </head>
  <body>
     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
    
    <h1>Admin</h1>
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="http://localhost/clockIn/">Plath Construction Inc.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clockIn/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clockIn/clockIn.php">Clock In</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link disabled" href="#">Admin</a>
          </li>
        </ul>
       </div>
    </nav>
    
<?php
require_once('database.php');


// Get all categories
$queryAllCategories = 'SELECT * FROM clockin
                           ORDER BY Number';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$input = $statement2->fetchAll();
$statement2->closeCursor();


?>
    <table class="table table-striped">

      <thead>
        <tr>
          <th scope="col">Number</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Latitude</th>
          <th scope="col">Longitude</th>
          <th scope="col">Date/Time</th>
          <th scope="col">View</th>
        </tr>
      </thead>
      <tbody>
          <?php
           echo "Welcome to the Admin page.";
          ?>
       <?php foreach ($input as $item) : ?>
                <tr>
                    <td><?php echo $item['number']; ?></td>
                    <td><?php echo $item['firstname']; ?></td>
                    <td><?php echo $item['lastname']; ?></td>
                    <td><?php echo $item['Latitude']; ?></td>
                    <td><?php echo $item['Longitude']; ?></td>
                    <td><?php echo $item['register_date']; ?></td>
              
                                 
                
                 <td><form action="map.php" method="get">
                        <input type="hidden" name="num"
                               value="<?php echo $item['number']; ?>">
                        <input type="hidden" name="name"
                               value="<?php echo $item['firstname']; ?>">
                        <input type="hidden" name="lat"
                               value="<?php echo $item['Latitude']; ?>">
                        <input type="hidden" name="long"
                               value="<?php echo $item['Longitude']; ?>">
                        <input type="submit" value="Map">
                    </td></form>
                </tr>
       <?php endforeach; ?>  
                
       </tbody>
    </table>
                
                
                
                    
