
# NTP MitM Demo

## Setup

1. Install Raspberry Pi OS to a Raspberry Pi device
2. Run the following commands to install nginx and PHP
```
sudo apt-get install nginx php php-fpm
sudo systemctl enable nginx
sudo systemctl start nginx
```

3. Update `/etc/nginx/sites-available/default` to the following:
```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;
    server_name _;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
     }

    location ~ /\.ht {
        deny all;
    }

}
```

4. Copy files from this repo to `/var/www/html`
5. Run `sudo systemctl restart nginx`

## Attack Tools

- [mitmrouter](https://github.com/nmatt0/mitmrouter)
    - Used to perform mitm attack and redirect UDP port 123 traffic to Delorean tool
- [Delorean](https://github.com/jselvi/Delorean)
    - Used to respond to NTP client sync requests with spoofed time results

