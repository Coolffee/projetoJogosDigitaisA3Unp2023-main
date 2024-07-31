create database dbScoreInGame;
use dbScoreInGame;

create table RegisterUser(

	nameUserId int primary key auto_increment not null,
    nameUser varchar(50) not null,
    passwordUser varchar(10) not null,
    recordPersonalUser int not null,
    addNickName varchar(50) not null, 
    unique (addNickName)
);
