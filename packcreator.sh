#!/bin/bash
#removing old versions
rm rebol*.deb 
rm rebol*.tgz
rm rebol*.rpm 
#creating new ones
dpkg-deb -b rebol
dpkg-deb -b rebol_amd64 
sudo alien --to-rpm --to-tgz rebol.deb 
sudo alien --to-rpm rebol_amd64.deb

echo "remember to launch:"
echo ""
echo "git push origin master"
echo ""
echo "after renaming files"