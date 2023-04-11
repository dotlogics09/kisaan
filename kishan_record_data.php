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
?>

<body>


    <div class="modile_menu">
        <?php include('include/mobile_menu.php'); ?>
    </div>
    <section class="bg-light vh-100 d-flex">
        <div class="container">
            <div class="row">

                <div class=" mt-5 col-md-12">
                    <table class="table table-bordered shadow">
                        <thead>
                            <tr>
                                <td colspan="1">
                                    <select class="form-control" id="village" onchange="getkisaanByvillage()">
                                        <option value="all">All</option>
                                        <?php
                                        $all_kisaan = $object->getAllKisaan('filter');
                                        foreach ($all_kisaan as $kisaan) {
                                        ?>
                                            <option value="<?php echo $kisaan['village']; ?>"><?php echo $kisaan['village']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <div id="main_kisaan_list" class="table-responsive">
                        <table class="table table-bordered shadow">
                            <thead>
                                <tr class="text-center">
                                    <th>S.No.</th>
                                    <th>Customer Name</th>
                                    <th>Number</th>
                                    <th>Village</th>
                                    <th>Price</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $all_kisaan = $object->getAllKisaan('list');
                                $i = 0;
                                foreach ($all_kisaan as $kisaan) {
                                    $get_number = $object->getNumber($kisaan['id']);
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $kisaan['name'] ?></td>
                                        <td><?php echo $get_number ?></td>
                                        <td><?php echo $kisaan['village'] ?></td>
                                        <td><?php echo $kisaan['price'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="addNewNumber(<?php echo $kisaan['id']; ?>);">Add</button>
                                        </td>
                                        <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myView" onclick="view_numbers(<?php echo $kisaan['id']; ?>);">View</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="POST" id="add_number">
                    <div class="modal-body">
                        <div id="message"></div>
                        <input type="hidden" name="kisaan_id" id="kisaan_id">
                        <div class="md-form">
                            <label for="new_kisaan_number">Your Number</label>
                            <input type="number" id="new_kisaan_number" name="new_number" class="form-control" required>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" onclick="save_number();" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myView">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="numbers_list">
                        <table class="table table-bordered shadow">
                            <thead>
                                <tr class="text-center">
                                    <th>S.No.</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Number</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        function addNewNumber(id) {
            document.getElementById("kisaan_id").value = id;
        }

        function save_number() {
            form_data = $("#add_number").serialize();

            $.ajax({
                url: "number_store.php",
                type: "POST",
                data: form_data,
                success: function(response) {
                    div_cls = '';
                    response = JSON.parse(response);
                    if (response.status) {
                        div_cls = "alert-success";
                    } else {
                        div_cls = "alert-danger";
                    }

                    message_div = '<div class="alert ' + div_cls + '" role="alert" style="margin-top: 16px;">' + response.message + '</div>';

                    document.getElementById("message").innerHTML = message_div;
                }
            });

            setTimeout(function() {
                $("#message").fadeOut('slow');
                setTimeout(function() {
                    window.location.reload();
                }, 500);
            }, 1500);
        }

        function getkisaanByvillage() {
            village_name = document.getElementById("village").value;

            $.ajax({
                url: "get_kisaan_village.php?village=" + village_name,
                type: "GET",
                success: function(response) {
                    document.getElementById("main_kisaan_list").innerHTML = response;
                }
            });
        }

        function view_numbers(id) {
            $.ajax({
                url: "get_numbers.php?kisaan_id=" + id,
                type: "GET",
                success: function(response) {
                    document.getElementById("numbers_list").innerHTML = response;
                }
            });
        }
    </script>
</body>

</html>