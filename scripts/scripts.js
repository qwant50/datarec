//$(function(){
//	$("ul#nav a").click(function(){
//		var url = $(this).attr("href");
//			if (url == 'news.html') $("#content").load('/cnt/news');
//			History.pushState(null, null, 'datarec.com.ua/news.html');
//		return false;
//	});
//});


$('#content img').on('click', function () {
    var src = $(this).attr('src');
    var image = new Image();
    image.src = src;
    var width = image.width;
    var height = image.height;
    window.open(src, "Image", "width=" + width + ",height=" + height);
});

$("#dialog").dialog({
    autoOpen: false,
    width: 500
});

$('button[type=submit]').click(function () {
    var val = $('input[name=number]').val();
    $('#dialog').dialog("option", "title", 'Сведение о состоянии ремонта № ' + val);
    $.ajax({
        method: "POST",
        url: "http://admin.datarec.com.ua/admin/repair/getstatus",
        dataType: "json",
        data: {'id': val}
    }).done(function (res) {
            var rep = '';
            if (res.repaired_at === null) {
                rep = 'Статус: не готово';
            }
            else {
                rep = 'Статус: готово <br> Дата завершения: ' + res.repaired_at;
            }
            $('#dialog').html('Изделие: ' + res.device + '<br>' + rep);
            $("#dialog").dialog("open");
        })
        .fail(function () {
            alert("error");
        })
        .always(function (res) {
            console.log(res);
            //  alert(res);
        });

});