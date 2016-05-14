<?php

namespace Qwant;

class MainController
{
    private $view;
    private $data;
    public function __construct()
    {
        $this->view = new View();
    }

    public function setMeta($id)
    {
        if ($id == 20) {
            $this->data['title'] = 'Восстановление флешки. Поможем восстановить удаленные данные или утерянную информацию с флешки - Enter Харьков';
            $this->data['description'] = 'Восстановление данных с flash-накопителей - профильная услуга нашего сервисного центра.Восстанавливаем USB Flash, SD, SDHC, MicroSD, MMC после механического, электростатического воздействия, агрессии жидких сред.';
            $this->data['keywords'] = 'восстановление флешки,восстановление данных с флешки,восстановить флешку,восстановление удаленных файлов с флешки';
        } else {
            $this->data['title'] = 'Восстановление данных в Харькове | Enter - service - восстановление данных с HDD, восстановление информации с жесткого диска, с SSD накопителей, восстановление данных с Flash - накопителей . Ремонт HDD, SSD .';
            $this->data['description'] = 'Центр по восстановлению данных Enter-service производит ремонт и восстановление данных с жестких дисков, SSD накопителей, Flash-носителей.';
            $this->data['keywords'] = 'восстановление данных, восстановление информации, ремонт hdd, ремонт винчестера в Харькове, восстановление hdd';
        }
    }

    public function defaultAction($id){
        $pages = array(
            1 => './cnt/index',
            2 => './cnt/news',
            4 => './cnt/service',
            5 => './cnt/contacts',
            6 => './cnt/certificates',
            7 => './cnt/price',
            8 => './cnt/photo',
            20 => './cnt/vosstanovlenie_flash',
            21 => './cnt/vosstanovlenie_ssd',
            25 => './cnt/poradok_rabot',
        );
        $this->data['content'] = $pages[$id];
        $this->data['id'] = $id;
        $this->setMeta($id);

        $this->view->render(ROOT . 'pages/base.phtml', $this->data);
    }

    public function articleAction($id){
        $articles = array(
            10 => './articles/article1/article',
            11 => './articles/article2/article',
            12 => './articles/article3/article',
            13 => './articles/article4/article',
            14 => './articles/article5/article',
            15 => './articles/article6/article',
        );
        $this->data['content'] = $articles[$id];
        $this->data['id'] = $id;
        $this->setMeta($id);
        $this->view->render(ROOT . 'pages/base.phtml', $this->data);
    }
}