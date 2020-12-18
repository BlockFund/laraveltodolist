#!/usr/bin/env bash

call="cd /www && php artisan"

eval "docker exec -it blockfundcrypto_apache bash -c \"$call $*\""
