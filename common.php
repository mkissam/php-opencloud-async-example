<?php

use GuzzleHttp\Client;
use OpenStack\Identity\v2\Api;
use OpenStack\Identity\v2\Service;
use OpenStack\Common\Transport\HandlerStack;

class OpenStackIdentityOptions
{

    protected function getAuthOptsV3()
    {
        return [
            'authUrl' => getenv('OS_AUTH_URL'),
            'region'  => getenv('OS_REGION'),
            'user'    => [
                'id'       => getenv('OS_USER_ID'),
                'password' => getenv('OS_PASSWORD'),
            ],
            'scope'   => [
                'project' => [
                    'id' => getenv('OS_PROJECT_ID'),
                ]
            ]
        ];
    }

    protected function getAuthOptsV2()
    {
        $httpClient = new Client([
            'base_uri' => getenv('OS_AUTH_URL'),
            'handler'  => HandlerStack::create(),
        ]);
        $identityService = new Service($httpClient, new Api);
        return [
            'authUrl'         => getenv('OS_AUTH_URL'),
            'region'          => getenv('OS_REGION_NAME'),
            'username'        => getenv('OS_USERNAME'),
            'password'        => getenv('OS_PASSWORD'),
            'tenantName'      => getenv('OS_TENANT_NAME'),
            'identityService' => $identityService,
        ];
    }

    public function getAuthOpts()
    {
        return getenv('OS_IDENTITY_API_VERSION') == '2.0' ?
            $this->getAuthOptsV2() : $this->getAuthOptsV3();
    }
}