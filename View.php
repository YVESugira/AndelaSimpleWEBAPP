<?php
$dsn = 'mysql:host=localhost;dbname=andelasimpelwebapp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}

$id = $_GET['id'];
$sql = 'SELECT * FROM user WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Contact information attached on selected NAME</h2>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" value="<?= $person->address; ?>" name="address" id="email" class="form-control">
        </div>

         <div class="form-group">
          <label for="EMAIL">Email</label>
          <input value="<?= $person->email; ?>" type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="telephone">Telephone Number</label>
          <input type="text" value="<?= $person->telephone; ?>" name="telephone" id="telephone" class="form-control">
        </div>
      </form>
    </div>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="create.php">Add new contact <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="index.php">View Saved Contacts <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Back Home Page<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
</div>
<?php require 'footer.php'; ?>