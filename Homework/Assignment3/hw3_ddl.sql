Drop user if exists nguyen;
grant all on CPSC_431_HW3.* to 'nguyentran'@'localhost' identified by 'nguyen';
drop database if EXISTS CPSC_431_HW3;
create database if not EXISTS CPSC_431_HW3;

use CPSC_431_HW3;

CREATE TABLE TeamRoster
(ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Name_First VARCHAR(100),
 Name_Last VARCHAR(150) NOT NULL,
 Street VARCHAR(250),
 City VARCHAR(100),
 State VARCHAR(100),
 Country VARCHAR(100),
 ZipCode CHAR(10),
 
 CONSTRAINT CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\d{5}(-(?!0{4})(?!9{4})\d{4})?'),
 
 INDEX(Name_Last),
 INDEX(Name_Last, Name_First) 
);

CREATE TABLE Statistics
(
    ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Player INTEGER UNSIGNED NOT NULL,
    PlayerTimeMin TINYINT(2) UNSIGNED DEFAULT 0,
    PlayerTimeSec TINYINT(2) UNSIGNED DEFAULT 0,
    Points TINYINT(3) UNSIGNED DEFAULT 0,
    Assists TINYINT(3) UNSIGNED DEFAULT 0,
    Rebounds TINYINT(3) UNSIGNED DEFAULT 0,
    
    CONSTRAINT FOREIGN KEY (Player) REFERENCES TeamRoster(id) on DELETE cascade,
    CONSTRAINT CHECK (PlayingTimeMin <= 40),
    CONSTRAINT CHECK (PlayingTimeSec < 60)
);

INSERT INTO TeamRoster VALUES
('100','Donald','Duck','1313 S.Harbor Blvd.','Anaheim','CA','USA','92808-3232'),
('101','Daisy','Duck','1180 Seven Seas Dr.','Lake Buena Vista','FL','USA','32830'),
('102','Mickey','Mouse','1313 S.Harbor Blvd.','Anaheim','CA','USA','92808-3232'),
('103','Pluto','Dog','1313 S.Harbor Blvd.','Anaheim','CA','USA','92808-3232'),
('104','Scrooge','McDuck','1180 Seven Seas Dr.','Lake Buena Vista','FL','USA','32830'),
('105','Hueber (Huey)','Duck','1110 Seven Seas Dr.','Lake Buena Vista','FL','USA','32830'),
('106','Deuteronomony (Dewey)','Duck','1110 Seven Seas Dr.','Lake Buena Vista','FL','USA','32830'),
('107','Louie','Duck','1110 Seven Seas Dr.','Lake Buena Vista','FL','USA','32830'),
('108','Phooey','Duck','I-1 Maihama Urayasu.','Chiba Prefecture','Disney Tokyo','Japan', NULL),
('109','Della','Duck','77700 Boulevard du Parc.','Coupvray','Disney Paris','France', NULL);

INSERT INTO Statistics VALUES
('17','100','35','12','47','11','21'),
('18','102','13','22','13','1','3'),
('19','103','10','0','18','2','4'),
('20','107','2','45','9','1','2'),
('21','102','15','39','26','3','7'),
('22','100','29','47','27','9','8');

