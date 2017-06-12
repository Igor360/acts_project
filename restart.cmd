@echo off
echo Shutting down servers...
taskkill /IM nginx.exe /F
taskkill /IM php-cgi.exe /F
net stop MySQL
echo Starting servers...
set PHP_FCGI_MAX_REQUESTS=0
set SRVPATH=C:\Users\pp\Desktop\nginx
net start MySQL
start /D%SRVPATH% nginx.exe
%SRVPATH%\php\php-cgi.exe -b 127.0.0.1:9000 -c %SRVPATH%/php/php.ini
exit