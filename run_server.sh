#!/bin/bash
cd "$(dirname "$0")"
echo "========================================================"
echo " Starting Gyanmanjari Innovative University (GMIU) Server"
echo " Link: http://127.0.0.1:8085"
echo "========================================================"
php -d opcache.enable=0 -S 127.0.0.1:8085
