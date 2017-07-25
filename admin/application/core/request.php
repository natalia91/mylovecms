<?php


class Request
{



    /**
     * Определение request-метода обращения к странице (GET, POST)
     * Если задан аргумент функции (название метода, в любом регистре), возвращает true или false
     * Если аргумент не задан, возвращает имя метода
     * Пример:
     *
     *    if($okay->request->method('post'))
     *        print 'Request method is POST';
     *
     */
    /*Возвращение метода передачи данных*/
    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Возвращает переменную _GET, отфильтрованную по заданному типу, если во втором параметре указан тип фильтра
     * Второй параметр $type может иметь такие значения: integer, string, boolean
     * Если $type не задан, возвращает переменную в чистом виде
     */
    /*Прием параметров с массива $_GET*/
    public static function get($name, $type = null)
    {
        $val = null;
        if (isset($_GET[$name])) {
            $val = $_GET[$name];
        }

        if (!empty($type) && is_array($val)) {
            $val = reset($val);
        }

        if ($type == 'string') {
            return strval(preg_replace('/[^\p{L}\p{Nd}\d\s_\-\.\%\s]/ui', '', $val));
        }

        if ($type == 'integer') {
            return intval($val);
        }

        if ($type == 'float') {
            return floatval($val);
        }

        if ($type == 'boolean') {
            return !empty($val);
        }

        return $val;
    }

    /**
     * Возвращает переменную _POST, отфильтрованную по заданному типу, если во втором параметре указан тип фильтра
     * Второй параметр $type может иметь такие значения: integer, string, boolean
     * Если $type не задан, возвращает переменную в чистом виде
     */
    /*Прием параметров с массива $_POST*/
    public static function post($name = null, $type = null)
    {
        $val = null;
        if (!empty($name) && isset($_POST[$name])) {
            $val = $_POST[$name];
        } elseif (empty($name)) {
            $val = file_get_contents('php://input');
        }

        if ($type == 'string') {
            return strval(preg_replace('/[^\p{L}\p{Nd}\d\s_\-\.\%\s]/ui', '', $val));
        }

        if ($type == 'integer') {
            return intval($val);
        }

        if ($type == 'float') {
            return floatval($val);
        }

        if ($type == 'boolean') {
            return !empty($val);
        }

        return $val;
    }

    public static function translit($text) {
        $ru = explode('-', "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я");
        $en = explode('-', "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch---Y-y---E-e-YU-yu-YA-ya");

        $res = str_replace($ru, $en, $text);
        $res = preg_replace("/[\s]+/ui", '-', $res);
        $res = preg_replace("/[^a-zA-Z0-9\.\-\_]+/ui", '', $res);
        $res = strtolower($res);
        return $res;
    }
}