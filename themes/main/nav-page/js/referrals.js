$(document).ready(function() {
    function fetchReferralData() {
        $.ajax({
            url: 'core/main/fetch_referrals.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    $('#referralTableBody').empty(); // Clear existing table rows

                    data.forEach(function(row) {
                        $('#referralTableBody').append(`
                            <tr>
                                <td>${row.name}</td>
                                <td>${row.status}</td>
                                <td>Phase 1 Data</td>
                                <td>Phase 2 Data</td>
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

    fetchReferralData();
});

