<?php
include('config/dbconn.php');
include('templates/navbar.php');
$sql = 'SELECT email, child, received_by,items, id FROM table1 ORDER BY entry_time';
$result = mysqli_query($con, $sql);
$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($con);
//print_r($entry);


?>

    <!-- <div class="landing-dark-bg" style="background-image: url('assets/images/banner/banner.jpg');">       
        <div class="banner-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
        <h1 style="font-weight: 500; font-size: 5em; color: beige;"><b>Khollect Daycare</b></h1>
        <p style="font-weight: 500; font-size: 2.5em;">Where Learning and Care Connect</p>
        </div>
    </div>


    <div class="image-row">

        <img src="assets/images/img/image1.jpg" alt="Image 1">
        <img src="assets/images/img/image2.jpg" alt="Image 2">
        <img src="assets/images/img/image3.jpg" alt="Image 3">
        
    </div> -->
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php');?>

<h4 class="center grey-text">Clients</h4>
<div class="container">
    <div class="row">
        <?php foreach ($entries as $entry):?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($entry['child']); ?></h6>
                        <ul>
                            <?php foreach(explode(',',$entry['items']) as $itm):?>
                                <li><?php echo htmlspecialchars($itm); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                    <a href="details.php?id=<?php echo $entry['id']; ?>" class="brand-text">MORE INFO</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?phpinclude('templates/footer.php');?>
</html>


