<?php

namespace ImmobiliareLabs\BrazeSDK\Exception;

abstract class HttpException extends \RuntimeException
{
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
