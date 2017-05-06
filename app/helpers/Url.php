<?php

namespace Qwant\helpers;

class Url
{
    protected static $domain = '';

    public static function init($domain = '')
    {
        if (!is_string($domain)) {
            throw new UrlException('Domain must be a string.');
        }
        self::$domain = rtrim($domain, '/') . '/';
    }

    /**
     * return absolute path
     *
     * @param string $page
     * @param array $params
     * @return string
     * @throws UrlException
     */
    public static function route($page, array $params = [])
    {
        if (!is_string($page)) {
            throw new UrlException('Page must be a string.');
        }
        $ext = $page == '' ? '' : '.php';
        return self::$domain . ltrim($page, '/') . $ext . (empty($params) ? '' : '?' . http_build_query($params));
    }
}