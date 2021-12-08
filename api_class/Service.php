<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/Database.php';
include_once $filepath . '/../helpers/Format.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>

<?php

class Service
{

    private $db;
    private $fm;

    public function __construct()
    {

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function addNotification($data, $file)
    {

        $title = $data['title'];
        $desc  = $data['desc'];
        $link  = $data['link'];

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['notiImage']['name'];
        $file_size = $file['notiImage']['size'];
        $file_temp = $file['notiImage']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($title == '') {
            header('Content-type: application/json');
            header('Accept: application/json');
            return json_encode([
                "status" => "validation_error",
                "msg"    => "Title is required",
            ]);

        } else if ($desc == '') {

            header('Content-type: application/json');
            header('Accept: application/json');
            return json_encode([
                "status" => "validation_error",
                "msg"    => "Description is required",
            ]);

        } else {

            move_uploaded_file($file_temp, $uploaded_image);
            $query  = "insert into tbl_notification (title,noti_desc,link,image) value('$title','$desc','$link','$uploaded_image')";
            $result = $this->db->insert($query);
            if ($result) {
                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "success",
                    "msg"    => "Notification Successfully Added",
                ]);

            } else {
                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "server_error",
                    "msg"    => $result,
                ]);

            }

        }

    }

}
?>
