<?php
$email = $client = $item = $specs = '';
$errors = array('email'=>'', 'client'=>'', 'item'=>'', 'specs'=>'');
if (isset($_POST['submit'])) {
     if (empty($_POST['email'])) {
      $errors['email'] = 'An email is required <br />';
     } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = 'Must be a valid email address<br />';
        }
     }
     if (empty($_POST['client'])) {
      $errors['client'] = "Client's name is required <br />";
     } else {
        $client = $_POST['client'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $client)) {
         $errors['client'] = "Client's name must be letters and spaces only <br />";
        }
     }
     if (empty($_POST['item'])) {
      $errors['item'] = 'Item name required <br />';
     } else {
        $item = $_POST['item'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $item)) {
         $errors['item'] = 'Item name must be letters and spaces only <br />';
        }
     }
     if (empty($_POST['specs'])) {
      $errors['specs'] = 'Item specifications required <br />';
     } else {
      $specs = $_POST['specs'];
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $specs)) {
         $errors['specs'] = 'Specifications must be a comma separated list <br />';
      }
     }
     if (array_filter($errors)) {
   }else {
      header('Location:index.php');
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add Item</h4>
    <form class="white" action="add.php" method="POST">
        <label for="email">Email Address</label>
        <input type="text" name="email" placeholder="e.g johndoe@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label for="client">Client's Name</label>
        <input type="text" name="client" placeholder="e.g Jane, Kennedy, etc" value="<?php echo htmlspecialchars($client); ?>">
        <div class="red-text"><?php echo $errors['client']; ?></div>
        <label for="item">Child's  Name</label>
        <input type="text" name="item" placeholder="e.g phone, book, etc" value="<?php echo htmlspecialchars($item); ?>">
        <div class="red-text"><?php echo $errors['item']; ?></div>
        <label for="specs">Child's Items(comma separated)</label>
        <input type="text" name="specs" placeholder="e.g item color, size, brand, etc" value="<?php echo htmlspecialchars($specs); ?>">
        <div class="red-text"><?php echo $errors['specs']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php');?>

</html>