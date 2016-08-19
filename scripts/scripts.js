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

function showModal(title, body) {
    $modal = $('#repairModal');
    $('.modal-title', $modal).html(title);
    $('.modal-body', $modal).html(body);
    $($modal).modal('show');
}

$('button[type=submit]').click(function () {
    var val = $('input[name=number]').val();
    var secret = $('input[name=secret]').val();
    var error = '';
    if (!val) {
        error = 'Введите, пожалуйста, номер ремонта';
    }
    else if (!val.match(/^\d+$/)) {
        error = 'Номер ремонта должен содержать только цифры.';
    }
    else if (!secret) {
        error = 'Введите, пожалуйста, секретный код.';
    }
    else if (!secret.match(/^[a-zA-Z0-9]{4}$/)) {
        error = 'Секретный код должен состоять из четырех знаков.';
    }
    if (error) {
        showModal('Внимание! Введенные данные некорректны.', error);
        return;
    }
    $.ajax({
        method: "POST",
        url: "http://admin.datarec.com.ua/admin/repair/getstatus",
        dataType: "json",
        data: {'id': val, 'secret': secret}
    }).done(function (res) {
            if (!res || res.error) {
                showModal('Внимание! Введенные данные некорректны.', res.error);
                return;
            }
            var rep = 'Изделие: ' + res.device;
            rep += '<br>Серийный номер: ' + (res.sn ? res.sn : 'N/A');
            if (res.repaired_at === null) {
                rep += '<br>Статус: <span style="color: red">не готово</span>';
            }
            else {
                rep += '<br>Статус: <span style="color: green">готово</span> <br> Дата завершения: ' + res.repaired_at;
            }
            if (res.description_online) {
                rep += '<br>Комментарий: ' + res.description_online;
            }
            if (res.price) {
                rep += '<br>К оплате: <span style="color: green">' + res.price + '</span> грн.';
            }
            if (res.extradited_at) {
                rep += '<br><b>Внимание!</b> Изделие выдано: ' + res.extradited_at;
            }
            showModal('Сведение о состоянии ремонта № ' + val, rep);
        })
        .fail(function () {
            showModal('Внимание! Ошибка работы программы.', 'Проверьте соединение с Internet и повторите попытку.');
        });

});