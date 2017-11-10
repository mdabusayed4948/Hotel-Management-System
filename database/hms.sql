
drop table if exists b_role;

create table b_role(
id int(11) NOT NULL primary key auto_increment,
name varchar(45) NOT NULL
);

insert into b_role(name) values('admin');
insert into b_role(name) values('manager');
insert into b_role(name) values('general');

drop table if exists b_user;

create table b_user(
id int(11) NOT NULL primary key auto_increment,
username varchar(45) NOT NULL,
gender varchar(45)  NOT NULL,
password varchar(45) NOT NULL,
role_id int(11) NOT NULL,
contact_no varchar(45)  NOT NULL,
email varchar(45)  NOT NULL,
address varchar(45)  NOT NULL,
join_date date NOT NULL,
image varchar(45)

);

insert into b_user(username,gender,password,role_id,contact_no,email,address,join_date,image) values('sayed','Male',md5('sayed'),'1','01723054948','sayed@gmail.com','Dhaka','2015-12-20','img/user.png');
insert into b_user(username,gender,password,role_id,contact_no,email,address,join_date,image) values('kader','Male',md5('kader'),'2','01784736528','kader@gmail.com','Dkaha','2015-12-25','img/user1.png');
insert into b_user(username,gender,password,role_id,contact_no,email,address,join_date,image) values('hasan','Male',md5('hasan'),'3','01784736535','hasan@gmail.com','Dkaha','2015-12-15','img/user2.png');

drop table if exists b_employee;

create table b_employee(
id int(11) NOT NULL primary key auto_increment,
name varchar(45) NOT NULL,
f_name varchar(45) NOT NULL,
m_name varchar(45) NOT NULL,
gender varchar(45) NOT NULL,
contact_no varchar(15) NOT NULL,
email varchar(45) NOT NULL,
dob date NOT NULL,
designation_id int(11) NOT NULL,
present_address varchar(256) NOT NULL,
permanent_address varchar(356) NOT NULL,
join_date date,
image varchar(45) 

);

drop table if exists b_guest;

create table b_guest(
id int(11) NOT NULL Primary key auto_increment,
name varchar(45) NOT NULL,
gender varchar(45) NOT NULL,
email varchar(45) NOT NULL,
contact_no varchar(15) NOT NULL,
address varchar(45) NOT NULL,
status varchar(45)
);

drop table if exists b_room;

create table b_room(
id int(11) NOT NULL primary key auto_increment,
room_name varchar(45) NOT NULL,
room_no double,
room_type varchar(45) NOT NULL,
description text NOT NULL,
price double NOT NULL,
status varchar(45) NOT NULL,
image varchar(45) NOT NULL

);

drop table if exists b_income;

create table b_income(
id int(11) NOT NULL primary key auto_increment,
guest_id int(11) NOT NULL,
room_id int(11) NOT NULL,
food_id int(11) NOT NULL,
checkin_date date NOT NULL,
checkout_date date NOT NULL,
p_price double NOT NULL,
d_price double NOT NULL,
status varchar(45) NOT NULL,
fstatus varchar(45) NOT NULL
);

drop table if exists b_designation;

create table b_designation(
id int(11) NOT NULL primary key auto_increment,
name varchar(45) NOT NULL,
salary double NOT NULL
);



drop table if exists b_exp;

create table  b_exp(
id int(11) NOT NULL primary key auto_increment,
employee_id int(11) NOT NULL,
source_id int(11) NOT NULL,
billdate date NOT NULL,
paidamount double NOT NULL,
dueamount double NOT NULL,
status varchar(45) NOT NULL
);

drop table if exists b_food;

create table b_food(
id int(11) not null primary key auto_increment,
name varchar(45) NOT NULL,
description text NOT NULL,
price double NOT NULL
);

drop table if exists bf_source;

create table bf_source(
id int(10) NOT NULL primary key auto_increment,
name varchar(45) NOT NULL,
create_date date NOT NULL

);



