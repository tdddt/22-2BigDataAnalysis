use team09;

create table hospitalinfo(
    hospital_name varchar(20) not null,
    location varchar(20),
    location_detail varchar(20),
    number varchar(20),
    site varchar(9999),
    primary key(hospital_name)
);

create table doctorinfo (
    doctor_name varchar(5) not null,
    hospital varchar(20),
    department varchar(20),
    field varchar(50),
    site varchar(9999),
    primary key(doctor_name),
    foreign key(hospital) references hospitalinfo(hospital_name)
);

