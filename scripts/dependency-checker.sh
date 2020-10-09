#!/bin/bash

echo -n "Checking dependencies... "

if ! [[ "$(python3 -V)" =~ "Python 3" ]] ; 
then echo "You need python 3 or later to run h-index-reader" exit; fi

if ! which pip3 >/dev/null; then
    echo "pip3 could not be found in the system. Exiting."
    exit
fi

pip3 install scholarly --user
pip3 install argparse --user