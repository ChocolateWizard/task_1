drop database if exists `zadatak_1`;
create database `zadatak_1`;
use `zadatak_1`;

create table `country`(
`id` int auto_increment primary key,
`name` varchar(500)
);

insert into `country`(`name`) values ('Serbia'),('USA'),('Japan'),('Mexico');


create table `user`(
    `id` int auto_increment primary key,
    `first_name` varchar(100),
    `last_name` varchar(100),
    `username` varchar(100) unique,
    `password` varchar(100),
    `email` varchar(320) unique,
    `country_id` int,
    `reset_token` VARCHAR(50),
    `reset_token_exp` date,
    foreign key(`country_id`) references `country`(`id`)
);


