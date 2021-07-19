<?php
namespace LsBr\MessageAdditionalSuccessPage\Helper;

use Laminas\Log\Writer\Stream;
use Laminas\Log\Logger;

class Log
{
    /**
     * @param $data
     * @param $fileName
     */
    public function createLog($data, $fileName=null)
    {
        $fileName = !$fileName ? 'MessageAdditionalSuccessPage' : $fileName;
        $writer = new Stream(BP . '/var/log' . $fileName . '.log');
        $logger = new Logger();
        $logger->addWriter($writer);
        $logger->info(json_encode($data,JSON_PRETTY_PRINT));

    }
}
