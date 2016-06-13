mysql -uroot -e "drop database login;"
mysql -uroot -e "create database login character set UTF8;"
mysql -uroot login -e "create table logi(id MEDIUMINT NOT NULL AUTO_INCREMENT, name VARCHAR(20), password VARCHAR(256), date VARCHAR(256), item VARCHAR(256), PRIMARY KEY(id));"
