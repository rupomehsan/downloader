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

  var notiImage = null;
  $('#image').change(function(e){
    notiImage = e.target.files[0]
  })

  $('#notiicationForm').submit(function(e){
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
      success: function(res) {
          console.log(res)
          if(res.status === 'success'){
              Swal.fire({
                  title: 'Success',
                  text: res.msg,
                  icon: 'success',
              }).then(function(res) {
                  if (res.isConfirmed) {
                      window.location.reload()
                  }
              })
          }else if(res.status === 'validation_error'){
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
                      window.location.reload()
                  }
              })
          }
      },
      error: function(err) {
          console.log(err)
      }
  })

})


</script>

</body>

</html>
