<?php

/**
 * A very simple async example of container listing.
 */
require 'vendor/autoload.php';
require 'common.php';

$identityOptions = new \OpenStackIdentityOptions();
$openstack = new OpenStack\OpenStack($identityOptions->getAuthOpts());
$service = $openstack->objectStoreV1();

// list containers as an async call
$promise = $service->listContainersAsync();
$promise->then(
    // process async result
    function ($containers)
    {
        echo "Containers:\n";
        foreach ($containers as $container) {
            echo "  ".$container->name."\n";
        }
    },
    // handle error
    function ($e)
    {
        echo $e->getMessage()."\n";
        echo $e->getRequest()->getMethod();
    }
);
// wait async call to finish
$promise->wait();