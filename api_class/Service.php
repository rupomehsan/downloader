<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/Database.php';
include_once $filepath . '/../helpers/Format.php';
include_once $filepath . '/SendNotification.php';

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

    public function notificatioCreate($data, $file)
    {

        $title         = $this->fm->validation($data['title']);
        $noti_desc     = $this->fm->validation($data['desc']);
        $external_link = $this->fm->validation($data['link']);

        $title         = mysqli_real_escape_string($this->db->link, $data['title']);
        $noti_desc     = mysqli_real_escape_string($this->db->link, $data['desc']);
        $external_link = mysqli_real_escape_string($this->db->link, $data['link']);
        $date          = date('y-m-d');

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($title == '' || $noti_desc == '') {
            $msg = "<div class='alert alert-danger mt-2'>Field Must Not Be Empty!!!</div>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "insert into tbl_notification (title,noti_desc,link,image,date)
               value ('$title','$noti_desc','$external_link','$uploaded_image','$date');
               ";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                $query            = "select * from tbl_manage_notification limit 1";
                $result           = $this->db->select($query);
                $value            = $result->fetch_assoc();
                $api_id           = $value['api_id'];
                $api_key          = $value['api_key'];
                $imageUrl         = $_SERVER['HTTP_HOST'] . "/admin/$uploaded_image";
                $sendNotification = new SendNotification();
                $sendNotification->sendMessage($title, $noti_desc, $external_link, $imageUrl, $api_id, $api_key);
                // echo $sendNotification;
                $msg = "<div class='alert alert-success'>Settings Successfully Added</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger mt-2'>Insert Failed</div>";
                return $msg;
            }
        }
    }

    public function createMaageAds($data, $file)
    {

        $gg_add_type                   = $this->fm->validation($data['gg_add_type']);
        $gg_admob_id                   = $this->fm->validation($data['gg_admob_id']);
        $gg_interesticial_admob_id     = $this->fm->validation($data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = $this->fm->validation($data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = $this->fm->validation($data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = $this->fm->validation($data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = $this->fm->validation($data['gg_native_ad_per_video_series']);
        $fb_add_type                   = $this->fm->validation($data['fb_add_type']);
        $fb_admob_id                   = $this->fm->validation($data['fb_admob_id']);
        $fb_interesticial_admob_id     = $this->fm->validation($data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = $this->fm->validation($data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = $this->fm->validation($data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = $this->fm->validation($data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = $this->fm->validation($data['fb_native_ad_per_video_series']);
        $cs_add_type                   = $this->fm->validation($data['cs_add_type']);
        $cs_banner_admob_link          = $this->fm->validation($data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = $this->fm->validation($data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = $this->fm->validation($data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = $this->fm->validation($data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = $this->fm->validation($data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = $this->fm->validation($data['cs_native_ad_per_video_series']);
        $startup_add_type              = $this->fm->validation($data['startup_add_type']);
        $startup_ad_id                 = $this->fm->validation($data['startup_ad_id']);

        $gg_add_type                   = mysqli_real_escape_string($this->db->link, $data['gg_add_type']);
        $gg_admob_id                   = mysqli_real_escape_string($this->db->link, $data['gg_admob_id']);
        $gg_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_series']);
        $fb_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_series']);
        $cs_add_type                   = mysqli_real_escape_string($this->db->link, $data['cs_add_type']);
        $cs_banner_admob_link          = mysqli_real_escape_string($this->db->link, $data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = mysqli_real_escape_string($this->db->link, $data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_series']);
        $startup_add_type              = mysqli_real_escape_string($this->db->link, $data['startup_add_type']);
        $startup_ad_id                 = mysqli_real_escape_string($this->db->link, $data['startup_ad_id']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $cs_banner_image_file_name      = $file['bannerImage']['name'];
        $cs_banner_image_file_size      = $file['bannerImage']['size'];
        $cs_banner_image_file_temp      = $file['bannerImage']['tmp_name'];
        $cs_banner_image_div            = explode('.', $cs_banner_image_file_name);
        $cs_banner_image_file_ext       = strtolower(end($cs_banner_image_div));
        $cs_banner_image_unique_image   = substr(md5(time()), 0, 10) . '1' . '.' . $cs_banner_image_file_ext;
        $cs_banner_image_uploaded_image = "uploads/" . $cs_banner_image_unique_image;

        $cs_interesticial_image_file_name      = $file['interesticialImage']['name'];
        $cs_interesticial_image_file_size      = $file['interesticialImage']['size'];
        $cs_interesticial_image_file_temp      = $file['interesticialImage']['tmp_name'];
        $cs_interesticial_image_div            = explode('.', $cs_interesticial_image_file_name);
        $cs_interesticial_image_file_ext       = strtolower(end($cs_interesticial_image_div));
        $cs_interesticial_image_unique_image   = substr(md5(time()), 0, 10) . '2' . '.' . $cs_interesticial_image_file_ext;
        $cs_interesticial_image_uploaded_image = "uploads/" . $cs_interesticial_image_unique_image;

        $cs_native_image_file_name      = $file['nativeImage']['name'];
        $cs_native_image_file_size      = $file['nativeImage']['size'];
        $cs_native_image_file_temp      = $file['nativeImage']['tmp_name'];
        $cs_native_image_div            = explode('.', $cs_native_image_file_name);
        $cs_native_image_file_ext       = strtolower(end($cs_native_image_div));
        $cs_native_image_unique_image   = substr(md5(time()), 0, 10) . '3' . '.' . $cs_native_image_file_ext;
        $cs_native_image_uploaded_image = "uploads/" . $cs_native_image_unique_image;

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';

        // echo '<pre>';
        // print_r($file);
        // echo '<pre>';
        // die;

        if ($gg_admob_id == '') {
            header('Content-type: application/json');
            header('Accept: application/json');
            return json_encode([
                "status" => "validation_error",
                "msg"    => "Field Must Not Be Empty!!!",
            ]);

        } elseif ($cs_banner_image_file_size > 1048567) {
            $msg = "<div class='alert alert-danger mt-2'>Image Size should be less then 1MB! </div>";
            return $msg;
        } elseif (in_array($cs_banner_image_file_ext, $permited) === false) {
            $msg = "<div class='alert alert-danger mt-2'>You can upload only:-"
            . implode(', ', $permited) . " </div>";
            return $msg;
        } else {
            move_uploaded_file($cs_banner_image_file_temp, $cs_banner_image_uploaded_image);
            move_uploaded_file($cs_interesticial_image_file_temp, $cs_interesticial_image_uploaded_image);
            move_uploaded_file($cs_native_image_file_temp, $cs_native_image_uploaded_image);
            $query = "insert into tbl_mobile_adds (gg_admob_id,gg_add_type,gg_interesticial_admob_id,gg_interesticial_admob_click,gg_native_admob_id,gg_native_ad_per_video_like,gg_native_ad_per_video_series,fb_admob_id,fb_add_type,fb_interesticial_admob_id,fb_interesticial_admob_click,fb_native_admob_id,fb_native_ad_per_video_like,fb_native_ad_per_video_series,cs_banner_image,cs_add_type,cs_interesticial_image,cs_banner_admob_link,cs_interesticial_ad_link,cs_native_image,cs_Interesticial_admob_click,cs_native_ad_link,cs_native_ad_per_video_like,cs_native_ad_per_video_series,startup_ad_id,startup_add_type)
               value ('$gg_admob_id','$gg_add_type','$gg_interesticial_admob_id','$gg_interesticial_admob_click','$gg_native_admob_id','$gg_native_ad_per_video_like','$gg_native_ad_per_video_series','$	$fb_admob_id','$fb_add_type','$fb_interesticial_admob_id','$fb_interesticial_admob_click','$fb_native_admob_id','$fb_native_ad_per_video_like','$fb_native_ad_per_video_series','$cs_banner_image_uploaded_image','$cs_add_type','$cs_interesticial_image_uploaded_image','$cs_banner_admob_link','$cs_interesticial_ad_link','$cs_native_image_uploaded_image','$cs_Interesticial_admob_click','$cs_native_ad_link','$cs_native_ad_per_video_like','$cs_native_ad_per_video_series','$startup_ad_id','$startup_add_type');
               ";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "success",
                    "msg"    => "Advertisement Successfully Added",
                ]);

            } else {
                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "server_error",
                    "msg"    => "Insert Failed",
                ]);

            }
        }

    }

    public function getManageAds()
    {
        $query  = "select * from tbl_mobile_adds where id = '1'";
        $result = $this->db->select($query);
        $data   = $result->fetch_assoc();
        // $getManageAds = [];
        // while ($item = mysqli_fetch_assoc($result)) {
        //     array_push($getManageAds, $item);
        // }
        header('Content-type: application/json');
        header('Accept: application/json');
        return json_encode([
            "status" => "success",
            "data"   => $data,
        ]);

    }

    public function updateMaageAds($data, $file)
    {
        $id                            = $this->fm->validation($data['id']);
        $gg_add_type                   = $this->fm->validation($data['gg_add_type']);
        $gg_admob_id                   = $this->fm->validation($data['gg_admob_id']);
        $gg_interesticial_admob_id     = $this->fm->validation($data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = $this->fm->validation($data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = $this->fm->validation($data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = $this->fm->validation($data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = $this->fm->validation($data['gg_native_ad_per_video_series']);
        $fb_add_type                   = $this->fm->validation($data['fb_add_type']);
        $fb_admob_id                   = $this->fm->validation($data['fb_admob_id']);
        $fb_interesticial_admob_id     = $this->fm->validation($data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = $this->fm->validation($data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = $this->fm->validation($data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = $this->fm->validation($data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = $this->fm->validation($data['fb_native_ad_per_video_series']);
        $cs_add_type                   = $this->fm->validation($data['cs_add_type']);
        $cs_banner_admob_link          = $this->fm->validation($data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = $this->fm->validation($data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = $this->fm->validation($data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = $this->fm->validation($data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = $this->fm->validation($data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = $this->fm->validation($data['cs_native_ad_per_video_series']);
        $startup_add_type              = $this->fm->validation($data['startup_add_type']);
        $startup_ad_id                 = $this->fm->validation($data['startup_ad_id']);

        $gg_add_type                   = mysqli_real_escape_string($this->db->link, $data['gg_add_type']);
        $gg_admob_id                   = mysqli_real_escape_string($this->db->link, $data['gg_admob_id']);
        $gg_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_series']);
        $fb_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_series']);
        $cs_add_type                   = mysqli_real_escape_string($this->db->link, $data['cs_add_type']);
        $cs_banner_admob_link          = mysqli_real_escape_string($this->db->link, $data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = mysqli_real_escape_string($this->db->link, $data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_series']);
        $startup_add_type              = mysqli_real_escape_string($this->db->link, $data['startup_add_type']);
        $startup_ad_id                 = mysqli_real_escape_string($this->db->link, $data['startup_ad_id']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $cs_banner_image_file_name      = $file['cs_banner_image']['name'];
        $cs_banner_image_file_size      = $file['cs_banner_image']['size'];
        $cs_banner_image_file_temp      = $file['cs_banner_image']['tmp_name'];
        $cs_banner_image_div            = explode('.', $cs_banner_image_file_name);
        $cs_banner_image_file_ext       = strtolower(end($cs_banner_image_div));
        $cs_banner_image_unique_image   = substr(md5(time()), 0, 10) . '1' . '.' . $cs_banner_image_file_ext;
        $cs_banner_image_uploaded_image = "uploads/" . $cs_banner_image_unique_image;

        $cs_interesticial_image_file_name      = $file['cs_interesticial_image']['name'];
        $cs_interesticial_image_file_size      = $file['cs_interesticial_image']['size'];
        $cs_interesticial_image_file_temp      = $file['cs_interesticial_image']['tmp_name'];
        $cs_interesticial_image_div            = explode('.', $cs_interesticial_image_file_name);
        $cs_interesticial_image_file_ext       = strtolower(end($cs_interesticial_image_div));
        $cs_interesticial_image_unique_image   = substr(md5(time()), 0, 10) . '2' . '.' . $cs_interesticial_image_file_ext;
        $cs_interesticial_image_uploaded_image = "uploads/" . $cs_interesticial_image_unique_image;

        $cs_native_image_file_name      = $file['cs_native_image']['name'];
        $cs_native_image_file_size      = $file['cs_native_image']['size'];
        $cs_native_image_file_temp      = $file['cs_native_image']['tmp_name'];
        $cs_native_image_div            = explode('.', $cs_native_image_file_name);
        $cs_native_image_file_ext       = strtolower(end($cs_native_image_div));
        $cs_native_image_unique_image   = substr(md5(time()), 0, 10) . '3' . '.' . $cs_native_image_file_ext;
        $cs_native_image_uploaded_image = "uploads/" . $cs_native_image_unique_image;

        // var_dump($cs_banner_image_uploaded_image,$cs_interesticial_image_uploaded_image,$cs_native_image_uploaded_image);
        // die;

        if ($gg_admob_id == '') {
            $msg = "<div class='alert alert-danger mt-2'>Field Must Not Be Empty!!!</div>";
            return $msg;
        } else {

            if (!empty($cs_banner_image_file_name)) {

                if ($cs_banner_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_banner_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>One You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_banner_image_file_temp, $cs_banner_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_banner_image   = '$cs_banner_image_uploaded_image',
                cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else if (!empty($cs_interesticial_image_file_name)) {

                if ($cs_interesticial_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_interesticial_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>Two You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_interesticial_image_file_temp, $cs_interesticial_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_interesticial_image   = '$cs_interesticial_image_uploaded_image',
                 cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else if (!empty($cs_native_image_file_name)) {

                if ($cs_native_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_native_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>Three You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_native_image_file_temp, $cs_native_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_native_image   = '$cs_native_image_uploaded_image',
                 cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else {

                $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_add_type   = '$cs_add_type',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'

                where id = '$id';

                ";

                $update_row = $this->db->update($query);
                if ($update_row) {
                    header('Content-type: application/json');
                    header('Accept: application/json');
                    return json_encode([
                        "status" => "success",
                        "msg"    => "Advertisement Successfully Update",
                    ]);

                } else {
                    header('Content-type: application/json');
                    header('Accept: application/json');
                    return json_encode([
                        "status" => "server_error",
                        "msg"    => "Update Failed",
                    ]);

                }

            }

        }

    }

    public function createAddForMobile($data, $file)
    {

        $gg_add_type                   = $this->fm->validation($data['gg_add_type']);
        $gg_admob_id                   = $this->fm->validation($data['gg_admob_id']);
        $gg_interesticial_admob_id     = $this->fm->validation($data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = $this->fm->validation($data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = $this->fm->validation($data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = $this->fm->validation($data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = $this->fm->validation($data['gg_native_ad_per_video_series']);
        $fb_add_type                   = $this->fm->validation($data['fb_add_type']);
        $fb_admob_id                   = $this->fm->validation($data['fb_admob_id']);
        $fb_interesticial_admob_id     = $this->fm->validation($data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = $this->fm->validation($data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = $this->fm->validation($data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = $this->fm->validation($data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = $this->fm->validation($data['fb_native_ad_per_video_series']);
        $cs_add_type                   = $this->fm->validation($data['cs_add_type']);
        $cs_banner_admob_link          = $this->fm->validation($data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = $this->fm->validation($data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = $this->fm->validation($data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = $this->fm->validation($data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = $this->fm->validation($data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = $this->fm->validation($data['cs_native_ad_per_video_series']);
        $startup_add_type              = $this->fm->validation($data['startup_add_type']);
        $startup_ad_id                 = $this->fm->validation($data['startup_ad_id']);

        $gg_add_type                   = mysqli_real_escape_string($this->db->link, $data['gg_add_type']);
        $gg_admob_id                   = mysqli_real_escape_string($this->db->link, $data['gg_admob_id']);
        $gg_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_series']);
        $fb_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_series']);
        $cs_add_type                   = mysqli_real_escape_string($this->db->link, $data['cs_add_type']);
        $cs_banner_admob_link          = mysqli_real_escape_string($this->db->link, $data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = mysqli_real_escape_string($this->db->link, $data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_series']);
        $startup_add_type              = mysqli_real_escape_string($this->db->link, $data['startup_add_type']);
        $startup_ad_id                 = mysqli_real_escape_string($this->db->link, $data['startup_ad_id']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $cs_banner_image_file_name      = $file['cs_banner_image']['name'];
        $cs_banner_image_file_size      = $file['cs_banner_image']['size'];
        $cs_banner_image_file_temp      = $file['cs_banner_image']['tmp_name'];
        $cs_banner_image_div            = explode('.', $cs_banner_image_file_name);
        $cs_banner_image_file_ext       = strtolower(end($cs_banner_image_div));
        $cs_banner_image_unique_image   = substr(md5(time()), 0, 10) . '1' . '.' . $cs_banner_image_file_ext;
        $cs_banner_image_uploaded_image = "uploads/" . $cs_banner_image_unique_image;

        $cs_interesticial_image_file_name      = $file['cs_interesticial_image']['name'];
        $cs_interesticial_image_file_size      = $file['cs_interesticial_image']['size'];
        $cs_interesticial_image_file_temp      = $file['cs_interesticial_image']['tmp_name'];
        $cs_interesticial_image_div            = explode('.', $cs_interesticial_image_file_name);
        $cs_interesticial_image_file_ext       = strtolower(end($cs_interesticial_image_div));
        $cs_interesticial_image_unique_image   = substr(md5(time()), 0, 10) . '2' . '.' . $cs_interesticial_image_file_ext;
        $cs_interesticial_image_uploaded_image = "uploads/" . $cs_interesticial_image_unique_image;

        $cs_native_image_file_name      = $file['cs_native_image']['name'];
        $cs_native_image_file_size      = $file['cs_native_image']['size'];
        $cs_native_image_file_temp      = $file['cs_native_image']['tmp_name'];
        $cs_native_image_div            = explode('.', $cs_native_image_file_name);
        $cs_native_image_file_ext       = strtolower(end($cs_native_image_div));
        $cs_native_image_unique_image   = substr(md5(time()), 0, 10) . '3' . '.' . $cs_native_image_file_ext;
        $cs_native_image_uploaded_image = "uploads/" . $cs_native_image_unique_image;

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';

        // echo '<pre>';
        // print_r($file);
        // echo '<pre>';
        // die;

        if ($gg_admob_id == '') {
            $msg = "<div class='alert alert-danger mt-2'> Field Must Not Be Empty!!!</div>";
            return $msg;

        } elseif ($cs_banner_image_file_size > 1048567) {
            $msg = "<div class='alert alert-danger mt-2'>Image Size should be less then 1MB! </div>";
            return $msg;
        } elseif (in_array($cs_banner_image_file_ext, $permited) === false) {
            $msg = "<div class='alert alert-danger mt-2'>You can upload only:-"
            . implode(', ', $permited) . " </div>";
            return $msg;
        } else {
            move_uploaded_file($cs_banner_image_file_temp, $cs_banner_image_uploaded_image);
            move_uploaded_file($cs_interesticial_image_file_temp, $cs_interesticial_image_uploaded_image);
            move_uploaded_file($cs_native_image_file_temp, $cs_native_image_uploaded_image);
            $query = "insert into tbl_mobile_adds (gg_admob_id,gg_add_type,gg_interesticial_admob_id,gg_interesticial_admob_click,gg_native_admob_id,gg_native_ad_per_video_like,gg_native_ad_per_video_series,fb_admob_id,fb_add_type,fb_interesticial_admob_id,fb_interesticial_admob_click,fb_native_admob_id,fb_native_ad_per_video_like,fb_native_ad_per_video_series,cs_banner_image,cs_add_type,cs_interesticial_image,cs_banner_admob_link,cs_interesticial_ad_link,cs_native_image,cs_Interesticial_admob_click,cs_native_ad_link,cs_native_ad_per_video_like,cs_native_ad_per_video_series,startup_ad_id,startup_add_type)
               value ('$gg_admob_id','$gg_add_type','$gg_interesticial_admob_id','$gg_interesticial_admob_click','$gg_native_admob_id','$gg_native_ad_per_video_like','$gg_native_ad_per_video_series','$	$fb_admob_id','$fb_add_type','$fb_interesticial_admob_id','$fb_interesticial_admob_click','$fb_native_admob_id','$fb_native_ad_per_video_like','$fb_native_ad_per_video_series','$cs_banner_image_uploaded_image','$cs_add_type','$cs_interesticial_image_uploaded_image','$cs_banner_admob_link','$cs_interesticial_ad_link','$cs_native_image_uploaded_image','$cs_Interesticial_admob_click','$cs_native_ad_link','$cs_native_ad_per_video_like','$cs_native_ad_per_video_series','$startup_ad_id','$startup_add_type');
               ";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                $msg = "<div class='alert alert-success'>Advertisement Successfully Added</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger mt-2'>Insert Failed</div>";
                return $msg;
            }
        }

    }

    public function getAdvertisement()
    {
        $query  = "select * from tbl_mobile_adds where id = '1'";
        $result = $this->db->select($query);
        return $result;

    }

    public function updateAddForMobile($data, $file)
    {

        $id                            = $this->fm->validation($data['id']);
        $gg_add_type                   = $this->fm->validation($data['gg_add_type']);
        $gg_admob_id                   = $this->fm->validation($data['gg_admob_id']);
        $gg_interesticial_admob_id     = $this->fm->validation($data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = $this->fm->validation($data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = $this->fm->validation($data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = $this->fm->validation($data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = $this->fm->validation($data['gg_native_ad_per_video_series']);
        $fb_add_type                   = $this->fm->validation($data['fb_add_type']);
        $fb_admob_id                   = $this->fm->validation($data['fb_admob_id']);
        $fb_interesticial_admob_id     = $this->fm->validation($data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = $this->fm->validation($data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = $this->fm->validation($data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = $this->fm->validation($data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = $this->fm->validation($data['fb_native_ad_per_video_series']);
        $cs_add_type                   = $this->fm->validation($data['cs_add_type']);
        $cs_banner_admob_link          = $this->fm->validation($data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = $this->fm->validation($data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = $this->fm->validation($data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = $this->fm->validation($data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = $this->fm->validation($data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = $this->fm->validation($data['cs_native_ad_per_video_series']);
        $startup_add_type              = $this->fm->validation($data['startup_add_type']);
        $startup_ad_id                 = $this->fm->validation($data['startup_ad_id']);

        $gg_add_type                   = mysqli_real_escape_string($this->db->link, $data['gg_add_type']);
        $gg_admob_id                   = mysqli_real_escape_string($this->db->link, $data['gg_admob_id']);
        $gg_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_id']);
        $gg_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['gg_interesticial_admob_click']);
        $gg_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['gg_native_admob_id']);
        $gg_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_like']);
        $gg_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['gg_native_ad_per_video_series']);
        $fb_interesticial_admob_id     = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_id']);
        $fb_interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['fb_interesticial_admob_click']);
        $fb_native_admob_id            = mysqli_real_escape_string($this->db->link, $data['fb_native_admob_id']);
        $fb_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_like']);
        $fb_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['fb_native_ad_per_video_series']);
        $cs_add_type                   = mysqli_real_escape_string($this->db->link, $data['cs_add_type']);
        $cs_banner_admob_link          = mysqli_real_escape_string($this->db->link, $data['cs_banner_admob_link']);
        $cs_interesticial_ad_link      = mysqli_real_escape_string($this->db->link, $data['cs_interesticial_ad_link']);
        $cs_Interesticial_admob_click  = mysqli_real_escape_string($this->db->link, $data['cs_Interesticial_admob_click']);
        $cs_native_ad_link             = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_link']);
        $cs_native_ad_per_video_like   = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_like']);
        $cs_native_ad_per_video_series = mysqli_real_escape_string($this->db->link, $data['cs_native_ad_per_video_series']);
        $startup_add_type              = mysqli_real_escape_string($this->db->link, $data['startup_add_type']);
        $startup_ad_id                 = mysqli_real_escape_string($this->db->link, $data['startup_ad_id']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $cs_banner_image_file_name      = $file['cs_banner_image']['name'];
        $cs_banner_image_file_size      = $file['cs_banner_image']['size'];
        $cs_banner_image_file_temp      = $file['cs_banner_image']['tmp_name'];
        $cs_banner_image_div            = explode('.', $cs_banner_image_file_name);
        $cs_banner_image_file_ext       = strtolower(end($cs_banner_image_div));
        $cs_banner_image_unique_image   = substr(md5(time()), 0, 10) . '1' . '.' . $cs_banner_image_file_ext;
        $cs_banner_image_uploaded_image = "uploads/" . $cs_banner_image_unique_image;

        $cs_interesticial_image_file_name      = $file['cs_interesticial_image']['name'];
        $cs_interesticial_image_file_size      = $file['cs_interesticial_image']['size'];
        $cs_interesticial_image_file_temp      = $file['cs_interesticial_image']['tmp_name'];
        $cs_interesticial_image_div            = explode('.', $cs_interesticial_image_file_name);
        $cs_interesticial_image_file_ext       = strtolower(end($cs_interesticial_image_div));
        $cs_interesticial_image_unique_image   = substr(md5(time()), 0, 10) . '2' . '.' . $cs_interesticial_image_file_ext;
        $cs_interesticial_image_uploaded_image = "uploads/" . $cs_interesticial_image_unique_image;

        $cs_native_image_file_name      = $file['cs_native_image']['name'];
        $cs_native_image_file_size      = $file['cs_native_image']['size'];
        $cs_native_image_file_temp      = $file['cs_native_image']['tmp_name'];
        $cs_native_image_div            = explode('.', $cs_native_image_file_name);
        $cs_native_image_file_ext       = strtolower(end($cs_native_image_div));
        $cs_native_image_unique_image   = substr(md5(time()), 0, 10) . '3' . '.' . $cs_native_image_file_ext;
        $cs_native_image_uploaded_image = "uploads/" . $cs_native_image_unique_image;

        // var_dump($cs_banner_image_uploaded_image,$cs_interesticial_image_uploaded_image,$cs_native_image_uploaded_image);
        // die;

        if ($gg_admob_id == '') {
            $msg = "<div class='alert alert-danger mt-2'>Field Must Not Be Empty!!!</div>";
            return $msg;
        } else {

            if (!empty($cs_banner_image_file_name)) {

                if ($cs_banner_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_banner_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>One You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_banner_image_file_temp, $cs_banner_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_banner_image   = '$cs_banner_image_uploaded_image',
                cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else if (!empty($cs_interesticial_image_file_name)) {

                if ($cs_interesticial_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_interesticial_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>Two You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_interesticial_image_file_temp, $cs_interesticial_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_interesticial_image   = '$cs_interesticial_image_uploaded_image',
                 cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else if (!empty($cs_native_image_file_name)) {

                if ($cs_native_image_file_size > 1048567) {

                    $msg = "<div class='alert alert-success'>Image Size should be less then 1MB! </div>";

                    return $msg;

                } elseif (in_array($cs_native_image_file_ext, $permited) === false) {
                    $msg = "<div class='alert alert-error'>Three You can upload only:-"
                    . implode(', ', $permited) . " </div>";

                    return $msg;

                } else {

                    move_uploaded_file($cs_native_image_file_temp, $cs_native_image_uploaded_image);
                    $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_native_image   = '$cs_native_image_uploaded_image',
                 cs_add_type   = '$cs_add_type',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'


                where id = '$id';

                ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {

                        $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                        return $msg;

                    } else {
                        $msg = "<div class='alert alert-error'>Update Fails</div>";
                        return $msg;
                    }

                }
            } else {

                $query = "update tbl_mobile_adds

                set
                gg_admob_id = '$gg_admob_id',
                gg_add_type = '$gg_add_type',
                gg_interesticial_admob_id = '$gg_interesticial_admob_id',
                gg_interesticial_admob_click = '$gg_interesticial_admob_click',
                gg_native_admob_id = '$gg_native_admob_id',
                gg_native_ad_per_video_like  = '$gg_native_ad_per_video_like',
                gg_native_ad_per_video_series   = '$gg_native_ad_per_video_series',
                fb_admob_id = '$fb_admob_id',
                fb_add_type = '$fb_add_type',
                fb_interesticial_admob_id = '$fb_interesticial_admob_id',
                fb_interesticial_admob_click = '$fb_interesticial_admob_click',
                fb_native_admob_id = '$fb_native_admob_id',
                fb_native_ad_per_video_like = '$fb_native_ad_per_video_like',
                fb_native_ad_per_video_series = '$fb_native_ad_per_video_series',
                cs_banner_admob_link = '$cs_banner_admob_link',
                cs_add_type   = '$cs_add_type',
                cs_interesticial_ad_link = '$cs_interesticial_ad_link',
                cs_Interesticial_admob_click = '$cs_Interesticial_admob_click',
                cs_native_ad_link = '$cs_native_ad_link',
                cs_native_ad_per_video_like = '$cs_native_ad_per_video_like',
                cs_native_ad_per_video_series = '$cs_native_ad_per_video_series',
                startup_ad_id = '$startup_ad_id',
                startup_add_type = '$startup_add_type'

                where id = '$id';

                ";

                $update_row = $this->db->update($query);
                if ($update_row) {

                    $msg = "<div class='alert alert-success'>Settings  Successfully Update</div>";
                    return $msg;

                } else {
                    $msg = "<div class='alert alert-error'>Update Fails</div>";
                    return $msg;

                }

            }

        }

    }

    public function CreateMngNotifiForMobile($data)
    {
        $api_key = $this->fm->validation($data['mb_api_key']);
        $api_id  = $this->fm->validation($data['mb_api_id']);

        $api_key = mysqli_real_escape_string($this->db->link, $data['mb_api_key']);
        $api_id  = mysqli_real_escape_string($this->db->link, $data['mb_api_id']);

        if ($api_key == '' || $api_id == '') {
            $msg = "<div class='alert alert-danger mt-2'> Mobile Field Must Not Be Empty!!!</div>";
            return $msg;
        } else {
            $query = "insert into tbl_manage_notification (api_key,api_id)
               value ('$api_key','$api_id');
               ";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                Session::set("apiId", $api_id);
                $msg = "<div class='alert alert-success'>Settings Successfully Added</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger mt-2'>Insert Failed</div>";
                return $msg;
            }
        }

    }

    public function getMobileNotification()
    {
        $query  = "select * from tbl_manage_notification where id = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateMngNotifiForMobile($data)
    {
        $api_key = $this->fm->validation($data['mb_api_key']);
        $api_id  = $this->fm->validation($data['mb_api_id']);

        $api_key = mysqli_real_escape_string($this->db->link, $data['mb_api_key']);
        $api_id  = mysqli_real_escape_string($this->db->link, $data['mb_api_id']);

        if ($api_key == '' || $api_id == '') {
            $msg = "<div class='alert alert-danger mt-2'> Mobile Field Must Not Be Empty!!!</div>";
            return $msg;
        } else {
            $query = "update tbl_manage_notification
            set
            api_key = '$api_key',
            api_id = '$api_id'
            where id = 1;
            ";
            $update_row = $this->db->update($query);
            if ($update_row) {
                Session::set("apiId", $api_id);

                $msg = "<div class='alert alert-success'>Update Successfully</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger mt-2'>Update Failed</div>";
                return $msg;
            }
        }

    }

    public function getNotification()
    {
        $query  = "select * from tbl_notification order by id desc";
        $result = $this->db->select($query);
        return $result;

    }

    public function NotidicationDel($delId)
    {
        $query   = "delete  from  tbl_notification where id='$delId' ";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<div class='alert alert-warning'>Successfully Delete</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger mt-2'>Insert Failed</div>";
            return $msg;
        }

    }

    public function randomString($length = 32, $string = "0123456789abcdefghijklmnopqrstuvwxyz")
    {
        return substr(str_shuffle($string), 0, $length);
    }

    public function userLogin($data)
    {

        try {
            $email    = $data['email'];
            $password = $data['password'];

            if ($email == "" || $password == "") {
                header('Content-type: application/json');
                header('Accept: application/json');

                return json_encode([
                    "status" => "validation_error",
                    "msg"    => "Field Must Not Be Empty",
                ]);

            }

            $password = mysqli_real_escape_string($this->db->link, md5($password));

            $query  = "select * from tbl_user where email = '$email' and password='$password'";
            $result = $this->db->select($query);
            $user   = $result->fetch_assoc();

            if ($result != false) {
                $userId     = $user['user_id'];
                $expireDate = date('Y-m-d', strtotime('+7 days'));
                $token      = $this->randomString();
                $name       = "authenticate";

                $query  = "insert into access_token (user_id,name,token,expire_date	) value('$userId','$name','$token','$expireDate')";
                $result = $this->db->insert($query);
                // var_dump($result);
                // die;

                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "success",
                    "msg"    => "Successfully Login",
                    "data"   => $token,
                ]);
                // $value = $result->fetch_assoc();

            } else {
                header('Content-type: application/json');
                header('Accept: application/json');
                return json_encode([
                    "status" => "server_error",
                    "msg"    => "Email or Password Did Not Match",
                ]);
            }

        } catch (Exception $e) {
            header('Content-type: application/json');
            header('Accept: application/json');
            return json_encode([
                "status" => "success",
                "msg"    => "Succesfully Login",

            ]);

        }
    }

}
?>
