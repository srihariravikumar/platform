<?php namespace BookStack\Exceptions;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

class NotifyException extends \Exception
{

    public $message;
    public $redirectLocation;

    /**
     * NotifyException constructor.
     * @param string $message
     * @param string    $redirectLocation
     */
    public function __construct($message, $redirectLocation)
    {
        $this->message = $message;
        $this->redirectLocation = $redirectLocation;
        parent::__construct();
    }
}
