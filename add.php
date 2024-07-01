<?php
include('config/dbconn.php');

$email = $client = $item = $specs = '';
$errors = array('email'=>'', 'received_by'=>'', 'child'=>'', 'items'=>'');
if (isset($_POST['submit'])) {
     if (empty($_POST['email'])) {
      $errors['email'] = 'An email is required <br />';
     } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = 'Must be a valid email address<br />';
        }
     }
     if (empty($_POST['received_by'])) {
      $errors['received_by'] = "Client's name is required <br />";
     } else {
        $client = $_POST['received_by'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $client)) {
         $errors['received_by'] = "Client's name must be letters and spaces only <br />";
        }
     }
     if (empty($_POST['child'])) {
      $errors['child'] = 'Item name required <br />';
     } else {
        $item = $_POST['child'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $item)) {
         $errors['child'] = 'Item name must be letters and spaces only <br />';
        }
     }
     if (empty($_POST['items'])) {
      $errors['items'] = 'Item specifications required <br />';
     } else {
      $specs = $_POST['items'];
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $specs)) {
         $errors['items'] = 'Specifications must be a comma separated list <br />';
      }
     }

     if (array_filter($errors)) {
   }else {
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $item = mysqli_real_escape_string($con, $_POST['child']);
      $client = mysqli_real_escape_string($con, $_POST['received_by']);
      $specs = mysqli_real_escape_string($con, $_POST['items']);
      $entry_time = date('Y-m-d H:i:s'); // Current timestamp

    $sql = "INSERT INTO table1(email, child, received_by, items, entry_time) VALUES('$email', '$item', '$client', '$specs', '$entry_time')";  

      if (mysqli_query($con, $sql)) {
         header('Location:index.php');
      }else {
         echo 'query error' . mysqli_error($con);
      }
      
   }
}

?>


<?php
include('templates/navbar.php');
include('templates/header.php');
?>

<section class="container grey-text">
    <h4 class="center">Add Item</h4>
    <form class="white" action="add.php" method="POST">
        <label for="email">Email Address</label>
        <input type="text" name="email" placeholder="e.g johndoe@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label for="received_byt">Client's Name</label>
        <input type="text" name="received_by" placeholder="e.g Jane, Kennedy, etc" value="<?php echo htmlspecialchars($client); ?>">
        <div class="red-text"><?php echo $errors['received_by']; ?></div>
        <label for="child">Child's  Name</label>
        <input type="text" name="child" placeholder="e.g phone, book, etc" value="<?php echo htmlspecialchars($item); ?>">
        <div class="red-text"><?php echo $errors['child']; ?></div>
        <label for="items">Child's Items(comma separated)</label>
        <input type="text" name="items" placeholder="e.g item color, size, brand, etc" value="<?php echo htmlspecialchars($specs); ?>">
        <div class="red-text"><?php echo $errors['items']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php');?>

