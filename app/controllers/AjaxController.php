<?php

namespace Qwant\controllers;

use Qwant\DbConnect;

class ajaxController
{
    public function deliveryAction()
    {
        $db = DbConnect::getInstance();
        $stmt = $db->getConnection()->prepare("SET NAMES utf8;");
        $stmt->execute();
/*        $stmt = $db->getConnection()->prepare("INSERT INTO `qwant50` (`number`, `sign`, `message`, `wappush`, `is_flash`, `send_time`)
VALUES ('380675578857', 'datarec', 'Ваш заказ 1544 готов', '', 0, NOW());");
        $stmt->execute();*/
        $stmt = $db->getConnection()->prepare("SELECT * FROM `qwant50`");
        $stmt->execute();
        $records = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($records);
    }
}