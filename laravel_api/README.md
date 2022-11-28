# Laravel Sail - First steps
## Installing Composer Dependencies For Existing Applications

```
 docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-req=php+
```

### Create alias for sail
 
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
### After that, you can use normally the artisan commands using the alias

Example: 
```
sail artisan up
```
