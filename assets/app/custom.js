$(function () {
    $('.delete').click(function () {
        var dataid = $(this).data('id');
        var datatable = $(this).data('tab');
        if (confirm('Are you sure to delete this record ??')) {
            $.ajax({
                method: "POST",
                url: "../Ajax/delete",
                data: {
                    dataid: dataid,
                    datatable: datatable
                },
                success: function (response) {
                    if (response == '1') {
                        $("#row" + dataid).hide();
                    }
                }
            });
        }
    });
    $('.block').click(function () {
        var dataid = $(this).data('id');
        var datatable = $(this).data('tab');
        var status = $(this).data('status');
        if ($(this).data('msg') == 1) {
            var msg = 'Do you want to Block user';
        } else {
            var msg = 'Do you want to Unblock user';
        }
        if (confirm(msg)) {
            $.ajax({
                method: "POST",
                url: "../Ajax/block", 
                data: {
                    dataid: dataid,
                    datatable: datatable,
                    status: status
                },
                success: function (response) {
                    if (response == '1') {
                        console.log(dataid);
                        if (status == 2) {
                            $('#block' + dataid).text('Blocked');
                            $('#block' + dataid).removeClass('badge-success');
                            $('#block' + dataid).addClass('badge-danger');
                            $('#block' + dataid).data('status', '1');
                            $('#block' + dataid).data('msg', '2');
                        } else {
                            $('#block' + dataid).text('Unblocked');
                            $('#block' + dataid).removeClass('badge-danger');
                            $('#block' + dataid).addClass('badge-success');
                            $('#block' + dataid).data('status', '2');
                            $('#block' + dataid).data('msg', '1');
                        }
                    }
                }
            });
        }
    });


});