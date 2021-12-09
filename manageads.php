<?php
include "inc/header.php";
include 'api_class/Service.php';

$ads = new Service();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])) {
    $createAddForMobile = $ads->createAddForMobile($_POST, $_FILES);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $updateAddForMobile = $ads->updateAddForMobile($_POST, $_FILES);
}
$getAdvertisement = $ads->getAdvertisement();
?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.php -->
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>
                Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                    aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                    aria-controls="chats-section">CHATS</a>
            </li>
        </ul>
        <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                    <form class="form w-100">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Add To-do" />
                            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
                <div class="list-wrapper px-3">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" />
                                    Team review meeting at 3.00 PM
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" />
                                    Prepare for presentation
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" />
                                    Resolve all the low priority tickets due today
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked />
                                    Schedule meeting for next week
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked />
                                    Project review
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                    </ul>
                </div>
                <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">
                    Events
                </h4>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 11 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">
                        Creating component page build a js
                    </p>
                    <p class="text-gray mb-0">The total number of sessions</p>
                </div>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 7 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">
                        Meeting with Alisa
                    </p>
                    <p class="text-gray mb-0">Call Sarah Graves</p>
                </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="
                  d-flex
                  align-items-center
                  justify-content-between
                  border-bottom
                ">
                    <p class="
                    settings-heading
                    border-top-0
                    mb-3
                    pl-3
                    pt-0
                    border-bottom-0
                    pb-0
                  ">
                        Friends
                    </p>
                    <small class="
                    settings-heading
                    border-top-0
                    mb-3
                    pt-0
                    border-bottom-0
                    pb-0
                    pr-3
                    font-weight-normal
                  ">See All</small>
                </div>
                <ul class="chat-list">
                    <li class="list active">
                        <div class="profile">
                            <img src="images/faces/face1.jpg" alt="image" /><span class="online"></span>
                        </div>
                        <div class="info">
                            <p>Thomas Douglas</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                    </li>
                    <li class="list">
                        <div class="profile">
                            <img src="images/faces/face2.jpg" alt="image" /><span class="offline"></span>
                        </div>
                        <div class="info">
                            <div class="wrapper d-flex">
                                <p>Catherine</p>
                            </div>
                            <p>Away</p>
                        </div>
                        <div class="badge badge-success badge-pill my-auto mx-2">
                            4
                        </div>
                        <small class="text-muted my-auto">23 min</small>
                    </li>
                    <li class="list">
                        <div class="profile">
                            <img src="images/faces/face3.jpg" alt="image" /><span class="online"></span>
                        </div>
                        <div class="info">
                            <p>Daniel Russell</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">14 min</small>
                    </li>
                    <li class="list">
                        <div class="profile">
                            <img src="images/faces/face4.jpg" alt="image" /><span class="offline"></span>
                        </div>
                        <div class="info">
                            <p>James Richardson</p>
                            <p>Away</p>
                        </div>
                        <small class="text-muted my-auto">2 min</small>
                    </li>
                    <li class="list">
                        <div class="profile">
                            <img src="images/faces/face5.jpg" alt="image" /><span class="online"></span>
                        </div>
                        <div class="info">
                            <p>Madeline Kennedy</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">5 min</small>
                    </li>
                    <li class="list">
                        <div class="profile">
                            <img src="images/faces/face6.jpg" alt="image" /><span class="online"></span>
                        </div>
                        <div class="info">
                            <p>Sarah Graves</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">47 min</small>
                    </li>
                </ul>
            </div>
            <!-- chat tab ends -->
        </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.php -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notification.php">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Notifications</span>

                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="manageads.php">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Manage Ads</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="membership.php" aria-expanded="false">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Membership</span>
                </a>
            </li>


        </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin ">
                    <h3>Ad Manage</h3>
                    <div class="main_content">

                        <!-- add player -->
                        <div>
<?php
if (isset($createAddForMobile)) {
    echo $createAddForMobile;
}
if (isset($updateAddForMobile)) {
    echo $updateAddForMobile;
}
?>
<div class="row" id="showManageAds">
<?php
if ($getAdvertisement) {
    while ($result = $getAdvertisement->fetch_assoc()) {
        ?>
            <form  method="POST" enctype="multipart/form-data"
              action="">
               <input type="hidden" name="id" id="" value="<?=$result['id'];?>">
              <div class="row margin-top-40">
                <div class="col-md-6 google-ad">
                  <div class="add-content">
                    <div class="ad-title">
                      <div class="row">
                        <div class="col-md-10"><span class="title">Google Ad</span>
                        </div>
                        <!-- <input type="hidden" name="gg_add_type" value="google"> -->
                        <div class="col-md-2">
                          <div class="form-check form-switch">
                            <input
                            <?php
if ($result['gg_add_type'] === 'on') {?> checked <?php }?>
                             class="form-check-input" name="gg_add_type" type="checkbox"
                              id="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ad-body">
                      <div class="form-group">
                        <label for="googleBannerAdmob">Banner Admob ID</label>
                        <input type="text" name="gg_admob_id" class="form-control create-form"
                          id="googleBannerAdmob" value="<?=$result['gg_admob_id'];?>">
                      </div>
                      <div class="form-group">
                        <label for="googleInteresticialAdmob">Interesticial Admob ID</label>
                        <input type="text" name="gg_interesticial_admob_id" class="form-control create-form"
                          id="googleInteresticialAdmob" value="<?=$result['gg_interesticial_admob_id'];?>">
                      </div>
                      <div class="interesticial-details">
                        <div class="form-group">
                          <label for="googleInteresticialAdmobClick">Interesticial Admob Click</label>
                          <input type="number" name="gg_interesticial_admob_click" value="<?=$result['gg_interesticial_admob_click'];?>"
                            class="form-control create-form" id="googleInteresticialAdmobClick">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="googleNativeAdmob">Native Admob ID</label>
                        <input type="text" name="gg_native_admob_id" class="form-control create-form"
                          id="googleNativeAdmob" value="<?=$result['gg_native_admob_id'];?>">
                      </div>
                      <div class="native-details">
                        <div class="form-group">
                          <label for="googlNativeAddPerVideo">Native Ad Per Video (You May Also
                            Like)</label>
                          <input type="number" name="gg_native_ad_per_video_like" value="<?=$result['gg_native_ad_per_video_like'];?>"
                            class="form-control create-form" id="googlNativeAddPerVideo">
                        </div>
                        <div class="form-group">
                          <label for="googlNativeAddPerVideoSeries">Native Ad Per Video (For
                            Series)</label>
                          <input type="number" name="gg_native_ad_per_video_series" value="<?=$result['gg_native_ad_per_video_series'];?>"
                            class="form-control create-form" id="googlNativeAddPerVideoSeries">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



                <div class="col-md-6 fb-ad">
                  <div class="add-content">
                    <div class="ad-title-fb">
                      <div class="row">
                        <div class="col-md-10"><span class="title">Facebook Ad</span></div>

                        <!-- <input type="hidden" name="fb_add_type" value="facebook"> -->

                        <div class="col-md-2">
                          <div class="form-check form-switch">
                            <input
                            <?php
if ($result['fb_add_type'] === 'on') {?> checked <?php }?>
                            class="form-check-input" name="fb_add_type" type="checkbox"
                              id="facebookStatus">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="ad-body">
                      <div class="form-group">
                        <label for="facebookBannerAdmob">Banner Admob ID</label>
                        <input type="text" name="fb_admob_id" class="form-control create-form"
                          id="facebookBannerAdmob" value="<?=$result['fb_admob_id'];?>">
                      </div>

                      <div class="form-group">
                        <label for="facebookInteresticialAdmob">Interesticial Admob ID</label>
                        <input type="text" name="fb_interesticial_admob_id" value="<?=$result['fb_interesticial_admob_id'];?>" class="form-control create-form"
                          id="facebookInteresticialAdmob">
                      </div>
                      <div class="interesticial-details">
                        <div class="form-group">
                          <label for="facebookInteresticialAdmobClick">Interesticial Admob Click</label>
                          <input type="number" name="fb_interesticial_admob_click" value="<?=$result['fb_interesticial_admob_click'];?>"
                            class="form-control create-form" id="facebookInteresticialAdmobClick">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="facebookNativeAdmob">Native Admob ID</label>
                        <input type="text" name="fb_native_admob_id" class="form-control create-form"
                          id="facebookNativeAdmob" value="<?=$result['fb_native_admob_id'];?>">
                      </div>

                      <div class="native-details">
                        <div class="form-group">
                          <label for="facebookNativeAddPerVideo">Native Ad Per Video (You May Also
                            Like)</label>
                          <input type="number" name="fb_native_ad_per_video_like" value="<?=$result['fb_native_ad_per_video_like'];?>"
                            class="form-control create-form" id="facebookNativeAddPerVideo">
                        </div>
                        <div class="form-group">
                          <label for="facebookNativeAddPerVideoSeries">Native Ad Per Video (For
                            Series)</label>
                          <input type="number" name="fb_native_ad_per_video_series" value="<?=$result['fb_native_ad_per_video_series'];?>"
                            class="form-control create-form" id="facebookNativeAddPerVideoSeries">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>




                <div class="col-md-12 custom-ad margin-top-40">
                  <div class="add-content">
                    <div class="ad-title">
                      <div class="row">
                        <div class="col-md-10"><span class="title">Custom Ad</span></div>

                        <!-- <input type="hidden" name="cs_add_type" value="custom"> -->


                        <div class="col-md-2">
                          <div class="form-check form-switch">
                            <input
                            <?php
if ($result['cs_add_type'] === 'on') {?> checked <?php }?>

                            class="form-check-input" name="cs_add_type" type="checkbox"
                              id="customStatus">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ad-body">
                      <div class="row">
                        <div class="col-md-6 custom-banner">
                          <div class="form-group">
                              <img src="<?=$result['cs_banner_image']?>" height="50" width="80" alt=""> <br>
                            <label for="bannerImage">Upload Banner Image</label><br>

                            <input type="file" name="cs_banner_image" class="form-control-file" id="bannerImage">
                          </div>

                          <div class="form-group margin-top-20">
                            <label for="customBannerAdmob">Banner Admob Link</label>
                            <input type="text" name="cs_banner_admob_link" value="<?=$result['cs_banner_admob_link'];?>" class="form-control create-form"
                              id="customBannerAdmob">
                          </div>
                        </div>
                        <div class="col-md-6 custom-interseticial">

                          <div class="form-group">
                             <img src="<?=$result['cs_interesticial_image']?>" height="50" width="80" alt=""> <br>
                            <label for="interesticialImage">Upload Interesticial Image</label><br>
                            <input type="file" name="cs_interesticial_image" class="form-control-file"
                              id="interesticialImage">
                          </div>

                          <div class="form-group margin-top-20">
                            <label for="interesticialBannerLink">Interesticial AD Link</label>
                            <input type="text" name="cs_interesticial_ad_link" value="<?=$result['cs_interesticial_ad_link'];?>"
                              class="form-control create-form" id="interesticialBannerLink">
                          </div>


                          <div class="form-group">
                            <label for="customInteresticialAdmobClick">Interesticial Admob Click</label>
                            <input type="number" name="cs_Interesticial_admob_click" value="<?=$result['cs_Interesticial_admob_click'];?>"
                              class="form-control create-form" id="customInteresticialAdmobClick">
                          </div>
                        </div>

                        <div class="col-md-6 native-interseticial">

                          <div class="form-group">
                            <img src="<?=$result['cs_native_image']?>" height="50" width="80" alt=""> <br>
                            <label for="nativeImage">Upload Native Image</label><br>
                            <input type="file" name="cs_native_image" class="form-control-file" id="nativeImage">
                          </div>

                          <div class="form-group margin-top-20">
                            <label for="nativeNativeAdmob">Native AD Link</label>
                            <input type="text" name="cs_native_ad_link" value="<?=$result['cs_native_ad_link'];?>" class="form-control create-form"
                              id="nativeNativeAdmob">
                          </div>

                          <div class="form-group">
                            <label for="customNativeAddPerVideo">Native Ad Per Video (You May Also
                              Like)</label>
                            <input type="number" name="cs_native_ad_per_video_like" value="<?=$result['cs_native_ad_per_video_like'];?>"
                              class="form-control create-form" id="customNativeAddPerVideo">
                          </div>

                          <div class="form-group">
                            <label for="customNativeAddPerVideoSeries">Native Ad Per Video (For
                              Series)</label>
                            <input type="number" name="cs_native_ad_per_video_series" value="<?=$result['cs_native_ad_per_video_series'];?>"
                              class="form-control create-form" id="customNativeAddPerVideoSeries">
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>




                <div class="col-md-12 startup-ad margin-top-40">
                  <div class="add-content">
                    <div class="ad-title-bk">
                      <div class="row">
                        <div class="col-md-10"><span class="title">Startup Ad</span></div>

                        <!-- <input type="hidden" name="startup_add_type" value="startup"> -->


                        <div class="col-md-2">
                          <div class="form-check form-switch">
                            <input
                            <?php
if ($result['startup_add_type'] === 'on') {?> checked <?php }?>
                            class="form-check-input" name="startup_add_type" type="checkbox"
                              id="startupStatus"  >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ad-body">
                      <div class="row">
                        <div class="col-md-6 startup-banner">

                          <div class="form-group margin-top-20">
                            <label for="startupBannerAdmob">Startup AD ID</label>
                            <input type="text" name="startup_ad_id" value="<?=$result['startup_ad_id'];?>" class="form-control create-form"
                              id="startupBannerAdmob">
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12 actions margin-top-20">
                  <button type="submit" class="btn btn-success my-3" name="update">Update</button>

                </div>

              </div>
            </form>
<?php }} else {?>
                                <form method="POST" id="manageAdds" enctype="multipart/form-data" action="">
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="row margin-top-40">
                                        <div class="col-md-6 google-ad">
                                            <div class="add-content">
                                                <div class="ad-title">
                                                    <div class="row">
                                                        <div class="col-md-10"><span class="title">Google Ad</span>
                                                        </div>
                                                        <!-- <input type="hidden" name="gg_add_type" value="google"> -->
                                                        <div class="col-md-2">

                                                            <div class="form-check form-switch">
                                                                <input checked="" class="form-check-input"
                                                                    name="gg_add_type" type="checkbox" id="gg_add_type">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ad-body">
                                                    <div class="form-group">
                                                        <label for="googleBannerAdmob">Banner Admob ID</label>
                                                        <input type="text" name="gg_admob_id"
                                                            class="form-control create-form" id="gg_admob_id" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="googleInteresticialAdmob">Interesticial Admob
                                                            ID</label>
                                                        <input type="text" name="gg_interesticial_admob_id"
                                                            class="form-control create-form"
                                                            id="gg_interesticial_admob_id" value="">
                                                    </div>
                                                    <div class="interesticial-details">
                                                        <div class="form-group">
                                                            <label for="googleInteresticialAdmobClick">Interesticial
                                                                Admob Click</label>
                                                            <input type="number" name="gg_interesticial_admob_click"
                                                                value="" class="form-control create-form"
                                                                id="gg_interesticial_admob_click">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="googleNativeAdmob">Native Admob ID</label>
                                                        <input type="text" name="gg_native_admob_id"
                                                            class="form-control create-form" id="gg_native_admob_id"
                                                            value="">
                                                    </div>
                                                    <div class="native-details">
                                                        <div class="form-group">
                                                            <label for="googlNativeAddPerVideo">Native Ad Per Video (You
                                                                May Also
                                                                Like)</label>
                                                            <input type="number" name="gg_native_ad_per_video_like"
                                                                value="" class="form-control create-form"
                                                                id="gg_native_ad_per_video_like">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="googlNativeAddPerVideoSeries">Native Ad Per
                                                                Video (For
                                                                Series)</label>
                                                            <input type="number" name="gg_native_ad_per_video_series"
                                                                value="" class="form-control create-form"
                                                                id="gg_native_ad_per_video_series">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-6 fb-ad">
                                            <div class="add-content">
                                                <div class="ad-title-fb">
                                                    <div class="row">
                                                        <div class="col-md-10"><span class="title">Facebook Ad</span>
                                                        </div>

                                                        <!-- <input type="hidden" name="fb_add_type" value="facebook"> -->

                                                        <div class="col-md-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" name="fb_add_type"
                                                                    type="checkbox" id="fb_add_type">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="ad-body">
                                                    <div class="form-group">
                                                        <label for="facebookBannerAdmob">Banner Admob ID</label>
                                                        <input type="text" name="fb_admob_id"
                                                            class="form-control create-form" id="fb_admob_id" value="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="facebookInteresticialAdmob">Interesticial Admob
                                                            ID</label>
                                                        <input type="text" name="fb_interesticial_admob_id" value=""
                                                            class="form-control create-form"
                                                            id="fb_interesticial_admob_id">
                                                    </div>
                                                    <div class="interesticial-details">
                                                        <div class="form-group">
                                                            <label for="facebookInteresticialAdmobClick">Interesticial
                                                                Admob Click</label>
                                                            <input type="number" name="fb_interesticial_admob_click"
                                                                value="" class="form-control create-form"
                                                                id="fb_interesticial_admob_click">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="facebookNativeAdmob">Native Admob ID</label>
                                                        <input type="text" name="fb_native_admob_id"
                                                            class="form-control create-form" id="fb_native_admob_id"
                                                            value="">
                                                    </div>

                                                    <div class="native-details">
                                                        <div class="form-group">
                                                            <label for="facebookNativeAddPerVideo">Native Ad Per Video
                                                                (You May Also
                                                                Like)</label>
                                                            <input type="number" name="fb_native_ad_per_video_like"
                                                                value="" class="form-control create-form"
                                                                id="fb_native_ad_per_video_like">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="facebookNativeAddPerVideoSeries">Native Ad Per
                                                                Video (For
                                                                Series)</label>
                                                            <input type="number" name="fb_native_ad_per_video_series"
                                                                value="" class="form-control create-form"
                                                                id="fb_native_ad_per_video_series">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 custom-ad margin-top-40">
                                            <div class="add-content">
                                                <div class="ad-title">
                                                    <div class="row">
                                                        <div class="col-md-10"><span class="title">Custom Ad</span>
                                                        </div>

                                                        <!-- <input type="hidden" name="cs_add_type" value="custom"> -->


                                                        <div class="col-md-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" name="cs_add_type"
                                                                    type="checkbox" id="cs_add_type">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ad-body">
                                                    <div class="row">
                                                        <div class="col-md-6 custom-banner">
                                                            <div class="form-group">
                                                                <img src="uploads/a3a05f20681.png" height="50"
                                                                    width="80" alt=""> <br>
                                                                <label for="bannerImage">Upload Banner Image</label><br>
                                                                <input type="file" name="cs_banner_image"
                                                                    class="form-control-file" id="cs_banner_image">
                                                            </div>

                                                            <div class="form-group margin-top-20">
                                                                <label for="customBannerAdmob">Banner Admob Link</label>
                                                                <input type="text" name="cs_banner_admob_link" value=""
                                                                    class="form-control create-form"
                                                                    id="cs_banner_admob_link">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 custom-interseticial">

                                                            <div class="form-group">
                                                                <img src="uploads/bdc16bffa22.png" height="50"
                                                                    width="80" alt=""> <br>
                                                                <label for="interesticialImage">Upload Interesticial
                                                                    Image</label><br>
                                                                <input type="file" name="cs_interesticial_image"
                                                                    class="form-control-file"
                                                                    id="cs_interesticial_image">
                                                            </div>

                                                            <div class="form-group margin-top-20">
                                                                <label for="interesticialBannerLink">Interesticial AD
                                                                    Link</label>
                                                                <input type="text" name="cs_interesticial_ad_link"
                                                                    value="" class="form-control create-form"
                                                                    id="cs_interesticial_ad_link">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="customInteresticialAdmobClick">Interesticial
                                                                    Admob Click</label>
                                                                <input type="number" name="cs_Interesticial_admob_click"
                                                                    value="" class="form-control create-form"
                                                                    id="cs_Interesticial_admob_click">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 native-interseticial">

                                                            <div class="form-group">
                                                                <img src="uploads/a22e04d3733.png" height="50"
                                                                    width="80" alt=""> <br>
                                                                <label for="nativeImage">Upload Native Image</label><br>
                                                                <input type="file" name="cs_native_image"
                                                                    class="form-control-file" id="cs_native_image">
                                                            </div>

                                                            <div class="form-group margin-top-20">
                                                                <label for="nativeNativeAdmob">Native AD Link</label>
                                                                <input type="text" name="cs_native_ad_link"
                                                                    value="asdfasdf" class="form-control create-form"
                                                                    id="cs_native_ad_link">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="customNativeAddPerVideo">Native Ad Per Video
                                                                    (You May Also
                                                                    Like)</label>
                                                                <input type="number" name="cs_native_ad_per_video_like"
                                                                    value="" class="form-control create-form"
                                                                    id="cs_native_ad_per_video_like">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="customNativeAddPerVideoSeries">Native Ad Per
                                                                    Video (For
                                                                    Series)</label>
                                                                <input type="number"
                                                                    name="cs_native_ad_per_video_series" value=""
                                                                    class="form-control create-form"
                                                                    id="cs_native_ad_per_video_series">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 startup-ad margin-top-40">
                                            <div class="add-content">
                                                <div class="ad-title-bk">
                                                    <div class="row">
                                                        <div class="col-md-10"><span class="title">Startup Ad</span>
                                                        </div>

                                                        <!-- <input type="hidden" name="startup_add_type" value="startup"> -->


                                                        <div class="col-md-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" name="startup_add_type"
                                                                    type="checkbox" id="startup_add_type">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ad-body">
                                                    <div class="row">
                                                        <div class="col-md-6 startup-banner">

                                                            <div class="form-group margin-top-20">
                                                                <label for="startupBannerAdmob">Startup AD ID</label>
                                                                <input type="text" name="startup_ad_id" value=""
                                                                    class="form-control create-form" id="startup_ad_id">
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 actions margin-top-20">
                                            <button type="submit" name="create" class="btn btn-primary mr-2">Save</button>

                                        </div>

                                    </div>
                                </form>
<?php }?>

                            </div>


                        </div>

                        <!-- end description -->

                        <!-- add btn -->


                        <!-- end add btn -->
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.php -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>


<?php
include "inc/footer.php";
