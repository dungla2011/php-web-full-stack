# php-web-full-stack

Ở phần Code MVC, chúng ta cài đặt như sau:
- Code từng bài đưa vào c:/code
- Trong C:\xampp\apache\conf\httpd.conf , ta đưa các dòng sau đây vào cuối file:

```
<VirtualHost *:80>
	DocumentRoot "c:/code/public"
</VirtualHost>

<Directory "c:/code/public">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
```

Sau đó khởi động lại Apache Webserver trên Giao diện XAMPP

- Vào http://localhost để xem kết quả

