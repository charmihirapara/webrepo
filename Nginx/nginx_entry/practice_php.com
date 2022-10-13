server {
	listen 80;
	listen [::]:80;


	root /home/aum/Staff/Charmi/web/practice_php.com;

	index test.php oop1_class.php index.html index.htm index.nginx-debian.html;

	server_name practice_php.com www.practice_php.com;


	 location ~ \.php$ {
        #NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_index test.php,oop1_class.php,oop2_inheritance.php,oop3_inheritance.php,oop4_traits.php;
        fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
}



}


