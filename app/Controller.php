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

    public function getAllKisaan()
    {
        // $getallkisaan_query = "SELECT * FROM `kisaan` JOIN `number` on `number`.`kisaan_id` = `kisaan`.`id`";
        $getallkisaan_query = "SELECT * FROM `kisaan`";
        $getallkisaan = $this->con->query($getallkisaan_query);
        if ($getallkisaan->num_rows > 0) {
            return $getallkisaan;
        } else {
            return FALSE;
        }
    }

    public function getNumber($kisaan_id)
    {
        $get_number_query = "SELECT SUM(`number`) AS `number` FROM `number`";
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
        
        if($saveNumber){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
