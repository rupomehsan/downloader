< script >
    $(document).ready(function() { ' ' } {
        $.ajax({
            url: 'service/get_manage_adds.php',
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var data = res.data;
                if (data) {
                    console.log(data);
                    $('#showManageAds').empty();
                    $('#showManageAds').append(`

                                        <form method="POST" id="manageAdds updatemanageAdds" enctype="multipart/form-data" action="">
                                            <input type="hidden" name="id" id="id" value="${data.id}">
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
                                                                        <input  checked="" class="form-check-input" name="gg_add_type" type="checkbox" id="gg_add_type">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ad-body">
                                                            <div class="form-group">
                                                                <label for="googleBannerAdmob">Banner Admob ID</label>
                                                                <input type="text" name="gg_admob_id" class="form-control create-form" id="gg_admob_id" value="${data.gg_admob_id}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="googleInteresticialAdmob">Interesticial Admob ID</label>
                                                                <input type="text" name="gg_interesticial_admob_id" class="form-control create-form" id="gg_interesticial_admob_id" value="${data.gg_interesticial_admob_id}">
                                                            </div>
                                                            <div class="interesticial-details">
                                                                <div class="form-group">
                                                                    <label for="googleInteresticialAdmobClick">Interesticial Admob Click</label>
                                                                    <input type="number" name="gg_interesticial_admob_click" value="${data.gg_interesticial_admob_click}" class="form-control create-form" id="gg_interesticial_admob_click">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="googleNativeAdmob">Native Admob ID</label>
                                                                <input type="text" name="gg_native_admob_id" class="form-control create-form" id="gg_native_admob_id" value="${data.gg_native_admob_id}">
                                                            </div>
                                                            <div class="native-details">
                                                                <div class="form-group">
                                                                    <label for="googlNativeAddPerVideo">Native Ad Per Video (You May Also
                            Like)</label>
                                                                    <input type="number" name="gg_native_ad_per_video_like" value="${data.gg_native_ad_per_video_like}" class="form-control create-form" id="gg_native_ad_per_video_like">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="googlNativeAddPerVideoSeries">Native Ad Per Video (For
                            Series)</label>
                                                                    <input type="number" name="gg_native_ad_per_video_series" value="${data.gg_native_ad_per_video_series}" class="form-control create-form" id="gg_native_ad_per_video_series">
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
                                                                        <input class="form-check-input" name="fb_add_type" type="checkbox" id="fb_add_type">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="ad-body">
                                                            <div class="form-group">
                                                                <label for="facebookBannerAdmob">Banner Admob ID</label>
                                                                <input type="text" name="fb_admob_id" class="form-control create-form" id="fb_admob_id" value="${data.fb_admob_id}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="facebookInteresticialAdmob">Interesticial Admob ID</label>
                                                                <input type="text" name="fb_interesticial_admob_id" value="${data.fb_interesticial_admob_id}" class="form-control create-form" id="fb_interesticial_admob_id">
                                                            </div>
                                                            <div class="interesticial-details">
                                                                <div class="form-group">
                                                                    <label for="facebookInteresticialAdmobClick">Interesticial Admob Click</label>
                                                                    <input type="number" name="fb_interesticial_admob_click" value="${data.fb_interesticial_admob_click}" class="form-control create-form" id="fb_interesticial_admob_click">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="facebookNativeAdmob">Native Admob ID</label>
                                                                <input type="text" name="fb_native_admob_id" class="form-control create-form" id="fb_native_admob_id" value="${data.fb_native_admob_id}">
                                                            </div>

                                                            <div class="native-details">
                                                                <div class="form-group">
                                                                    <label for="facebookNativeAddPerVideo">Native Ad Per Video (You May Also
                            Like)</label>
                                                                    <input type="number" name="fb_native_ad_per_video_like" value="${data.fb_native_ad_per_video_like}" class="form-control create-form" id="fb_native_ad_per_video_like">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="facebookNativeAddPerVideoSeries">Native Ad Per Video (For
                            Series)</label>
                                                                    <input type="number" name="fb_native_ad_per_video_series" value="${data.fb_native_ad_per_video_series}" class="form-control create-form" id="fb_native_ad_per_video_series">
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
                                                                        <input class="form-check-input" name="cs_add_type" type="checkbox" id="cs_add_type">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ad-body">
                                                            <div class="row">
                                                                <div class="col-md-6 custom-banner">
                                                                    <div class="form-group">
                                                                        <img src="${data.cs_banner_image}" height="50" width="80" alt=""> <br>
                                                                        <label for="bannerImage">Upload Banner Image</label><br>
                                                                        <input type="file" name="cs_banner_image" class="form-control-file" id="cs_banner_image">
                                                                    </div>

                                                                    <div class="form-group margin-top-20">
                                                                        <label for="customBannerAdmob">Banner Admob Link</label>
                                                                        <input type="text" name="cs_banner_admob_link" value="${data.cs_banner_admob_link}" class="form-control create-form" id="cs_banner_admob_link">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 custom-interseticial">

                                                                    <div class="form-group">
                                                                        <img src="${data.cs_interesticial_image}" height="50" width="80" alt=""> <br>
                                                                        <label for="interesticialImage">Upload Interesticial Image</label><br>
                                                                        <input type="file" name="cs_interesticial_image" class="form-control-file" id="cs_interesticial_image">
                                                                    </div>

                                                                    <div class="form-group margin-top-20">
                                                                        <label for="interesticialBannerLink">Interesticial AD Link</label>
                                                                        <input type="text" name="cs_interesticial_ad_link" value="${data.cs_interesticial_ad_link}" class="form-control create-form" id="cs_interesticial_ad_link">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="customInteresticialAdmobClick">Interesticial Admob Click</label>
                                                                        <input type="number" name="cs_Interesticial_admob_click" value="${data.cs_Interesticial_admob_click}" class="form-control create-form" id="cs_Interesticial_admob_click">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 native-interseticial">

                                                                    <div class="form-group">
                                                                        <img src="${data.cs_native_image}" height="50" width="80" alt=""> <br>
                                                                        <label for="nativeImage">Upload Native Image</label><br>
                                                                        <input type="file" name="cs_native_image" class="form-control-file" id="cs_native_image">
                                                                    </div>

                                                                    <div class="form-group margin-top-20">
                                                                        <label for="nativeNativeAdmob">Native AD Link</label>
                                                                        <input type="text" name="cs_native_ad_link" value="${data.cs_native_ad_link}" class="form-control create-form" id="cs_native_ad_link">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="customNativeAddPerVideo">Native Ad Per Video (You May Also
                              Like)</label>
                                                                        <input type="number" name="cs_native_ad_per_video_like" value="${data.cs_native_ad_per_video_like}" class="form-control create-form" id="cs_native_ad_per_video_like">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="customNativeAddPerVideoSeries">Native Ad Per Video (For
                              Series)</label>
                                                                        <input type="number" name="cs_native_ad_per_video_series" value="${data.cs_native_ad_per_video_series}" class="form-control create-form" id="cs_native_ad_per_video_series">
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
                                                                        <input class="form-check-input" name="startup_add_type" type="checkbox" id="startup_add_type">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ad-body">
                                                            <div class="row">
                                                                <div class="col-md-6 startup-banner">

                                                                    <div class="form-group margin-top-20">
                                                                        <label for="startupBannerAdmob">Startup AD ID</label>
                                                                        <input type="text" name="startup_ad_id" value="${data.startup_ad_id}" class="form-control create-form" id="startup_ad_id">
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 actions margin-top-20">
                                                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                                                </div>

                                            </div>
                                        </form>


            `);

                    var bannerImage = null;
                    var interesticialImage = null;
                    var nativeImage = null;

                    $('#cs_banner_image').change(function(e) {
                        bannerImage = e.target.files[0];
                    });
                    $('#cs_interesticial_image').change(function(e) {
                        interesticialImage = e.target.files[0];
                    });
                    $('#cs_native_image').change(function(e) {
                        nativeImage = e.target.files[0];
                    });

                    $('#updatemanageAdds').submit(function(e) {
                        e.preventDefault();

                        var gg_add_type = $('#gg_add_type').val();
                        var gg_admob_id = $('#gg_admob_id').val();
                        var gg_interesticial_admob_id = $('#gg_interesticial_admob_id').val();
                        var gg_interesticial_admob_click = $(
                            '#gg_interesticial_admob_click'
                        ).val();
                        var fb_interesticial_admob_id = $('#fb_interesticial_admob_id').val();
                        var gg_native_admob_id = $('#gg_native_admob_id').val();
                        var gg_native_ad_per_video_like = $(
                            '#gg_native_ad_per_video_like'
                        ).val();
                        var gg_native_ad_per_video_series = $(
                            '#gg_native_ad_per_video_series'
                        ).val();
                        var fb_add_type = $('#fb_add_type').val();
                        var fb_admob_id = $('#fb_admob_id').val();
                        var fb_interesticial_admob_click = $(
                            '#fb_interesticial_admob_click'
                        ).val();
                        var fb_native_admob_id = $('#fb_native_admob_id').val();
                        var fb_native_ad_per_video_like = $(
                            '#fb_native_ad_per_video_like'
                        ).val();
                        var fb_native_ad_per_video_series = $(
                            '#fb_native_ad_per_video_series'
                        ).val();
                        var cs_add_type = $('#cs_add_type').val();
                        var cs_banner_admob_link = $('#cs_banner_admob_link').val();
                        var cs_interesticial_ad_link = $('#cs_interesticial_ad_link').val();
                        var cs_Interesticial_admob_click = $(
                            '#cs_Interesticial_admob_click'
                        ).val();
                        var cs_native_ad_link = $('#cs_native_ad_link').val();
                        var cs_native_ad_per_video_like = $(
                            '#cs_native_ad_per_video_like'
                        ).val();
                        var cs_native_ad_per_video_series = $(
                            '#cs_native_ad_per_video_series'
                        ).val();
                        var startup_add_type = $('#startup_add_type').val();
                        var startup_ad_id = $('#startup_ad_id').val();

                        var formData = new FormData();
                        formData.append('gg_add_type', gg_add_type);
                        formData.append('gg_admob_id', gg_admob_id);
                        formData.append(
                            'gg_interesticial_admob_id',
                            gg_interesticial_admob_id
                        );
                        formData.append(
                            'gg_interesticial_admob_click',
                            gg_interesticial_admob_click
                        );
                        formData.append(
                            'fb_interesticial_admob_id',
                            fb_interesticial_admob_id
                        );
                        formData.append('gg_native_admob_id', gg_native_admob_id);
                        formData.append(
                            'gg_native_ad_per_video_like',
                            gg_native_ad_per_video_like
                        );
                        formData.append(
                            'gg_native_ad_per_video_series',
                            gg_native_ad_per_video_series
                        );
                        formData.append('fb_add_type', fb_add_type);
                        formData.append('fb_admob_id', fb_admob_id);
                        formData.append(
                            'fb_interesticial_admob_click',
                            fb_interesticial_admob_click
                        );
                        formData.append('fb_native_admob_id', fb_native_admob_id);
                        formData.append(
                            'fb_native_ad_per_video_like',
                            fb_native_ad_per_video_like
                        );
                        formData.append(
                            'fb_native_ad_per_video_series',
                            fb_native_ad_per_video_series
                        );
                        formData.append('cs_add_type', cs_add_type);
                        formData.append('cs_banner_admob_link', cs_banner_admob_link);
                        formData.append('cs_interesticial_ad_link', cs_interesticial_ad_link);
                        formData.append(
                            'cs_Interesticial_admob_click',
                            cs_Interesticial_admob_click
                        );
                        formData.append('cs_native_ad_link', cs_native_ad_link);
                        formData.append(
                            'cs_native_ad_per_video_like',
                            cs_native_ad_per_video_like
                        );
                        formData.append(
                            'cs_native_ad_per_video_series',
                            cs_native_ad_per_video_series
                        );
                        formData.append('startup_add_type', startup_add_type);
                        formData.append('startup_ad_id', startup_ad_id);
                        formData.append('bannerImage', bannerImage);
                        formData.append('interesticialImage', interesticialImage);
                        formData.append('nativeImage', nativeImage);
                        $.ajax({
                            // method: 'post',
                            url: 'service/update_manage_adds.php',
                            data: formData,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function(res) {
                                console.log(res);
                                if (res.status === 'success') {
                                    Swal.fire({
                                        title: 'Success',
                                        text: res.msg,
                                        icon: 'success',
                                    }).then(function(res) {
                                        if (res.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                } else if (res.status === 'validation_error') {
                                    Swal.fire({
                                        title: 'Error',
                                        text: res.msg,
                                        showCancelButton: true,
                                        cancelButtonColor: '#d33',
                                        // text: 'Validation Error',
                                        // text: res.errors.name[0],
                                        // text: res.errors.price[0],
                                        // text: res.errors.stock[0],
                                        icon: 'error',
                                    }).then(function(res) {
                                        if (res.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                }
                            },
                            error: function(err) {
                                console.log(err);
                            },
                        });
                    });
                }
            },
            error: function(err) {
                console.log(err);
            },
        })
    }) <
    /script>;