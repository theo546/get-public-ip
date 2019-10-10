# get-public-ip

## Requirements
nginx, php-fpm, a domain name

## How to install?
### Server side
Install nginx and php-fpm using apt-get:
`apt-get install nginx php-fpm`

Use the `replace-hostname.sh` script to to rename the default configuration, you need to open a terminal in the directory of the cloned repository then type this command:
`replace-hostname.sh your-domain.tld`

Transfer the nginx folder to your `/etc` folder on your server.
Then type this command on your server:
`ln -s /etc/nginx/sites-available/config /etc/nginx/sites-enabled/config && service nginx restart`

Create a directory in `/var/www` called `get-ip`.
Transfer the `index.php` in the `public` folder to the `/var/www/get-ip` directory.

### Domain side
Create an A entry that point to your server IPv4 address for the subdomain `ipv4`
Create an AAAA entry that point to your server IPv6 address for the subdomain `ipv6`

Create an A and AAAA entry that point to your server IPv4 and IPv6 address for the subdomain `getip`
