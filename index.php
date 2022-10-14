
<?php

$dsn = 'mysql:host=localhost;dbname=andelasimpelwebapp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}


$sql = 'SELECT * FROM user';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>List of Contacts</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>

       
          <th>ID</th>
          <th>NAME</th>
          <th>ADDRESS</th>
          <th>EMAIL</th>
          <th>TELEPHONE NUMBER</th>
        </tr>
                <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td>

             <a style="text-decoration: none; color: inherit;" onclick="return confirm('Are you sure you want to view this entry information?')" href="View.php?id=<?= $person->id ?>">
              <?= $person->name; ?>
                </a>

              </td>
             <td><?= $person->address; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->telephone; ?></td>
          </tr>
          <?php endforeach; ?>
      </table>
    </div>
<?php require 'footer.php'; ?>
  </div>
</div>
