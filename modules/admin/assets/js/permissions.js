$('input[type="checkbox"]').on('change', function () {
    $.ajax({
        type: 'post',
        url: '/admin/user/permission-update',
        data: {permission: $(this).attr('name'), role: $(this).val(), status: $(this).is(':checked')}
    })
});