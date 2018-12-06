DROP DATABASE IF EXISTS rentalCar;
CREATE DATABASE IF NOT EXISTS rentalCar;
USE rentalCar;

DROP TABLE IF EXISTS users,
                     customerInfo,
                     payment,
                     orders, 
                     carOrders, 
                     cars,
                     parking,
                     parkingOrders;

CREATE TABLE users (
	userId		int(2)			NOT NULL AUTO_INCREMENT,
    userName	varchar(50)   	unique	not null,
    pass		varchar(50)		Not null,	
    PRIMARY KEY (userId)
);

CREATE TABLE customerInfo (
	userId		int(2)			unique NOT NULL AUTO_INCREMENT,
    fName   	varchar(12) 	not null,
    lName		varchar(12) 	not null,
    birthDay	date			not null,
    foreign key (userId) references users (userId),
    PRIMARY KEY (userId)
    /*UNIQUE  KEY (dept_name)*/
);

CREATE TABLE payment (
   userId		int(2)   		NOT NULL,
   cardType     varchar(20)     NOT NULL,
   cardNum    	BIGINT(16)      unique	NOT NULL,
   expDate      DATE            NOT NULL,
   securityNum	int(4)			not null,
   foreign key (userId) references users (userId),
   PRIMARY KEY (cardNum)
); 

CREATE TABLE orders (
    orderId     INT(6)          NOT NULL,
    userId      INT(2)     		NOT NULL,
    dateOrd   	DATE            NOT NULL,
    PRIMARY KEY (orderId),
    foreign key (userId) references users (userId)
    /*
    foreign key (userId) references customerInfo (userId)
    */
);

CREATE TABLE cars (
    vinNum      varchar(16)     NOT NULL,
    carType     varchar(12)     NOT NULL,
    color		varchar(16) 	not null,
    yearMake 	int(4) 		 	not null,
    manufactor	varchar(12)		not null,
    carPic 		longtext 		not null,
    carPrice 	float 			not null,
    primary key (vinNum)
); 

CREATE TABLE carOrders (
    orderId     	INT(6)          NOT NULL,
    vinNum      	varchar(16)     NOT NULL,
    timeOrder 		date		 	not null,
    duration		int(3)			not null, /*number of days*/
    FOREIGN KEY (vinNum) REFERENCES cars (vinNum),
    foreign key (orderId) references orders(orderId)
); 

/*time stampe will be count as daily reserver parking*/
CREATE TABLE parking (
    parkId      	INT(6)     		NOT NULL,
    isAvailable     boolean     	NOT NULL,
    price			float 			not null,/*prices count as daily*/
    location 		longtext		not null,
    primary key (parkId)
); 

CREATE TABLE parkingOrders (
    orderId     	INT(6)      NOT NULL,
    parkId      	INT(6)     	NOT NULL,
    timeOrder 		date		not null,
    duration		INT(3)		not null, /*number of days*/
    FOREIGN KEY (parkId) REFERENCES parking (parkId),
    foreign key (orderId) references orders(orderId)
);

/*users table*/
insert ignore into  users value(null,"trancongvuit@gmail.com","trancongvuit123");
insert ignore into  users value(null,"vincenttran@gmail.com","trancongvuit123");
insert ignore into  users value(null,"rintran@gmail.com","trancongvuit123");
insert ignore into  users value(null,"jacktran@gmail.com","trancongvuit123");
insert ignore into  users value(null,"haodo@gmail.com","trancongvuit123");
insert ignore into  users value(null,"hiepdo@gmail.com","trancongvuit123");
insert ignore into  users value(null,"anhpham@gmail.com","trancongvuit123");

/*customerInfo*/
insert ignore into  customerInfo value(null,"vu","tran","1994-01-26");
insert ignore into  customerInfo value(null,"vincent","tran","1994-01-26");
insert ignore into  customerInfo value(null,"rin","tran","1994-01-26");
insert ignore into  customerInfo value(null,"jack","tran","1991-09-07");
insert ignore into  customerInfo value(null,"hao","do","1995-05-23");
insert ignore into  customerInfo value(null,"hiep","do","1993-01-26");
insert ignore into  customerInfo value(null,"anh","pham","1995-01-26");

/*payment*/
insert ignore into  payment value(1,"VISA",1234567891011111,"2018-01-26",3456);
insert ignore into  payment value(3,"MASTER",1267567891011111,"2020-01-26",1234);
insert ignore into  payment value(7,"VISA",1234567491011111,"2025-01-26",2345);
insert ignore into  payment value(6,"AmericanExpress",1220567891011111,"2024-09-07",3456);
insert ignore into  payment value(4,"Discover",1237867891011111,"2030-05-23",4567);
insert ignore into  payment value(5,"VISA",1584567891011111,"2050-01-26",5678);
insert ignore into  payment value(2,"MASTER",1236867891011111,"2017-01-26",6789);

/*orders*/
insert ignore into  orders value(123456,3,"2018-10-21");
insert ignore into  orders value(123457,2,"2018-08-06");
insert ignore into  orders value(123458,6,"2018-07-16");
insert ignore into  orders value(123459,4,"2018-11-17");
insert ignore into  orders value(123460,7,"2018-08-03");
insert ignore into  orders value(123461,1,"2018-12-02");
insert ignore into  orders value(123462,5,"2018-05-06");

/*cars*/
insert ignore into  cars value("123456789","sedan","red",2018,"toyota","pics/toyota_sedan.png", 99.99);
insert ignore into  cars value("12345789","suv","black",2018,"ford","pics/ford_suv.png", 119.99);
insert ignore into  cars value("12345889","truck","green",2018,"toyota","pics/toyota_trucks.png", 129.99);
insert ignore into  cars value("12345989","sport","blue",2018,"cheverot","pics/chevrolet_sport.png", 139.00);
insert ignore into  cars value("12346089","truck","white",2018,"lexus", "pics/lexus_truck.png", 149.99);
insert ignore into  cars value("12346189","suv","black",2018,"honda", "pics/honda_suv.png", 119.99);
insert ignore into  cars value("12346289","sedan","red",2018,"nissan", "pics/nissian_sedan.png", 99.99);

/*carOrders*/
insert ignore into carOrders value(123456,"12346289","2018-09-20",7);
insert ignore into carOrders value(123461,"123456789","2018-08-06",2);
insert ignore into carOrders value(123460,"12345789","2018-04-01",3);
insert ignore into carOrders value(123456,"12346089","2018-05-15",4);
insert ignore into carOrders value(123459,"12346289","2018-07-17",6);
insert ignore into carOrders value(123462,"123456789","2018-09-21",1);
insert ignore into carOrders value(123457,"12346289","2018-09-23",3);
insert ignore into carOrders value(123462,"12346189","2018-10-25",4);
insert ignore into carOrders value(123458,"12345889","2018-11-23",5);
insert ignore into carOrders value(123457,"12346189","2018-12-21",6);

/*disable foregin key check fo*/
SET FOREIGN_KEY_CHECKS=0;
/*parkingOrders*/
insert ignore into parkingOrders value(123456,234567,"2018-09-20",1);
insert ignore into parkingOrders value(123461,234568,"2018-08-06",3);
insert ignore into parkingOrders value(123460,234569,"2018-10-01",5);
insert ignore into parkingOrders value(123456,234570,"2018-07-17",7);
insert ignore into parkingOrders value(123459,234571,"2018-11-21",2);
insert ignore into parkingOrders value(123462,234572,"2018-12-26",9);
insert ignore into parkingOrders value(123457,234573,"2018-09-19",10);
insert ignore into parkingOrders value(123462,234574,"2018-08-25",23);
insert ignore into parkingOrders value(123458,234575,"2018-07-23",5);
insert ignore into parkingOrders value(123457,234576,"2018-10-21",11);
SET FOREIGN_KEY_CHECKS=1;
/*parking*/
insert ignore into parking value(234567,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234568,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234569,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234570,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234571,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234572,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234573,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234574,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234575,true,5.99,"ATL Hartsfield-Jackson");
insert ignore into parking value(234576,true,5.99,"ATL Hartsfield-Jackson");

/*
	orderId     	INT(6)      NOT NULL,
    parkId      	INT(6)     	NOT NULL,
    timeOrder 		date		not null,
    duration		INT(3)		not null,

parkId      	INT(6)     		NOT NULL,
    isAvailable     boolean     	NOT NULL,
    price			float 			not null,prices count as daily
    location 		varchar(10)		not null,*/


















