<?php
/**
 * SwooleException
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace PG\MSF\Server\CoreBase;

class SwooleException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        print_r($message . "\n");
        get_instance()->log->error($message . "\n" . $this->getTraceAsString());
    }

    /**
     * 设置追加信息
     * @param $others
     */
    public function setShowOther($others)
    {
        print_r("=================================================\e[30;41m [ERROR] \e[0m==============================================================\n");
        if (!empty($others)) {
            print_r($others . "\n");
        } else {
            print_r($this->getMessage() . "\n");
            print_r($this->getTraceAsString() . "\n");
        }
        print_r("\n");
        get_instance()->log->notice($others);
    }
}