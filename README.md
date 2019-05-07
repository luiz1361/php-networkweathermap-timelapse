Add the following to crontab:
```bash
*/5 * * * * root bash /usr/share/cacti/site/plugins/weathermap/timelapse/cron/weathermap_archive.sh
50 23 * * * root bash /usr/share/cacti/site/plugins/weathermap/timelapse/cron/weathermap_encoder.sh
```

Requires:
* mencoder
* avconv
* ffmpeg
