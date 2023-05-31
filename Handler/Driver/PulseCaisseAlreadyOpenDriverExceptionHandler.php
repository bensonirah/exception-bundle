<?php


namespace Pulse\ExceptionBundle\Handler\Driver;

use Doctrine\DBAL\Exception\DriverException;
use Pulse\ExceptionBundle\Code;
use Pulse\ExceptionBundle\Exception\PulseExceptionInterface;

class PulseCaisseAlreadyOpenDriverExceptionHandler implements PulseExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception)
    {

        return array(
            'message'      => 'Cette caisse est déjà ouverte',
            'http_message' => 'Action non aboutie',
            'code'         => Code::CODE_INTERNAL_ERROR
        );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof DriverException && $exception->getSQLState() == ConstantSrv::SQL_STATE_DEJA_CAISSE_OUVERTE;
    }

}
