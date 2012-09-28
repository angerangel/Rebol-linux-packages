#!/bin/bash
rm rebol*.deb
rm rebol*.tgz
rm rebol*.rpm 

dpkg-deb -b rebol
dpkg-deb -b rebol_amd64 
sudo alien --to-rpm --to-tgz rebol.deb 
sudo alien --to-rpm rebol_amd64.deb
