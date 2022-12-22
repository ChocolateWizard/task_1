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
insert into `user`(`first_name`,`last_name`,`username`,`password`,`email`,`country_id`) values("Marko","Markovic","Marko","Marko","marko@gmail.com",1);

create table `movie`(
    `id` int auto_increment primary key,
    `title` varchar(100),
    `year` int,
    `cover_url` varchar(500),
    `description` varchar(500),
    `directors` varchar(500),
    `writers` varchar(500),
    `stars` varchar(500)
);

insert into `movie`(`title`,`year`,`cover_url`,`description`,`directors`,`writers`,`stars`) values 
("Eyes Wide Shut",1999,"database/resources/images/movies/covers/Eyes_Wide_Shut.jpg","A Manhattan doctor embarks on a bizarre, night-long odyssey after his wife's admission of unfulfilled longing.","Stanley Kubrick","Stanley Kubrick, Frederic Raphael, Arthur Schnitzler","Tom Cruise, Nicole Kidman, Todd Field"),
("The Shining",1980,"database/resources/images/movies/covers/The_Shining.jpg","A family heads to an isolated hotel for the winter where a sinister presence influences the father into violence, while his psychic son sees horrific forebodings from both past and future.","Stanley Kubrick","Stephen King, Stanley Kubrick, Diane Johnson","Jack Nicholson, Shelley Duvall, Danny Lloyd"),
("No Country for Old Men",2007,"database/resources/images/movies/covers/No_Country_For_Old_Men.jpg","Violence and mayhem ensue after a hunter stumbles upon a drug deal gone wrong and more than two million dollars in cash near the Rio Grande.","Ethan Coen, Joel Coen","Joel Coen, Ethan Coen, Cormac McCarthy","Tommy Lee Jones, Javier Bardem, Josh Brolin"),
("The Lighthouse",2019,"database/resources/images/movies/covers/The_Lighthouse.jpg","Two lighthouse keepers try to maintain their sanity while living on a remote and mysterious New England island in the 1890s.","Robert Eggers","Robert Eggers, Max Eggers","Robert Pattinson, Willem Dafoe, Valeriia Karaman")
;




