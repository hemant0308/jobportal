CREATE DATABASE IF NOT EXISTS JobPortal;
USE JobPortal;
CREATE TABLE IF NOT EXISTS Seeker(SeekerUserName VARCHAR(30) NOT NULL,Name VARCHAR(30) NOT NULL,Email VARCHAR(30) NOT NULL,Password VARCHAR(30) NOT NULL,Phone VARCHAR(20) NOT NULL,Resume VARCHAR(100) NOT NULL,Primary key (SeekerUserName));
CREATE TABLE IF NOT EXISTS Hiree(HireeUserName VARCHAR(30) NOT NULL,Name VARCHAR(30) NOT NULL,Email VARCHAR(30) NOT NULL,Password VARCHAR(30) NOT NULL,Phone VARCHAR(20) NOT NULL,Company VARCHAR(30) NOT NULL,Description VARCHAR(200) NOT NULL,Website VARCHAR(30), Primary Key(HireeUserName));
CREATE TABLE IF NOT EXISTS Jobs(JobId VARCHAR(20) NOT NULL,JobHeader VARCHAR(20),JobDescription VARCHAR(200),HireeUserName VARCHAR(30),Primary Key (JobId),Foreign Key (HireeUserName) REFERENCES Hiree(HireeUserName) ON DELETE CASCADE);
CREATE TABLE IF NOT EXISTS SeekerJobs(SeekerUserName VARCHAR(20),JobId VARCHAR(20),Primary Key (JobId,SeekerUserName),Foreign Key (JobId) REFERENCES Jobs(JobId) ON DELETE CASCADE,Foreign Key (SeekerUserName) REFERENCES Seeker(SeekerUserName) ON DELETE CASCADE);
