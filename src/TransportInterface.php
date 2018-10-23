<?php

namespace Codeninjas\API\MyStrom\Cloud;

use Codeninjas\API\MyStrom\Cloud\Transport\Response;

interface TransportInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $payload
     * @return Response
     */
    public function dispatch(string $method, string $url, array $payload = null) : Response;
}
