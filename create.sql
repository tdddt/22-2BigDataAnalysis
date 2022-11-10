use team09;

create table patient (   
    암환자아이디 int not null,
    진단연령 int,
    음주종류 int,
    흡연여부 int,
    키 float,
    몸무게 float,
    사망여부 int,
    암진단후생존일 int,
    암종류 varchar(30),
    primary key(암환자아이디)
);

create table user (
    회원아이디 int not null, 
    이름 varchar(25) not null,
    아이디 varchar(25) not null,
    비밀번호 varchar(25) not null,
    이메일 varchar(30) not null,
    primary key(회원아이디)
);

#CREATE INDEX 회원인덱스 ON user(회원아이디);

create table userinfo (
    회원아이디 int, 
    나이 int,
    성별 varchar(10),
    음주종류 int,
    흡연여부 int,
    키 int,
    몸무게 int,
    지역 varchar(20),
    primary key(회원아이디),
    foreign key(회원아이디) references user(회원아이디)
);

#CREATE INDEX 회원정보인덱스 ON userinfo(회원아이디);

/*암환자 insert*/
load data local infile 'C:\\xampp\\htdocs\\team09\\patient.csv' into table patient fields terminated by ',' lines terminated by '\n';

/*회원 insert (회원아이디,이름,아이디,비밀번호,이메일)*/
insert into user values (1,'Jake','jake1225','jakee1225','jake1225@gamil.com'),
    (2,'Amy','ammma','amy111','amyma111@gamil.com'),
    (3,'Lucia','luca_cia','lluucciiaa321','lluu123@gmail.com'),
    (4,'Robert','robotlover','revoltobor','robertrebor@gmail.com'),
    (5,'Joshua','shuu10','shuajo1111','joshuauu22@gmail.com'),
    (6,'Aaron','inthemountain','aaronmoun4','inthemountain@gmail.com'),
    (7,'Mary','marychrist','christ43','marymart1225@gmail.com'),
    (8,'Linda','dadas2','linlins2','dalins2@gmail.com'),
    (9,'Olivia','olive202','olivia2o2','olive2o2@gmail.com'),
    (10,'Sally','sallaa','sa54321','sally54321@gmail.com'),
    (11,'Ines','mivida','ines327','ines327@gmail.com'),
    (12,'Isabella','issac11','isabellaa415','isa_0_0@gmail.com'),
    (13,'Liam','li010203','liamail123','liamail123@gmail.com'),
    (14,'Mason','miro55','masonpw','mamamia@gmail.com'),
    (15,'Michael','angel3_3','michael44','angel3_3@gmail.com'),
    (16,'Remi','qwer1234','1234qwer','qqwweerr@gmail.com'),
    (17,'Rowan','rowwanx0x','pwpwpwpw','rowanawor17@gmail.com'),
    (18,'Kai','googling22','kai26kai','kai26@gmail.com'),
    (19,'Andrea','andrrew','notandrrew00','andrea00@gmail.com'),
    (20,'Logan','lloll_logan','lloll0ll','lloll0ll@gmal.com');

/*회원정보 insert (회원아이디,나이,성별,음주종류,흡연여부,키,몸무게,지역)*/
insert into userinfo values (5,18,'male',0,0,182.1,83,'동대문구'),
    (17,20,'female',0,0,168.5,65.2,'강서구'),
    (7,22,'female',1,0,155.4,55,'송파구'),
    (2,24,'female',0,1,172.8,72.5,'중구'),
    (10,28,'female',1,0,188.6,85.7,'은평구'),
    (14,28,'male',2,1,179.4,77.7,'노원구'),
    (3,33,'female',0,0,164.2,60.1,'서대문구'),
    (18,35,'male',99,1,162.8,60.6,'서대문구'),
    (15,38,'male',0,1,177.5,64.8,'강남구'),
    (11,39,'female',99,0,167.3,62.4,'강남구'),
    (12,41,'female',0,1,158.7,50.9,'은평구'),
    (13,44,'male',2,0,157.2,52.7,'영등포구'),
    (4,46,'male',1,1,182.4,76.3,'강동구'),
    (19,51,'female',2,0,162.5,65.1,'관악구'),
    (1,52,'male',1,1,164.3,68.7,'동작구'),
    (9,55,'female',0,1,156.4,51.6,'용산구'),
    (16,56,'male',99,0,154.8,53.2,'마포구'),
    (8,61,'female',1,0,153.9,46.6,'금천구'),
    (6,62,'male',2,1,172.5,65.1,'도봉구'),
    (20,67,'male',2,0,182.1,74.9,'구로구');
