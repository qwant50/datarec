//$(function(){
//	$("ul#nav a").click(function(){
//		var url = $(this).attr("href");
//			if (url == 'news.html') $("#content").load('/cnt/news');
//			History.pushState(null, null, 'datarec.com.ua/news.html');
//		return false;
//	});
//});
$(function () {

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
        var error = [];
        if (!val) {
            error.push('Введите, пожалуйста, номер ремонта');
        }
        if (!val.match(/^\d+$/)) {
            error.push('Номер ремонта должен содержать только цифры.');
        }
        if (!secret) {
            error.push('Введите, пожалуйста, секретный код.');
        }
        if (!secret.match(/^[a-zA-Z0-9]{4}$/)) {
            error.push('Секретный код должен состоять из четырех знаков.');
        }
        if (error.length) {
            showModal('Внимание! Введенные данные некорректны.', error.join('<br>'));
            return;
        }
        $.ajax({
            method: "POST",
            url: (YII_DEBUG ? '//local-admin.datarec.com.ua' : '//admin.datarec.com.ua') + '/admin/repair/getstatus',

            dataType: "json",
            data: {id: val, secret: secret}
        }).done((res) => {
            if (!res || res.error) {
                showModal('Внимание! Введенные данные некорректны.', res.error);
                return;
            }
            var rep = 'Изделие: ' + res.device;
            rep += '<br>Серийный номер: ' + (res.sn || 'N/A');
            if (!res.repaired_at) {
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

            if (res.price && res.repaired_at && !res.extradited_at) {
/*                rep += '<form method="POST" accept-charset="utf-8" action="https://www.liqpay.com/api/3/checkout">' +
                    '<input type="hidden" name="data" value="' + res.data + '" />' +
                    '<input type="hidden" name="signature" value="8CZs6rMtBsxzLsECpibkCDNfOp8=" />' +
                    '<input type="image" src="//static.liqpay.com/buttons/p1ru.radius.png" name="btn_text" />' +
                    '</form>';*/
                rep += '<br><div style="height: 60px;"><span>Оплатить on-line через систему Приват24: </span><span style="float: right"><form method="GET" accept-charset="utf-8" action="https://www.liqpay.com/ru/checkout/datarec">' +
                    '<input type="image" src="//static.liqpay.com/buttons/p1ru.radius.png" name="btn_text" />' +
                    '</form></span></div>';
            }
            showModal('Сведение о состоянии ремонта № ' + val, rep);
        })
            .fail(() => showModal('Внимание! Ошибка работы программы.', 'Проверьте соединение с Internet и повторите попытку.'));
    });
});