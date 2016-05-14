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
