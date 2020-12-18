#!/usr/bin/env bash

call="cd /www && npm"

eval "docker exec -it blockfundcrypto_apache bash -c \"$call $*\""
