<?php

namespace App\Exceptions;

use Exception;

class RedirectException extends Exception
{
    /**
     * @var int|mixed
     */
    public int $status = 302;

    public array $errors = [];

    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct($message = '', $errors = [], $code = 302)
    {
        parent::__construct($message);
        $this->errors = $errors;
        $this->status = $code;
    }

    /**
     * @param  array  $errors
     * @return $this
     */
    public function setErrors(array $errors = []): self
    {
        $this->errors = $errors;

        return $this;
    }

    public function redirect()
    {
        return redirect()
            ->back($this->status)
            ->withErrors($this->errors)
            ->with('error', $this->message);
    }
}
