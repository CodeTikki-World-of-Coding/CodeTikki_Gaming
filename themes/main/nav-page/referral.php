<head>
<style>
    /* Adjust sidebar and main content width */
    .sidebar {
      width: 30%;
      background-color: #f0f0f0;
      height: 100vh; /* Adjust height as needed */
    }
    .main-content {
      width: 70%;
      height: 100vh; /* Adjust height as needed */
      
    }
    .main-content table{
        border:1px solid;
        margin:0 auto;
        width:1000px;
    }
    .main-content th{
        background:yellow;
      }
      .invite{
         width:100px;
         margin:0 auto;
      }
    /* Adjust footer width */
    .footer {
      width: 100%;
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
    }

  </style>
</head>

<div class="container mt-5">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-5 sidebar">
        <!-- Sidebar content goes here -->
        <div class="mb-4 row">
        <div class="col-md-6">hii</div>
        <div class="col-md-6">hii</div>
        <div class="referral-code"></div>
        <button class="invite btn btn-primary">Invite</button>

    </div>
        <!-- Section 2 -->
        <div>
          <h4>Section 2</h4>
          <p>Content for Section 2 goes here.</p>
        </div>
      </div>
      <!-- Main Content -->
      <div class="col-md-5 main-content">
      <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                         <th>Name</th>
                        <th>Status</th>
                        <th>Phase 1</th>
                        <th>Phase 2</th>
                    </tr>
                </thead>
                <tbody id="referralTableBody"></tbody>
            </table>
        </div>
          </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="footer">
    <div class="row">
  <div class="col">
              <p>Footer Section 1</p>
            </div>
            <div class="col">
              <p>Footer Section 2</p>
            </div>
            </div>
  </div>



<div class="container mt-5">
        
    </div>
<script>
    $(document).ready(function() {
    // Function to fetch referral data via AJAX
    function fetchReferralData() {
        $.ajax({
            url: 'core/main/fetch_referrals.php', // PHP file to handle the request
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    // Clear existing table rows
                    $('#referralTableBody').empty();

                    // Populate the table with data
                    data.forEach(function(row) {
                        $('#referralTableBody').append(`
                            <tr>
                                <td>${row.id}</td>
                                <td>${row.username}</td>
                                <td>${row.directReferrals}</td>
                                <td>${row.indirectReferrals}</td>
                            </tr>
                        `);
                    });
                } else {
                    $('#referralTableBody').html('<tr><td colspan="4">No data available</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching referral data:', error);
            }
        });
    }

    // Call the fetchReferralData function when the page loads
    fetchReferralData();
});

</script>