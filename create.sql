use team09;

create table patient (   
    patientId int not null,
    age int,
    drink int,
    smoke int,
    height float,
    Pweight float,
    death int,
    survivaldays int,
    cancertype varchar(30),
    primary key(patientId)
);

create table userlog (
    userId int not null auto_increment, 
    userName varchar(25) not null,
    id varchar(25) not null,
    pw varchar(25) not null,
    email varchar(30) not null,
    primary key(userId)
);

CREATE INDEX userindex ON userlog(userId);

/*userId, age,sex,drink,smoke,height,Uweight,Ulocation*/
create table userinfo (
    userId int, 
    age int,
    sex varchar(10),
    drink int,
    smoke int,
    height int,
    Uweight int,
    Ulocation varchar(20),
    primary key(userId),
    foreign key(userId) references userlog(userId) ON DELETE CASCADE
);

CREATE INDEX userId ON userinfo(userId);

create table hospitalinfo(
    hospital_name varchar(20) not null,
    location varchar(20),
    location_detail varchar(20),
    number varchar(20),
    site varchar(9999),
    primary key(hospital_name)
);

create table doctorinfo (
    doctor_ID int not null,
    doctor_name varchar(5),
    hospital varchar(20),
    department varchar(20),
    field varchar(50),
    site varchar(9999),
    primary key(doctor_ID),
    foreign key(hospital) references hospitalinfo(hospital_name) ON DELETE CASCADE
);

create table hospitalComment (
    commentId int not null auto_increment,
    userId int not null,
    hospital_name varchar(20),
    comment varchar(100),
    primary key(commentId),
    foreign key(userId) references userlog(userId) ON DELETE CASCADE,
    foreign key(hospital_name) references hospitalinfo(hospital_name) ON DELETE CASCADE
);

CREATE INDEX hospital_name ON hospitalComment(hospital_name);

create table doctorComment(
    commentId int not null auto_increment,
    userId int not null,
    doctor_ID int not null,
    comment varchar(100),
    primary key(commentId),
    foreign key(userId) references userlog(userId) ON DELETE CASCADE,
    foreign key(doctor_ID) references doctorinfo(doctor_ID) ON DELETE CASCADE
);

CREATE INDEX doctor_ID ON doctorComment(doctor_ID);

/*?????? ?????? ?????? ?????????*/
CREATE TABLE checkResult(
  USER_ID INT(11) NOT NULL,
  ????????? VARCHAR(30),
  ???????????? TEXT,
  count INT(11),
  /*primary key(USER_ID),*/
  foreign key(USER_ID) references userlog(userId) ON DELETE CASCADE
);

/*?????? https://post.naver.com/viewer/postView.nhn?volumeNo=28534977&memberNo=10551594*/
CREATE TABLE ?????????????????????(
  id INT(11) NOT NULL,
  question TEXT NOT NULL
);

/*??????  http://anam.kumc.or.kr/info/self_diagnosis_reg_09.jsp?ST_NO=9&cPage=2&SEARCH_DS_CODE=Y&SEARCH_BNO=500&SEARCH_BOARD_ID=S001*/
CREATE TABLE ?????????????????????(
  id INT(11) NOT NULL,
  question TEXT NOT NULL
);

/*????????? https://all-review-story.tistory.com/entry/%EB%8C%80%EC%9E%A5%EC%95%94-%EC%9E%90%EA%B0%80-%EC%A7%84%EB%8B%A8-%EC%B2%B4%ED%81%AC-%EB%A6%AC%EC%8A%A4%ED%8A%B8-5%EA%B0%9C-%EC%9D%B4%EC%83%81-%EB%90%9C%EB%8B%A4%EB%A9%B4-%EB%AC%B4%EC%A1%B0%EA%B1%B4-%EB%8C%80%EC%9E%A5-%EB%82%B4%EC%8B%9C%EA%B2%BD-%EA%B2%80%EC%82%AC%EB%A5%BC-%EB%B0%9B%EC%95%84%EC%95%BC*/
CREATE TABLE ????????????????????????(
  id INT(11) NOT NULL,
  question TEXT NOT NULL
);

/*?????? https://www.healthinnews.co.kr/news/articleView.html?idxno=25116*/
CREATE TABLE ?????????????????????(
  id INT(11) NOT NULL,
  question TEXT NOT NULL
);

create table cancerinfo(
    cancertype varchar(30) not null,
    Cdefinition text not null,
    cause text not null,
    symptom text not null,
    diagnosis text not null,
    cure text not null,
    progress text not null,
    complication text not null,
    prevention text not null,
    department varchar(100) not null,
    primary key(cancertype)
);

create table cancerComment(
    commentId int not null auto_increment,
    userId int not null,
    cancertype varchar(30) not null,
    comment varchar(100),
    primary key(commentId),
    foreign key(userId) references userlog(userId) ON DELETE CASCADE,
    foreign key(cancertype) references cancerinfo(cancertype) ON DELETE CASCADE
);

CREATE INDEX cancertype ON cancerComment(cancertype);