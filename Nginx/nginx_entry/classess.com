server {
	listen 80;
	listen [::]:80;


	root /home/aum/Staff/Charmi/web/classess.com/;

	index php1_c.php  index.html index.htm index.nginx-debian.html;

	server_name classess.com www.classess.com;

	location / {
		try_files $uri $uri/ =404;
	}

	 location ~ \.php$ {
        	#NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
        	include fastcgi_params;
        	fastcgi_intercept_errors on;
        	fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        	fastcgi_index php1_c.php;
        	fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
	}



}


