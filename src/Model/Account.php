<?php

namespace Codeninjas\API\MyStrom\Cloud\Model;

class Account
{
    /** @var string */
    protected $status;
    /** @var string */
    protected $name;
    /** @var string */
    protected $fname;
    /** @var string */
    protected $lname;
    /** @var string */
    protected $email;
    /** @var string */
    protected $accountType;
    /** @var string */
    protected $currency;
    /** @var string */
    protected $onlineShop;
    /** @var string */
    protected $appUrl;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFname(): string
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname(): string
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * @param string $accountType
     */
    public function setAccountType(string $accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getOnlineShop(): string
    {
        return $this->onlineShop;
    }

    /**
     * @param string $onlineShop
     */
    public function setOnlineShop(string $onlineShop)
    {
        $this->onlineShop = $onlineShop;
    }

    /**
     * @return string
     */
    public function getAppUrl(): string
    {
        return $this->appUrl;
    }

    /**
     * @param string $appUrl
     */
    public function setAppUrl(string $appUrl)
    {
        $this->appUrl = $appUrl;
    }
}
