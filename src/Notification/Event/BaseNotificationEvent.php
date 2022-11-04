<?php

namespace OpenEuropa\EPoetry\Notification\Event;

use OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Symfony\Contracts\EventDispatcher\Event;

abstract class BaseNotificationEvent extends Event {

    /**
     * Event response.
     *
     * @var ReceiveNotificationResponse
     */
    protected ReceiveNotificationResponse $response;

    /**
     * @param $message
     *
     * @return void
     */
    public function setErrorResponse($message): void {
        $response = new ReceiveNotificationResponse();
        $return = new DgtNotificationResult();
        $return->setMessage($message);
        $return->setSuccess(false);
        $response->setReturn($return);
        $this->response = $response;
    }

    /**
     * @param $message
     *
     * @return void
     */
    public function setSuccessResponse($message): void {
        $response = new ReceiveNotificationResponse();
        $return = new DgtNotificationResult();
        $return->setMessage($message);
        $return->setSuccess(true);
        $response->setReturn($return);
        $this->response = $response;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
     */
    public function getResponse(): ReceiveNotificationResponse {
        return $this->response;
    }

    /**
     * @return bool
     */
    public function hasResponse(): bool {
        return !empty($this->response);
    }

}
