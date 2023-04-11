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

<body>


    <div class="modile_menu">
        <?php include('include/mobile_menu.php'); ?>
    </div>
    <section class="bg-light vh-100 d-flex">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div id="message"></div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border rounded-circle mx-auto d-flex mb-4" style="width:100px;height: 100px;">
                                <img src="https://5.imimg.com/data5/EH/OX/MY-24015003/fresh-wheat-500x500.jpg" style="border-radius:50%;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                            </div>
                            <form method="POST" id="new_customer">
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
                                    <button type="button" class="btn btn-success" onclick="save_new_customer();">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function save_new_customer() {
            form_data = $("#new_customer").serialize();

            $.ajax({
                url: "new_customer_store.php",
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
    </script>
</body>

</html>