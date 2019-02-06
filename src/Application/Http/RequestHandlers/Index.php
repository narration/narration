<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Psr\Http\Message\ServerRequestInterface;

final class Index
{
    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return array
     */
    public function __invoke(ServerRequestInterface $request): array
    {
        return [
            'quote' => 'Intellectuals solve problems, geniuses prevent them.',
        ];
    }
}
