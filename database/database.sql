drop database if exists `zadatak_1`;
create database `zadatak_1`;
use `zadatak_1`;

create table `place`(
`id` int auto_increment primary key,
`name` varchar(500)
);

insert into `place`(`name`) values
("New York"),
("London"),
("Paris"),
("Washington"),
("Tokyo")
;

create table `user`(
    `id` int auto_increment primary key,
    `first_name` varchar(100),
    `last_name` varchar(100),
    `username` varchar(100) unique,
    `password` varchar(100),
    `email` varchar(320),
    `place_id` int,
    foreign key(`place_id`) references `place`(`id`)
);


