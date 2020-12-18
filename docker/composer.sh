#!/usr/bin/env bash

call="cd /www && /usr/local/bin/composer"

eval "docker exec -it blockfundcrypto_apache bash -c \"$call $*\""
eval "docker exec -it blockfundcrypto_apache bash -c \"chmod -R a+w /www/vendor/\""
