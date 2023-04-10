<?php
include 'db.php';

class Controller
{
    public $con;

    public function __construct()
    {
        $conn = new DB();
        $this->con = $conn->connection();
    }

    public function kisaan_details_store($post)
    {
        $date = date('Y-m-d, H:i:s');
        $time = date('H:i:s');

        $kisaan_name = stripcslashes($_POST['kisaan_name']);
        $kisaan_number = stripcslashes($_POST['kisaan_number']);
        $kisaan_vill = stripcslashes($_POST['kisaan_vill']);

        $save_details_query = "INSERT INTO `kisaan`(`name`, `village`, `created_at`) VALUES ('$kisaan_name','$kisaan_vill', now())";
        $save_details = $this->con->query($save_details_query);
        $inserted_id = $this->con->insert_id;

        if ($save_details) {
            $save_number_query = "INSERT INTO `number`(`kisaan_id`, `number`, `date`, `time`, `created_at`) VALUES ('$inserted_id', '$kisaan_number', '$date', '$time', now())";
            $save_number = $this->con->query($save_number_query);

            if ($save_number) {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    public function getAllKisaan($type)
    {
        if ($type == 'list') {
            $getallkisaan_query = "SELECT * FROM `kisaan`";
        } else {
            $getallkisaan_query = "SELECT DISTINCT(`village`) FROM `kisaan`; ";
        }
        $getallkisaan = $this->con->query($getallkisaan_query);
        if ($getallkisaan->num_rows > 0) {
            return $getallkisaan;
        } else {
            return FALSE;
        }
    }

    public function getNumber($kisaan_id)
    {
        $get_number_query = "SELECT SUM(`number`) AS `number` FROM `number` WHERE `kisaan_id` = '$kisaan_id'";
        $get_number = $this->con->query($get_number_query);
        $total = mysqli_fetch_array($get_number, MYSQLI_ASSOC);

        if ($total['number'] != NULL) {
            $number = $total['number'];
        } else {
            $number = 0;
        }

        return $number;
    }

    public function add_new_number($post)
    {
        $date = date('Y-m-d, H:i:s');
        $time = date('H:i:s');
        $new_number = stripcslashes($_POST['new_number']);
        $kisaan_id = $_POST['kisaan_id'];

        $saveNumber_query = "INSERT INTO `number`(`kisaan_id`, `number`, `date`, `time`, `created_at`) VALUES ('$kisaan_id', '$new_number', '$date', '$time', now())";
        $saveNumber = $this->con->query($saveNumber_query);

        if ($saveNumber) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getNumberDetails($kisaan_id)
    {
        $html = '';
        $getNumbers_query = "SELECT * FROM `number` WHERE `kisaan_id` = '$kisaan_id'";
        $getNumbers = $this->con->query($getNumbers_query);

        $total_numbers = $this->getNumber($kisaan_id);

        $i = 0;
        $html .= '<table class="table table-bordered shadow"><thead><tr class="text-center"><th>S.No.</th><th>Date</th><th>Time</th><th>Number</th></tr></thead><tbody>';
        if ($getNumbers->num_rows > 0) {
            foreach ($getNumbers as $number) {
                $html .= '<tr><td>' . ++$i . '</td><td>' . $number['date'] . '</td><td>' . $number['time'] . '</td><td><span style="font-size:16px;font-weight:600;">' . $number['number'] . '</span></td></tr>';
            }
        }
        $html .= '</tbody></table><span><b>Total:</b> ' . $total_numbers . '</span>';

        return $html;
    }

    public function getkisaanByvillage($village)
    {
        $table = '';
        if($village == 'all'){
            $condition = '';
        } else {
            $condition = ' WHERE `village` = "' . $village . '"';
        }
        $village = "'"  . $village . "'";
        
        $getkisaanByvillage_query = "SELECT * FROM `kisaan`" . $condition;
        $getkisaanByvillage = $this->con->query($getkisaanByvillage_query);

        $table .= '<table class="table table-bordered shadow"><thead><tr class="text-center"><th>S.No.</th><th>Customer Name</th><th>Number</th><th>Village</th><th colspan="2">Action</th></tr></thead><tbody>';
        $i = 0;
        foreach ($getkisaanByvillage as $kisaan) {
            $get_number = $this->getNumber($kisaan['id']);

            $table .= '<tr class="text-center">';
            $table .= '<td>' . ++$i . '</td>';
            $table .= '<td>' . $kisaan['name'] . '</td>';
            $table .= '<td>' . $get_number . '</td>';
            $table .= '<td>' . $kisaan['village'] . '</td>';
            $table .= '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="addNewNumber(' . $kisaan['id'] . ');">Add</button></td>';
            $table .= '<td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myView" onclick="view_numbers(' . $kisaan['id'] . ');">View</button></td></tr>';
        }
        $table .= '</tbody>';

        return $table;
    }
}
