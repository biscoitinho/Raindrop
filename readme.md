Raindrop - made on a rainy afternoon ;)

simple RAW php app (twitter-like clone)

log in to your mysql

`mysql -u root -p`

create db `tweets` and table:

`CREATE TABLE raindrop ( id INT UNSIGNED NOT NULL AUTO_INCREMENT, body VARCHAR(250), pubdate TIMESTAMP, PRIMARY KEY (id) );`

and fire it up:

`sudo php -S localhost:8888`

cheers :)
