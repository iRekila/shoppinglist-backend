create database shoppinglist;

use shoppinglist;

create table item (
    id int PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    amount SMALLINT UNSIGNED NOT NULL
);

insert into item (description,amount) values ('Test item',1);