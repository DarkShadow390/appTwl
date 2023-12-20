create database if not exists tudolist;
use tudolist;

create table Categorie(
	id_categorie int primary key auto_increment not null,
	name_categorie varchar(50) not null

)Engine=InnoDB;

create table Users(
	id_users int primary key auto_increment not null,
	name_users varchar(50) not null,
    firstname_users varchar(50) not null,
    email_users varchar(100) not null,
    password_users varchar(100) not null,
	image_users varchar(100),
    statut_users tinyint(1) default 1

)Engine=InnoDB;

create table Tasks(
	id_tasks int primary key auto_increment not null,
	title_tasks varchar(50) not null,
    description_tasks text,
    deadline_tasks datetime null,
    statut_tasks tinyint(0) default 0,
	keys_tasks varchar(100) not null,
    id_categorie int default 1
    
)Engine=InnoDB;


create table To_asign(
	id_tasks int not null,
	id_categorie int not null,
	primary key(id_tasks,id_categorie)

)Engine=InnoDB;

create table Themes(
	id_themes int primary key auto_increment not null,
	name_themes varchar(50) not null

)Engine=InnoDB;


INSERT INTO Tasks(title_tasks, description_tasks, deadline_tasks) 
VALUES("manger kebab","j'ai faim ","2023-12-08"),
("test","","2024-12-05"),
("application","je dois faire une application de rdv","2024-12-05");

INSERT INTO Categorie(name_categorie) 
VALUES("tout"), ("perso"),("travail");

INSERT INTO Themes(name_themes) 
VALUES("animaux"), ("manga"),("sport");

ALTER TABLE Tasks
add constraint fk_categorie_tasks_constraint
foreign key (id_categorie)
references categorie(id_categorie);


alter table to_asign
add constraint fk_id_tasks_tasks_constraint
foreign key(id_tasks)
references tasks(id_tasks),
add constraint fk_id_categorie_categorie_constraint
foreign key(id_categorie)
references categorie(id_categorie);