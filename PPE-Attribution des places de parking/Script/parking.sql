CREATE TABLE MEMBRE
(id_membre int(5) NOT NULL AUTO_INCREMENT,
nom varchar(25),
prenom varchar(25),
constraint pk_membre primary key(id_membre));

CREATE TABLE UTILISATEUR
(id_uti int(5) NOT NULL AUTO_INCREMENT,
identifiant varchar(25) NOT NULL,
mdp int(10) NOT NULL,
nom varchar(25),
prenom varchar(25),
adresse varchar(25),
cp int(5),
tel int(10),
mail varchar(50),
statut int(1),
motcle varchar(20),
constraint pk_uti primary key(id_uti));

CREATE TABLE ATTENTE
(num_attente int(3) NOT NULL AUTO_INCREMENT,
id_uti int(5) NOT NULL,
dateDebut date NOT NULL,
dateFin date NOT NULL,
statut int(2),
num_place int(2),
constraint pk_attente primary key(num_attente));

CREATE TABLE PLACE
(num_place int(2),
statut int(1),
constraint pk_place primary key(num_place));

CREATE TABLE LISTE_ATTENTE
(id_listattente int(3),
num_attente int(3),
constraint pk_listattente primary key(id_listattente));

ALTER TABLE LISTE_ATTENTE
ADD CONSTRAINT FK_LISTATTENTE_ATTENTE FOREIGN KEY(num_attente)
REFERENCES ATTENTE(num_attente);

ALTER TABLE ATTENTE
ADD CONSTRAINT FK_ATTENTE_UTI FOREIGN KEY(id_uti)
REFERENCES UTILISATEUR(id_uti);

ALTER TABLE ATTENTE
ADD CONSTRAINT FK_ATTENTE_PLACE FOREIGN KEY(num_place)
REFERENCES PLACE(num_place);

INSERT INTO attente VALUES
(26, 18, '2016-01-08', '2016-01-16', 1, 4),
(29, 17, '2015-12-09', '2015-12-20', 3, 1),
(28, 17, '2016-02-10', '2016-02-12', 1, 6),
(27, 18, '2016-01-22', '2016-01-30', 1, 9),
(25, 15, '2015-12-17', '2015-12-19', 3, 2),
(24, 15, '2015-12-26', '2015-12-29', 1, 7),
(23, 16, '2015-12-04', '2015-12-06', 1, 10),
(31, 19, '2015-12-31', '2016-01-08', 1, 5),
(22, 16, '2015-12-01', '2015-12-02', 1, 1),
(30, 19, '2015-12-26', '2015-12-31', 1, 2),
(35, 5, '2015-12-18', '2015-12-20', 1, 8),
(34, 5, '2015-12-12', '2015-12-13', 1, 3),
(36, 5, '2015-12-18', '2015-12-20', 2, NULL),
(38, 18, '2015-12-05', '2015-12-27', 2, NULL),
(39, 15, '2016-01-01', '2016-01-10', 2, NULL);

INSERT INTO liste_attente VALUES
(3, 36),
(1, 39),
(2, 38);

INSERT INTO membre VALUES
(1, 'mo', 'david'),
(2, 'hoi', 'patrick'),
(3, 'gilbert', 'kevin'),
(4, 'zerfaoui', 'medhi'),
(5, 'shao', 'christophe'),
(6, 'duhotoy', 'alexandre'),
(7, 'zerfaoui', 'medhi'),
(8, 'zerroudi', 'cerine'),
(9, 'azoulai', 'hicham'),
(10, 'jingoor', 'akram'),
(11, 'morvan', 'clemence'),
(12, 'libii', 'david'),
(13, 'robert', 'morgan'),
(14, 'soirot', 'eliot'),
(15, 'hazard', 'leo'),
(16, 'henin', 'jerome'),
(17, 'khan', 'noor');

INSERT INTO place VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

INSERT INTO utilisateur VALUES
(5, 'kevin', 123456, 'gilbert', 'kevin', '5 rue de la tour', 75018, 612345678, 'kevin1@hotmail.com', 1, 'carotte'),
(6, 'shaochristophe', 123456, 'shao', 'christophe', '4 rue suzanne masson', 93120, 651515151, 'christophe@hotmail.com', 1, 'admin'),
(16, 'akram', 123456, 'jingoor', 'akram', '4 rue suzanne masson', 6519, 654964654, 'akram@hotmail.com', 1, 'chocolat'),
(15, 'cerine', 123456, 'zerroudi', 'cerine', '4 rue suzanne masson', 75089, 651321654, 'cerine@hotmail.com', 1, 'carotte'),
(17, 'david', 123456, 'mo', 'david', '8 rue de la madonne', 75010, 651651954, 'david@hotmail.fr', 1, 'chou'),
(18, 'patrick', 123456, 'hoi', 'patrick', '9 rue de la madonne', 75018, 651561546, 'patrick@hotmail.com', 1, 'nouille'),
(19, 'alexandre', 123456, 'duhotoy', 'alexandre', '10 rue de la madonne', 75020, 654161321, 'alexandre@hotmail.fr', 1, 'grand'),
(21, 'hicham', 123456, 'azoulai', 'hicham', '4 rue suzanne masson', 93120, 654165161, 'hicham@hotmail.com', 0, 'couscous'),
(20, 'noor', 123456, 'khan', 'noor', '4 rue suzanne masson', 75018, 651312418, 'noor@hotmail.fr', 0, 'marron'),
(22, 'morgan', 123456, 'robert', 'morgan', '4 rue suzanne masson', 93100, 654151231, 'morgan@hotmail.com', 0, 'petite'),
(23, 'eliot', 123456, 'soirot', 'eliot', '8 rue de la chappelle', 75014, 689745221, 'eliot@hotmail.fr', 0, 'grand');