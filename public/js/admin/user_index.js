$(function() {
    $("table.bordered select").change(function() {
        //询问是否确定修改
        var result = confirm("确定修改分组权限吗？");
        if (result == false) {
            location.reload();
            return;
        }
        //修改分组
        $.ajax({
            type: "post",
            url: "/Admin/user/setGroup",
            data: "groupid=" + $(this).val() + "&uid=" + $(this).attr("uid"),
            dataType: "json",
            success: function(result) {
                alert(result.info);
                if (!result.stauts)
                    location.reload();
            }
        });
    });
});

