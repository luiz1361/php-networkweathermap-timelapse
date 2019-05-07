#!/bin/bash

for filename in `ls -1 /usr/share/cacti/site/plugins/weathermap/output | grep thumb.png$ | sed s/\.thumb//g`; do
	timestamp=`date +"%d-%m-%Y-%T"`
	cp /usr/share/cacti/site/plugins/weathermap/output/$filename /usr/share/cacti/site/plugins/weathermap/timelapse/working/$filename\_$timestamp.png
done

