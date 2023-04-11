
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kishan Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
</head>

<?php
error_reporting(0);
include 'app/Controller.php';

$object = new Controller();

if (isset($_POST['submit'])) {
    $saveKisaanDetails = $object->kisaan_details_store($_POST);
    if ($saveKisaanDetails) {
        ?>

<script> 
alert('Save Successfully')
header('Location: index.php');
</script>
<?php }}?>

<?php


if (isset($_POST['add_number'])) {
    $save_new_number = $object->add_new_number($_POST);
    if ($save_new_number) {
      ?>
 
<script> 
   alert('Add Successfully')

    header('Location: index.php');

</script>
  <?php } }?>
<body>


<div class="modile_menu">
    <?php include('include/mobile_menu.php');?>
</div>
    <section class="bg-light vh-100 d-flex">
       <div class="container">
           <div class="row">
                <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="border rounded-circle mx-auto d-flex mb-4" style="width:100px;height: 100px;">
                <img src="https://5.imimg.com/data5/EH/OX/MY-24015003/fresh-wheat-500x500.jpg" style="border-radius:50%;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                </div>
                    <form action="" method="POST">
                        <div class="md-form">
                            <label for="kisaan_name">Your Customer</label>
                            <input type="text" id="kisaan_name" name="kisaan_name" class="form-control" required>
                        </div>

                        <div class="md-form">
                            <label for="kisaan_number">Your Number</label>
                            <input type="number" id="kisaan_number" name="kisaan_number" class="form-control" required>
                        </div>

                        <div class="md-form">
                            <label for="kisaan_vill">Your Village</label>
                            <input type="text" id="kisaan_vill" name="kisaan_vill" class="form-control" required>
                        </div>
                         <div class="md-form">
                            <label for="price">Your Price</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-success" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
           </div>
       </div>
    </section>

   
 
</body>

</html>