$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#prioritySaves').on('click', function () {
        var name = $('#name').val();
        var id = $('#id').val();

        $.ajax({
            type: 'POST',
            url: '/priority', // Thay đổi đường dẫn tương ứng
            data: {
                id: id,
                name: name
            },
            success: function (data) {
                // Xử lý khi Ajax request thành công
                $('#priorityModal').modal('hide'); // Đóng modal sau khi lưu thành công
                // Cập nhật hoặc làm gì đó sau khi tạo mới dữ liệu
                location.reload();
            },
            error: function (error) {
                // Xử lý khi có lỗi trong quá trình Ajax request
                console.log(error);
            }
        });
    });
});
function getPriorityId(id) {
    $.ajax({
        type: 'GET',
        url: '/priority/' + id,
        success: function (data) {
            $('#name').val(data.priority.name);
            $('#id').val(data.priority.id);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function deletePriority(id) {
    if (confirm('Bạn có chắc chắn muốn xóa không?')) {
        $.ajax({
            type: 'DELETE',
            url: '/priority/' + id,
            success: function (data) {
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}

function clearPriority() {
    $('#name').val('');
    $('#id').val('');
}


