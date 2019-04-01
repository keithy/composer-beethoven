#!/bin/bash

#Let then know we are here

echo "Da da da Dum...";

php -f ${BASH_SOURCE[0]%/*}/beethoven.php && composer "$@"
