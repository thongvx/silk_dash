
## Dự án streamsilk

Hướng dẫn cho người mới:
- Dùng Php storm code cho nó nhanh nha
- Tải các thư viện laravel thông qua lệnh <b>composer install --ignore-platform-reqs</b>
- Tạo database, Tạo file .env, Copy nội dung file .env.example vào đó rồi sửa lại thông tin database
- Nếu chạy ở local: Chạy lệnh <b>php artisan migrate</b> để install database, nếu có update chạy lại lệnh này
- sau đó tải các thư viện js bằng lệnh <b>npm install</b>, sau đó <b>npm update</b> và cuối cùng chạy <b>npm run dev</b>
- Chạy lệnh <b>php artisan storage:link</b> để link storage
- Chạy server bằng lệnh <b>php artisan serve</b> ok giờ có thể truy cập website rồi
  Những công việc cần làm

Code xong nhớ commit lên git nha

Thêm lệnh này vào cron:
php /home/domain/public_html/artisan update:video-views





Visit: https://134.19.178.62:8090                     
Panel username: admin                              
Panel password: bhWQtEdrkXHdUDnN   

Visit: https://134.19.178.61:8090                     
Panel username: admin                              
Panel password: sz6GES3TVZsJPw08


//Cài triển khai horizon
sudo apt-get update
sudo apt-get install supervisor

sudo nano /etc/supervisor/conf.d/horizon.conf

cấu hình thên vào file trên như sau
[program:horizon]
process_name=%(program_name)s
command=php /home/user.streamsilk.com/public_html/artisan horizon
autostart=true
autorestart=true
user=root
redirect_stderr=true
stopwaitsecs=3600
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start horizon
