create schema amgi;

use amgi;

create table users(
	id int(11) not null primary key auto_increment,
    username char(30) not null,
    userpass varchar(255) not null,
    is_active tinyint(1) default 1,
	created_at TIMESTAMP default current_timestamp
);
-- I alter the table because I didn't add unique key for username
alter table users
add unique key(username);