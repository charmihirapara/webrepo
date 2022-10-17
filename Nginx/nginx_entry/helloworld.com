server {
	listen 80;
	listen [::]:80;


	root /home/aum/web/charmi_repository/Twig/;

	index helloworld.php  index.html index.htm index.nginx-debian.html;

	server_name helloworld.com www.helloworld.com;

	location / {
		try_files $uri $uri/ =404;
	}

	location ~ \.php$ {
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_index helloworld.php;
        fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
}



}


#}
