<?php namespace BookStack\Exceptions;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 */

class NotFoundException extends PrettyException {

    /**
     * NotFoundException constructor.
     * @param string $message
     */
    public function __construct($message = 'Item not found')
    {
        parent::__construct($message, 404);
    }
}