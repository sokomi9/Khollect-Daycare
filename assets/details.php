<?php 
include('templates/navbar.php'); 
include('config/dbconn.php');

if (isset($_GET['id'])) {
   $id = mysqli_real_escape_string($con, $_GET['id']);
   $sql = "SELECT * FROM tables1 WHERE id=$id";
   $result = mysqli_query($con, $sql);
   $entry = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   mysqli_close($con);
   print_r($entry);
}
?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

   <!-- <div class="container center">
      <?php if ($entry): ?>
         <h4><?php echo htmlspecialchars_decode($entry['child']); ?></h4>
         <p>Created by: <?php echo htmlspecialchars($entry['email']); ?></p>
         <p><?php echo date($entry['entry_time']); ?></p>
         <h5>Items:</h5>
         <p><?php echo htmlspecialchars($entry['items']); ?></p>
      <?php else: ?>
          <p>No such child came in!</p>
      <?php endif; ?>   
   </div> -->
<?php include('templates/footer.php'); ?>

</html>