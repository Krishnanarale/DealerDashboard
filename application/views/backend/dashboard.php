<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Totle Applications</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="count"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script>
  $(document).ready(() => {
    $("#dashboard").addClass('active');
    const url = 'Admin/DealersController/dealerCount';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: { },
        success: (res) => {
            if (res.status === 'success') {
                $('#count').append(res.data);
            } else {
                console.log(res);
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
  });
</script>