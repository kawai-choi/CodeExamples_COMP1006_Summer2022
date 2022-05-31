<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tunshare - User Generated Playlist Generator </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
</head>

<body class="playlist">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Tuneshare</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="submit.php">Submit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="playlist.php">Playlists</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <header>
      <h1> Tuneshare </h1>
      <h2> Latest Playlist </h2>
    </header>
    <main class="view">
      <div class="row">
        <div class="col-md-4">
          <img src="assets/musicfile2-10.svg" alt="listening to music illustration">
        </div>
        <div class="col-md-8">
          <?php
          //connect to our db 
          require_once('connect.php');

          //set up SQL statement 
          $sql = "SELECT * FROM songs;";

          //prepare the query 
          $statement = $db->prepare($sql);

          //execute 
          $statement->execute();

          //use fetchAll to Fetch all remaining rows in a result set
          $records = $statement->fetchAll();

          // echo out the top of the table 

          echo "<table class='table'><tbody>";

          foreach ($records as $record) {
            echo "<tr><td>"
              . $record['first_name'] . "</td><td>" . $record['last_name'] . "</td><td>" . $record['location']  . $record['favsong'] . "</td><td>" .  $record['genre'] . "</td><td>" . $record['genre'] . "</td></tr>";
          }
          echo "</tbody></table>";

          $statement->closeCursor();
          ?>
        </div>
      </div>
      <!--end row-->
    </main>
    <footer>
      <p> &copy; <?php echo getdate()['year']; ?> TuneShare </p>
    </footer>
  </div>
  <!--end container-->
</body>

</html>