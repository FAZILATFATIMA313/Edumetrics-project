show databases;
create database adminpage;
use adminpage;
create table search_student(
studentid varchar(7),
fullname char(30) );
use adminpage;
create table search_by_sem(
semester varchar(10),
branch char(50),
rollno varchar(7) );
