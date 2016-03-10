<?php

namespace Qwant;

class Router
{
    public function init($url)
    {
        $url = ltrim($url, '/');

        $pages = array(
            'index.html' => array('id' => 1, 'content' => './cnt/index'),
            'news.html' => array('id' => 2, 'content' => './cnt/news'),
            'articles.html' => array('id' => 3, 'content' => './articles/article6/article'),
            'service.html' => array('id' => 4, 'content' => './cnt/service'),
            'contacts.html' => array('id' => 5, 'content' => './cnt/contacts'),
            'certificates.html' => array('id' => 6, 'content' => './cnt/certificates'),
            'price.html' => array('id' => 7, 'content' => './cnt/price'),
            'photo.html' => array('id' => 8, 'content' => './cnt/photo'),

            'article1.html' => array('id' => 10, 'content' => './articles/article1/article'),
            'article2.html' => array('id' => 11, 'content' => './articles/article2/article'),
            'article3.html' => array('id' => 12, 'content' => './articles/article3/article'),
            'article4.html' => array('id' => 13, 'content' => './articles/article4/article'),
            'article5.html' => array('id' => 14, 'content' => './articles/article5/article'),
            'article6.html' => array('id' => 15, 'content' => './articles/article6/article'),

            'vosstanovlenie_flash.html' => array('id' => 20, 'content' => './cnt/vosstanovlenie_flash'),
            'vosstanovlenie_ssd.html' => array('id' => 21, 'content' => './cnt/vosstanovlenie_ssd'),
            'poradok_rabot.html' => array('id' => 25, 'content' => './cnt/poradok_rabot'),
        );

        //if (preg_match('/^article[\d]+.html$/', $url)) echo 'ddd';
        $id = (isset($pages[$url])) ? $pages[$url]['id'] : $pages['index.html']['id'];
        $contentUrl = (isset($pages[$url])) ? $pages[$url]['content'] : $pages['index.html']['content'];

        if ($id == 20) {
            $title = 'Восстановление флешки. Поможем восстановить удаленные данные или утерянную информацию с флешки - Enter Харьков';
            $description = 'Восстановление данных с flash-накопителей - профильная услуга нашего сервисного центра.Восстанавливаем USB Flash, SD, SDHC, MicroSD, MMC после механического, электростатического воздействия, агрессии жидких сред.';
            $keywords = 'восстановление флешки,восстановление данных с флешки,восстановить флешку,восстановление удаленных файлов с флешки';
        } else {
            $title = 'Восстановление данных в Харькове | Enter - service - восстановление данных с HDD, восстановление информации с жесткого диска, с SSD накопителей, восстановление данных с Flash - накопителей . Ремонт HDD, SSD .';
            $description = 'Центр по восстановлению данных Enter-service производит ремонт и восстановление данных с жестких дисков, SSD накопителей, Flash-носителей.';
            $keywords = 'восстановление данных, восстановление информации, ремонт hdd, ремонт винчестера в Харькове, восстановление hdd';
        }
        return array('id' => $id, 'title' => $title, 'description' => $description, 'keywords' => $keywords, 'content' => $contentUrl);
    }
}
