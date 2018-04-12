# simple-php-api

You can add virtual hosts as well.

For Windows
C:\wamp64\bin\apache\apache2.4.23\conf\extra\httpd-vhosts.conf or in your apache folder

then add 
<VirtualHost *:80>
	DocumentRoot C:\wamp64\www\php\hosts\slimapp\public
	ServerName YourVirtualHostName
</VirtualHost>

And then run your notepad with administrator. 
Then Open C:\Windows\System32\drivers\etc\hosts

And Add this line. 
127.0.0.1 YourVirtualHostName

Restart your Apache and then go to your browser and write http://YourVirtualHostName

Download or add chrome extension called "RestEasy" To call the api. Or you could use others as well.
