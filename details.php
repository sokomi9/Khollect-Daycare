<?php 
include('templates/navbar.php'); 
include('config/dbconn.php');

if (isset($_POST['delete'])) {
   $id_to_delete = mysqli_real_escape_string($con, $_POST['id_to_delete']);

   $sql = "DELETE FROM table1 WHERE id=$id_to_delete";

   if (mysqli_query($con, $sql)) {
      header("Location: index.php");
   }{
      echo "query errror: " . mysqli_error($con);
   }
}

if (isset($_GET['id'])) {
   $id = mysqli_real_escape_string($con, $_GET['id']);
   $sql = "SELECT * FROM table1 WHERE id=$id";
   $result = mysqli_query($con, $sql);
   $entry = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   mysqli_close($con);
   //print_r($entry);
}
?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

   <div class="container center">
      <?php if ($entry): ?>
         <h4><?php echo htmlspecialchars_decode($entry['child']); ?></h4>
         <p>Created by: <?php echo htmlspecialchars($entry['email']); ?></p>
         <p><?php echo date($entry['entry_time']); ?></p>
         <h5>Items:</h5>
         <p><?php echo htmlspecialchars($entry['items']); ?></p>
      <!-- DELETE FORM -->
      <form action="details.php" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $entry['id']; ?>"><br />
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
      </form>
      <?php else: ?>
          <p>No such child came in!</p>
      <?php endif; ?>   
   </div>
  
<?php include('templates/footer.php'); ?>

</html>