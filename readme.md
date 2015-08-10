# larablog
A Build out of the L5Beauty write up - located at http://laravelcoding.com/



### Mail Commands ###
php artisan queue:work

# OK
queue:listen

## BETTER
Running queue:listen with supervisord
supervisord is a *nix utility to monitor and control processes. We’re not delving into how to install this utility, but if you have it and get it installed, below is a portion of /etc/supervisord.conf that works well.

Portion of supervisord.conf for queue:listen
[program:l5beauty-queue-listen]
command=php /PATH/TO/l5beauty/artisan queue:listen
user=NONROOT-USER
process_name=%(program_name)s_%(process_num)d
directory=/PATH/TO/l5beauty
stdout_logfile=/PATH/TO/l5beauty/storage/logs/supervisord.log
redirect_stderr=true
numprocs=1

You’ll need to replace the /PATH/TO/ to match your local install. Likewise, the user setting will be unique to your installation.

## THEN
crontab -e
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1

php artisan make:job --queued TestJob