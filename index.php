<?php
include 'app/Controller.php';

$object = new Controller();

if (isset($_POST['submit'])) {
    $saveKisaanDetails = $object->kisaan_details_store($_POST);
    if ($saveKisaanDetails) {
        header('Location: index.php');
    }
}

if (isset($_POST['add_number'])) {
    $save_new_number = $object->add_new_number($_POST);
    if ($save_new_number) {
        header('Location: index.php');
    }
}
?>
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
</head>

<body>

    <section class="bg-light vh-100 d-flex">
        <div class="col-3 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border rounded-circle mx-auto d-flex mb-4" style="width:100px;height: 100px;">
                        <i class="fa fa-user text-light fa-3x m-auto"></i>
                    </div>
                    <form action="" method="POST">
                        <div class="md-form">
                            <label for="kisaan_name">Your Customer</label>
                            <input type="text" id="kisaan_name" name="kisaan_name" class="form-control">
                        </div>

                        <div class="md-form">
                            <label for="kisaan_number">Your Number</label>
                            <input type="number" id="kisaan_number" name="kisaan_number" class="form-control">
                        </div>

                        <div class="md-form">
                            <label for="kisaan_vill">Your Village</label>
                            <input type="text" id="kisaan_vill" name="kisaan_vill" class="form-control">
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-success" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 m-5">
            <table class="table table-bordered shadow">
                <thead>
                    <tr>
                        <td colspan="1">
                            <select class="form-control" id="kisaan_village">
                                <option>All</option>
                                <option>Test</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th>S.No.</th>
                        <th>Customer Name</th>
                        <th>Number</th>
                        <th>Village</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $all_kisaan = $object->getAllKisaan();
                    $i = 0;
                    foreach ($all_kisaan as $kisaan) {
                        $get_number = $object->getNumber($kisaan['id']);
                    ?>
                        <tr class="text-center">
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $kisaan['name'] ?></td>
                            <td><?php echo $get_number ?></td>
                            <td><?php echo $kisaan['village'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="addNewNumber(<?php echo $kisaan['id']; ?>);">Add</button>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myView">View</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

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
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="kisaan_id" id="kisaan_id">
                        <div class="md-form">
                            <label for="new_kisaan_number">Your Number</label>
                            <input type="number" id="new_kisaan_number" name="new_number" class="form-control">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_number" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myView">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

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
    </script>
</body>

</html>