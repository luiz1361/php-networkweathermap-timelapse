#!/bin/bash

# Define timestamp
timestamp=`date +"%d-%m-%Y-%T"`

# Clean-up of previous avi files
rm /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/avi/*

# For each weathermap convert all respective png to avi
for mapid in `ls -1 /usr/share/cacti/site/plugins/weathermap/timelapse/working/ | awk -F "_" '{ print $1 }' | uniq`;do
    mencoder mf:///usr/share/cacti/site/plugins/weathermap/timelapse/working/$mapid*.png -mf w=800:h=600:fps=3:type=png -ovc lavc -lavcopts vcodec=mpeg4:mbd=2:trell -oac copy -o /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/avi/$mapid\_$timestamp\.avi
done

# Clean-up of previous mp4 files
rm /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/mp4/*

# For each avi file generated above convert to mp4
for filename in `ls -1 /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/avi/`; do 
    avconv -i /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/avi/$filename -c:v libx264 -c:a copy /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/mp4/$filename.mp4
done

# Clean-up of previous png files
rm /usr/share/cacti/site/plugins/weathermap/timelapse/working/*

# Create list of mp4 files appended with '-i'
a=""
for filename in `ls -1 /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/mp4/`; do 
    list=$list" -i "/usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/mp4/$filename 
done

# Using the list of mp4 files above create combined video, works for three weathermaps side by side.
ffmpeg -v warning $list -filter_complex '[0:v][1:v][2:v]hstack=3' /usr/share/cacti/site/plugins/weathermap/timelapse/htdocs/mp4/combined.mp4

