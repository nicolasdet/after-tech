#!/bin/bash
# GNU bash, version 4.3.46
echo "clef  ${key}";
sshpass -p ${key} ssh root@vps554131.ovh.net bash after-tech/script.sh;