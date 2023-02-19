<?php

namespace Codeninjas\API\MyStrom\Cloud;

use Codeninjas\API\MyStrom\Cloud\Model\Account;

class Mapper
{
    use LoggerTrait;

    public function mapResponseToAccount(array $payload, Account $account = null) : Account
    {
        if ($account === null) {
            $account = new Account();
        }

        if (empty($payload)) {
            return $account;
        }

        if (isset($payload['status'])) {
            $account->setStatus($payload['status']);
        }
        if (isset($payload['name'])) {
            $account->setName($payload['name']);
        }
        if (isset($payload['fname'])) {
            $account->setFname($payload['fname']);
        }
        if (isset($payload['lname'])) {
            $account->setLname($payload['lname']);
        }
        if (isset($payload['email'])) {
            $account->setEmail($payload['email']);
        }
        if (isset($payload['accountType'])) {
            $account->setAccountType($payload['accountType']);
        }
        if (isset($payload['currency'])) {
            $account->setCurrency($payload['currency']);
        }
        if (isset($payload['onlineShop'])) {
            $account->setOnlineShop($payload['onlineShop']);
        }
        if (isset($payload['appUrl'])) {
            $account->setAppUrl($payload['appUrl']);
        }

        return $account;

    }

    /**
     * @param \DateTime|null $dateTime
     * @return string
     */
    public function formatDateTime(\DateTime $dateTime = null) : string
    {
        if ($dateTime === null) {
            return null;
        }

        return $dateTime->format(\DateTime::ATOM);
    }
}
