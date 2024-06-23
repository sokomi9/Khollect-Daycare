<?php
$conn = mysqli_connect('localhost', 'abiud', '8o[fKr5.W!Y0]L*-', 'khollect day care');
if ($conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
<?php include('templates/footer.php'); ?>   

</html>