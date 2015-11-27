# PHP OpenCloud Async Examples

## Install prerequisites

Get a clean Ubuntu 14.04LTS, then deploy php5.6 packages.

    $ sudo add-apt-repository -y ppa:ondrej/php5-5.6
    $ sudo apt-get update
    $ sudo apt-get install -y php5-cli php5-curl git

## Set OpenStack connection env variables

sample openrc file:

    #!/usr/bin/env bash

    export OS_REGION_NAME=RegionOne
    export OS_IDENTITY_API_VERSION=2.0
    export OS_PASSWORD=<yoursecretpassword>
    export OS_AUTH_URL=http://<api-url>:5000/v2.0/
    export OS_USERNAME=demo
    export OS_TENANT_NAME=demo
    export OS_VOLUME_API_VERSION=2
    export OS_NO_CACHE=1

Import openrc file:

    $ source openrc

## Deploy and execute examples

    $ git clone https://github.com/mkissam/php-opencloud-async-example.git examples
    $ cd examples
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install
    $ php 0001-async-container-list.php
