Assumptions:
* Using Network-Weathermap(https://www.network-weathermap.com/) and Cacti(https://www.cacti.net/)
* Default installation locations for both /usr/share/cacti/site/plugins/weathermap/
* Built on Ubuntu Server 16.04 LTS

Add the following to crontab:
```bash
*/5 * * * * root bash /usr/share/cacti/site/plugins/weathermap/timelapse/cron/weathermap_archive.sh
50 23 * * * root bash /usr/share/cacti/site/plugins/weathermap/timelapse/cron/weathermap_encoder.sh
```

Clone as below:
```bash
mkdir /usr/share/cacti/site/plugins/weathermap/timelapse/ && cd /usr/share/cacti/site/plugins/weathermap/timelapse/ && git clone https://github.com/luiz1361/php-networkweathermap-timelapse.git . 
```

Requires the following Linux packages:
* mencoder
* avconv
* ffmpeg

This should do the job:
```bash
$sudo apt-get install mencoder avconv ffmpeg 
```

Screenshots:

![screenshot](https://github.com/luiz1361/php-networkweathermap-timelapse/blob/master/screenshots/screenshot.gif)
