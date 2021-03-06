<?php namespace BookStack\Exceptions;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
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
