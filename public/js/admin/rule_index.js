/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    $("input:radio").click(function () {
        $.ajax({
            type : "post",
            url : "/Admin/rule/setStatus",
            data : "status=" + $(this).val() + "&rule=" + $(this).attr("rule"),
            dataType : "json",
            success : function (result) {
                alert(result.info);
                if(!result.status)  location.reload();
            }
        });
    })
})

