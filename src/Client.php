<?php

namespace Codeninjas\API\MyStrom\Cloud;

use Psr\Log\LoggerInterface;

class Client
{
    use LoggerTrait;

    /** @var  TransportInterface */
    protected $transport;

    /** @var  Mapper */
    protected $mapper;

    /**
     * Client constructor.
     * @param TransportInterface $transport
     * @param Mapper $mapper
     * @param LoggerInterface $logger
     */
    public function __construct(TransportInterface $transport, Mapper $mapper = null, LoggerInterface $logger = null)
    {
        $this->setLogger($logger);

        $this->transport = $transport;

        $this->mapper = $mapper;
        if (null === $this->mapper) {
            $this->mapper = new Mapper();
            $this->mapper->setLogger($this->getLogger());
        }
    }

    public function getAccountInfo()
    {
        $method = 'GET';
        $url = 'api/profile';
        $payload = [];

        $response = $this->transport->dispatch($method, $url, $payload);

        return $this->mapper->mapResponseToAccount($response->getPayload());
    }

    //--------------------------------------------[GETTER & SETTER]--------------------------------------------
    /**
     * @return TransportInterface
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param TransportInterface $transport
     * @return $this
     */
    public function setTransport(TransportInterface $transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return Mapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param Mapper $mapper
     * @return $this
     */
    public function setMapper(Mapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}
