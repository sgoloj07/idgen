$(document).ready(function() {
    // Load table data on page load
    loadTableData();

    // Search input event listener
    $('#searchInput').on('input', function() {
        loadTableData();
    });

    // Pagination click event
    $(document).on('click', '.pagination a', function() {
        loadTableData($(this).data('page'));
    });
});

function loadTableData(page) {
    var searchKeyword = $('#searchInput').val();
    var page = page || 1;

    $.ajax({
        url: 'fetch_data.php',
        type: 'POST',
        data: { searchKeyword: searchKeyword, page: page },
        success: function(response) {
            $('#tableContainer').html(response);
        }
    });
}
