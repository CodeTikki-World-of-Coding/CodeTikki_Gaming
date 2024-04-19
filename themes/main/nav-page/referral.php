<div class="container mt-5">
        <h2 class="text-center mb-4">Referral Dashboard</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                         <th>Id</th>
                        <th>Username</th>
                        <th>Direct Referrals</th>
                        <th>Indirect Referrals</th>
                    </tr>
                </thead>
                <tbody id="referralTableBody"></tbody>
            </table>
        </div>
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