<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Monolog\Logger;
use Psr\Http\Message\ServerRequestInterface;

final class Index
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return array
     */
    public function __invoke(ServerRequestInterface $request): array
    {
        $this->logger->debug('Hit ' . __CLASS__);
        return [
            'quote' => 'Intellectuals solve problems, geniuses prevent them.',
        ];
    }
}
