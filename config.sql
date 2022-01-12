drop database if exists n0vasu00;
create database n0vasu00;
use n0vasu00;

create table user (
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    username int primary key auto_increment,
    password varchar(150) not null
);

CREATE TABLE user_info (
    username int not null,
    osoite varchar(100),
    kaupunki varchar(100),
    puh_nro varchar(10)
);
