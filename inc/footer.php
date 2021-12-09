           <!-- plugins:js -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
               integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
               crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
               integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
               crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           <script src="../vendors/js/vendor.bundle.base.js"></script>
           <!-- endinject -->
           <!-- Plugin js for this page -->
           <script src="../vendors/chart.js/Chart.min.js"></script>
           <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
           <script src="../endors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
           <script src="../js/dataTables.select.min.js"></script>

           <!-- End plugin js for this page -->
           <!-- inject:js -->
           <script src="../js/off-canvas.js"></script>
           <script src="../js/hoverable-collapse.js"></script>
           <script src="../js/template.js"></script>
           <script src="../js/settings.js"></script>
           <script src="../js/todolist.js"></script>
           <!-- endinject -->
           <!-- Custom js for this page-->
           <script src="../js/dashboard.js"></script>
           <script src="../js/Chart.roundedBarCharts.js"></script>
           <!-- End custom js for this page-->
<script>
    $(document).ready(function(){
        $.ajax({
                       // method: 'post',
                       url: 'service/get_token.php',
                       type: 'GET',
                       success: function (res) {
                           console.log(res)


                       },
                       error: function (err) {
                           console.log(err)
                       }
                   })
    })
</script>
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    <script>
      var apiID = '';
      window.OneSignal = window.OneSignal || [];
      OneSignal.push(function () {
        OneSignal.init({
        appId: "<?php if (Session::get('apiId')) {echo Session::get('apiId');}?>",
        safari_web_id: "web.onesignal.auto.24b53800-ef1e-45ab-8e2c-057ebbb06239",
          notifyButton: {
            enable: true,
          },
          allowLocalhostAsSecureOrigin: true,
        });
      });
    </script>
           <script>
               var notiImage = null;
               $('#image').change(function (e) {
                   notiImage = e.target.files[0]
               })
               $('#notiicationForm').submit(function (e) {
                   e.preventDefault();
                   var title = $('#title').val()
                   var desc = $('#desc').val()
                   var link = $('#title').val()

                   // console.log(notiImage);

                   var formData = new FormData()
                   formData.append('title', title)
                   formData.append('desc', desc)
                   formData.append('link', link)
                   formData.append('notiImage', notiImage)

                   $.ajax({
                       // method: 'post',
                       url: 'service/add_notification.php',
                       data: formData,
                       processData: false,
                       contentType: false,
                       type: 'POST',
                       success: function (res) {
                           console.log(res)
                           if (res.status === 'success') {
                               Swal.fire({
                                   title: 'Success',
                                   text: res.msg,
                                   icon: 'success',
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
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
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
                           }
                       },
                       error: function (err) {
                           console.log(err)
                       }
                   })

               })

           </script>


           <script>
               var bannerImage = null;
               var interesticialImage = null;
               var nativeImage = null;

               $('#cs_banner_image').change(function (e) {
                   bannerImage = e.target.files[0]
               })
               $('#cs_interesticial_image').change(function (e) {
                   interesticialImage = e.target.files[0]
               })
               $('#cs_native_image').change(function (e) {
                   nativeImage = e.target.files[0]
               })

               $('#manageAdds').submit(function (e) {
                   e.preventDefault();

                   var gg_add_type = $('#gg_add_type').val()
                   var gg_admob_id = $('#gg_admob_id').val()
                   var gg_interesticial_admob_id = $('#gg_interesticial_admob_id').val()
                   var gg_interesticial_admob_click = $('#gg_interesticial_admob_click').val()
                   var fb_interesticial_admob_id = $('#fb_interesticial_admob_id').val()
                   var gg_native_admob_id = $('#gg_native_admob_id').val()
                   var gg_native_ad_per_video_like = $('#gg_native_ad_per_video_like').val()
                   var gg_native_ad_per_video_series = $('#gg_native_ad_per_video_series').val()
                   var fb_add_type = $('#fb_add_type').val()
                   var fb_admob_id = $('#fb_admob_id').val()
                   var fb_interesticial_admob_click = $('#fb_interesticial_admob_click').val()
                   var fb_native_admob_id = $('#fb_native_admob_id').val()
                   var fb_native_ad_per_video_like = $('#fb_native_ad_per_video_like').val()
                   var fb_native_ad_per_video_series = $('#fb_native_ad_per_video_series').val()
                   var cs_add_type = $('#cs_add_type').val()
                   var cs_banner_admob_link = $('#cs_banner_admob_link').val()
                   var cs_interesticial_ad_link = $('#cs_interesticial_ad_link').val()
                   var cs_Interesticial_admob_click = $('#cs_Interesticial_admob_click').val()
                   var cs_native_ad_link = $('#cs_native_ad_link').val()
                   var cs_native_ad_per_video_like = $('#cs_native_ad_per_video_like').val()
                   var cs_native_ad_per_video_series = $('#cs_native_ad_per_video_series').val()
                   var startup_add_type = $('#startup_add_type').val()
                   var startup_ad_id = $('#startup_ad_id').val()

                   var formData = new FormData()
                   formData.append('gg_add_type', gg_add_type)
                   formData.append('gg_admob_id', gg_admob_id)
                   formData.append('gg_interesticial_admob_id', gg_interesticial_admob_id)
                   formData.append('gg_interesticial_admob_click', gg_interesticial_admob_click)
                   formData.append('fb_interesticial_admob_id', fb_interesticial_admob_id)
                   formData.append('gg_native_admob_id', gg_native_admob_id)
                   formData.append('gg_native_ad_per_video_like', gg_native_ad_per_video_like)
                   formData.append('gg_native_ad_per_video_series', gg_native_ad_per_video_series)
                   formData.append('fb_add_type', fb_add_type)
                   formData.append('fb_admob_id', fb_admob_id)
                   formData.append('fb_interesticial_admob_click', fb_interesticial_admob_click)
                   formData.append('fb_native_admob_id', fb_native_admob_id)
                   formData.append('fb_native_ad_per_video_like', fb_native_ad_per_video_like)
                   formData.append('fb_native_ad_per_video_series', fb_native_ad_per_video_series)
                   formData.append('cs_add_type', cs_add_type)
                   formData.append('cs_banner_admob_link', cs_banner_admob_link)
                   formData.append('cs_interesticial_ad_link', cs_interesticial_ad_link)
                   formData.append('cs_Interesticial_admob_click', cs_Interesticial_admob_click)
                   formData.append('cs_native_ad_link', cs_native_ad_link)
                   formData.append('cs_native_ad_per_video_like', cs_native_ad_per_video_like)
                   formData.append('cs_native_ad_per_video_series', cs_native_ad_per_video_series)
                   formData.append('startup_add_type', startup_add_type)
                   formData.append('startup_ad_id', startup_ad_id)
                   formData.append('bannerImage', bannerImage)
                   formData.append('interesticialImage', interesticialImage)
                   formData.append('nativeImage', nativeImage)
                   $.ajax({
                       // method: 'post',
                       url: 'service/manage_adds.php',
                       data: formData,
                       processData: false,
                       contentType: false,
                       type: 'POST',
                       success: function (res) {
                           console.log(res)
                           if (res.status === 'success') {
                               Swal.fire({
                                   title: 'Success',
                                   text: res.msg,
                                   icon: 'success',
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
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
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
                           }
                       },
                       error: function (err) {
                           console.log(err)
                       }
                   })

               })

           </script>



           <script>
               var bannerImage = null;
               var interesticialImage = null;
               var nativeImage = null;

               $('#cs_banner_image').change(function (e) {
                   bannerImage = e.target.files[0]
               })
               $('#cs_interesticial_image').change(function (e) {
                   interesticialImage = e.target.files[0]
               })
               $('#cs_native_image').change(function (e) {
                   nativeImage = e.target.files[0]
               })

               $('#updatemanageAdds').submit(function (e) {
                   e.preventDefault();

                   var gg_add_type = $('#gg_add_type').val()
                   var gg_admob_id = $('#gg_admob_id').val()
                   var gg_interesticial_admob_id = $('#gg_interesticial_admob_id').val()
                   var gg_interesticial_admob_click = $('#gg_interesticial_admob_click').val()
                   var fb_interesticial_admob_id = $('#fb_interesticial_admob_id').val()
                   var gg_native_admob_id = $('#gg_native_admob_id').val()
                   var gg_native_ad_per_video_like = $('#gg_native_ad_per_video_like').val()
                   var gg_native_ad_per_video_series = $('#gg_native_ad_per_video_series').val()
                   var fb_add_type = $('#fb_add_type').val()
                   var fb_admob_id = $('#fb_admob_id').val()
                   var fb_interesticial_admob_click = $('#fb_interesticial_admob_click').val()
                   var fb_native_admob_id = $('#fb_native_admob_id').val()
                   var fb_native_ad_per_video_like = $('#fb_native_ad_per_video_like').val()
                   var fb_native_ad_per_video_series = $('#fb_native_ad_per_video_series').val()
                   var cs_add_type = $('#cs_add_type').val()
                   var cs_banner_admob_link = $('#cs_banner_admob_link').val()
                   var cs_interesticial_ad_link = $('#cs_interesticial_ad_link').val()
                   var cs_Interesticial_admob_click = $('#cs_Interesticial_admob_click').val()
                   var cs_native_ad_link = $('#cs_native_ad_link').val()
                   var cs_native_ad_per_video_like = $('#cs_native_ad_per_video_like').val()
                   var cs_native_ad_per_video_series = $('#cs_native_ad_per_video_series').val()
                   var startup_add_type = $('#startup_add_type').val()
                   var startup_ad_id = $('#startup_ad_id').val()

                   var formData = new FormData()
                   formData.append('gg_add_type', gg_add_type)
                   formData.append('gg_admob_id', gg_admob_id)
                   formData.append('gg_interesticial_admob_id', gg_interesticial_admob_id)
                   formData.append('gg_interesticial_admob_click', gg_interesticial_admob_click)
                   formData.append('fb_interesticial_admob_id', fb_interesticial_admob_id)
                   formData.append('gg_native_admob_id', gg_native_admob_id)
                   formData.append('gg_native_ad_per_video_like', gg_native_ad_per_video_like)
                   formData.append('gg_native_ad_per_video_series', gg_native_ad_per_video_series)
                   formData.append('fb_add_type', fb_add_type)
                   formData.append('fb_admob_id', fb_admob_id)
                   formData.append('fb_interesticial_admob_click', fb_interesticial_admob_click)
                   formData.append('fb_native_admob_id', fb_native_admob_id)
                   formData.append('fb_native_ad_per_video_like', fb_native_ad_per_video_like)
                   formData.append('fb_native_ad_per_video_series', fb_native_ad_per_video_series)
                   formData.append('cs_add_type', cs_add_type)
                   formData.append('cs_banner_admob_link', cs_banner_admob_link)
                   formData.append('cs_interesticial_ad_link', cs_interesticial_ad_link)
                   formData.append('cs_Interesticial_admob_click', cs_Interesticial_admob_click)
                   formData.append('cs_native_ad_link', cs_native_ad_link)
                   formData.append('cs_native_ad_per_video_like', cs_native_ad_per_video_like)
                   formData.append('cs_native_ad_per_video_series', cs_native_ad_per_video_series)
                   formData.append('startup_add_type', startup_add_type)
                   formData.append('startup_ad_id', startup_ad_id)
                   formData.append('bannerImage', bannerImage)
                   formData.append('interesticialImage', interesticialImage)
                   formData.append('nativeImage', nativeImage)
                   $.ajax({
                       // method: 'post',
                       url: 'service/update_manage_adds.php',
                       data: formData,
                       processData: false,
                       contentType: false,
                       type: 'POST',
                       success: function (res) {
                           console.log(res)
                           if (res.status === 'success') {
                               Swal.fire({
                                   title: 'Success',
                                   text: res.msg,
                                   icon: 'success',
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
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
                               }).then(function (res) {
                                   if (res.isConfirmed) {
                                       window.location.reload()
                                   }
                               })
                           }
                       },
                       error: function (err) {
                           console.log(err)
                       }
                   })

               })

           </script>


           </body>

           </html>
