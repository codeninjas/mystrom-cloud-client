<?php

namespace Codeninjas\API\MyStrom\Cloud\Transport;

use Codeninjas\API\MyStrom\Cloud\TransportInterface;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleTransport implements TransportInterface
{
    const JSON_DECODE_ASSOC = true;

    /** @var ClientInterface */
    protected $httpClient;

    /** @var  string */
    protected $apiKey;

    /**
     * Transport constructor.
     * @param ClientInterface $httpClient
     * @param string $apiKey
     */
    public function __construct(ClientInterface $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }


    /**
     * @param string $method
     * @param string $url
     * @param array $payload
     * @return Response
     */
    public function dispatch(string $method, string $url, array $payload = null) : Response
    {
        $transportType = 'form_params';
        if ($method === 'GET') {
            $transportType = 'query';
        }

        $enforcedPayload = [];

        $rawResponse = null;

        $options = [
            $transportType => array_merge($payload, $enforcedPayload),
            'headers' => [
                'Accept' => 'application/json',
                'Auth-Token' => $this->apiKey,
                'User-Agent' => 'codeninjas.io/0.1'
            ],
        ];

        $rawResponse = $this->httpClient->request($method, $url, $options);
        return $this->psrResponseToResponse($rawResponse);
    }

    /**
     * @param ResponseInterface $rawResponse
     * @return Response
     */
    private function psrResponseToResponse(ResponseInterface $rawResponse) : Response
    {
        //TODO: Make content-type evaluation more dynamic and not hardcoded.
        switch (current($rawResponse->getHeader('Content-Type'))) {
            case 'application/json; charset=UTF-8' :
                $response = new JsonResponse();
                $response->setPayload(json_decode($rawResponse->getBody()->getContents(), true));

                break;
            default:
                $response = new Response();
                $response->setPayload($rawResponse->getBody()->getContents());

                break;
        }

        $response->setStatusCode($rawResponse->getStatusCode());

        return $response;
    }
}
