<?php

namespace ImmobiliareLabs\BrazeSDK\Exception;

abstract class HttpException extends \RuntimeException
{
    /**
     * Constructs the HTTP exception, optionally appending truncated HTTP response content to the message.
     *
     * @param string $message The exception message; if `$responseContent` is provided it will be appended to this message.
     * @param int $code The exception code.
     * @param \Throwable|null $previous The previous throwable used for exception chaining.
     * @param string|null $responseContent Optional HTTP response body. When provided, it is truncated to 1000 characters (appending '... (truncated)' if longer) and appended to the message.
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        ?string $responseContent = null,
    ) {
        if (null !== $responseContent) {
            $truncated = mb_strlen($responseContent) > 1000 ? mb_substr($responseContent, 0, 1000) . '... (truncated)' : $responseContent;

            $message .= sprintf(' - Response content: %s', $truncated);
        }

        parent::__construct($message, $code, $previous);
    }
}