server {
	listen 80;
	listen [::]:80;


	root /home/aum/Staff/Charmi/web/;

	index jsdemo.html  index.html index.htm index.nginx-debian.html;

	server_name jsdemo.com www.jsdemo.com;

	location / {
		try_files $uri $uri/ =404;
	}



}


