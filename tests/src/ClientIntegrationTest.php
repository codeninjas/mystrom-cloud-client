<?php

namespace Codeninjas\API\MyStrom\CloudTest;

use Codeninjas\API\MyStrom\Cloud\Client;
use Codeninjas\API\MyStrom\CloudTest\Transport\RecorderTransport;

class ClientIntegrationTest extends Base\TestBase
{
    /** @var  RecorderTransport */
    protected $transport;
    /** @var  Client */
    protected $client;

    public function testGetAccountInfo()
    {
        $response = $this->client->getAccountInfo();
        print_r($response);
    }

    protected function setUp()
    {
        $guzzleTransport = $this->setupGuzzleTransport();

        $this->transport = new RecorderTransport($guzzleTransport);
        $this->client = new Client($this->transport);
    }
}
