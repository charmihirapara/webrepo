server {
	listen 80;
	listen [::]:80;

	root /home/aum/web/charmi_repository/Javascript/;

	index ajaxdemo.html  index.html index.htm index.nginx-debian.html;

	server_name ajaxdemo.com www.ajaxdemo.com;

	location / {
		try_files $uri $uri/ =404;
	}



}


