<?php
/**
 * Exception
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace PG\MSF\Base;

use PG\Exception\BusinessException;
use PG\MSF\Controllers\BaseController;

class Exception extends \Exception
{
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * 设置追加信息
     * @param $others
     * @param BaseController $controller
     */
    public function setShowOther($others, $controller = null)
    {
        if (!empty($controller)) {
            echo date('Y/m/d H:i:s') . ' [server] [logid:' . $controller->PGLog->logId . '] ';
        }
        //  BusinessException 不打印在终端.
        if ($this->getPrevious() instanceof BusinessException) {
            return;
        }
        if (!empty($others)) {
            print_r($others . "\n");
        } else {
            print_r($this->getMessage() . "\n");
            print_r($this->getTraceAsString() . "\n");
        }
        print_r("\n");
    }
}