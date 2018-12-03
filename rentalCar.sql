DROP DATABASE IF EXISTS rentalCar;
CREATE DATABASE IF NOT EXISTS rentalCar;
USE rentalCar;

DROP TABLE IF EXISTS users,
                     customerInfo,
                     payment,
                     orders, 
                     carOrders, 
                     cars;

CREATE TABLE users (
    userName	varchar(50)   	NOT NULL,
    pass		varchar(50)		Not null,	
    PRIMARY KEY (userName)
);

CREATE TABLE customerInfo (
    userName	varchar(24)   	unique		NOT NULL,
    fName   	varchar(12) 	not null,
    lName		varchar(12) 	not null,
    birthDay	date			not null,
    foreign key (userName) references users (userName),
    PRIMARY KEY (userName)
    /*UNIQUE  KEY (dept_name)*/
);

CREATE TABLE payment (
   userName		varchar(24)   	unique	NOT NULL,
   cardType     varchar(10)     NOT NULL,
   cardNum    	BIGINT(16)         NOT NULL,
   expDate      DATE            NOT NULL,
   securityNum	int(4)			not null,
   foreign key (userName) references users (userName),
   PRIMARY KEY (cardNum)
); 

CREATE TABLE orders (
    orderId     INT(6)          NOT NULL,
    userName    varchar(24)     NOT NULL,
    dateOrd   	DATE            NOT NULL,
    PRIMARY KEY (orderId),
    foreign key (userName) references users (userName),
    foreign key (userName) references customerInfo (userName)
);

CREATE TABLE cars (
    vinNum      varchar(16)     NOT NULL,
    carType     varchar(12)     NOT NULL,
    color		varchar(16) 	not null,
    yearMake 	int(4) 		 	not null,
    manufactor	varchar(12)		not null,
    primary key (vinNum)
) 
; 

CREATE TABLE carOrders (
    orderId     INT(6)          NOT NULL,
    vinNum      varchar(16)     NOT NULL,
    FOREIGN KEY (vinNum) REFERENCES cars (vinNum),
    foreign key (orderId) references orders(orderId)
) 
; 

/*users table*/
insert into  users value("trancongvuit@gmail.com","trancongvuit123");
insert into  users value("vincenttran@gmail.com","trancongvuit123");
insert into  users value("rintran@gmail.com","trancongvuit123");
insert into  users value("jacktran@gmail.com","trancongvuit123");
insert into  users value("haodo@gmail.com","trancongvuit123");
insert into  users value("hiepdo@gmail.com","trancongvuit123");
insert into  users value("anhpham@gmail.com","trancongvuit123");

/*customerInfo*/
insert into  customerInfo value("trancongvuit@gmail.com","vu","tran","1994-01-26");
insert into  customerInfo value("vincenttran@gmail.com","vincent","tran","1994-01-26");
insert into  customerInfo value("rintran@gmail.com","rin","tran","1994-01-26");
insert into  customerInfo value("jacktran@gmail.com","jack","tran","1991-09-07");
insert into  customerInfo value("haodo@gmail.com","hao","do","1995-05-23");
insert into  customerInfo value("hiepdo@gmail.com","hiep","do","1993-01-26");
insert into  customerInfo value("anhpham@gmail.com","anh","pham","1995-01-26");

/*payment*/
insert into  payment value("trancongvuit@gmail.com","VISA",1234567891011111,"2018-01-26",3456);
insert into  payment value("vincenttran@gmail.com","MASTER",1267567891011111,"2020-01-26",1234);
insert into  payment value("rintran@gmail.com","VISA",1234567491011111,"2025-01-26",2345);
insert into  payment value("jacktran@gmail.com","VISA",1220567891011111,"2024-09-07",3456);
insert into  payment value("haodo@gmail.com","MASTER",1237867891011111,"2030-05-23",4567);
insert into  payment value("hiepdo@gmail.com","VISA",1584567891011111,"2050-01-26",5678);
insert into  payment value("anhpham@gmail.com","MASTER",1236867891011111,"2017-01-26",6789);

/*orders*/
insert into  orders value(123456,"trancongvuit@gmail.com","2018-01-26");
insert into  orders value(123457,"vincenttran@gmail.com","2018-01-26");
insert into  orders value(123458,"rintran@gmail.com","2018-01-26");
insert into  orders value(123459,"jacktran@gmail.com","2018-09-07");
insert into  orders value(123460,"haodo@gmail.com","2018-05-23");
insert into  orders value(123461,"hiepdo@gmail.com","2018-01-26");
insert into  orders value(123462,"anhpham@gmail.com","2018-01-26");

/*cars*/
insert into  cars value("123456789","sedan","red","2018","toyota");
insert into  cars value("12345789","suv","black","2018","ford");
insert into  cars value("12345889","truck","green","2018","toyota");
insert into  cars value("12345989","sport","blue","2018","cheverot");
insert into  cars value("12346089","truck","white","2018","lexus");
insert into  cars value("12346189","suv","black","2018","honda");
insert into  cars value("12346289","sedan","red","2018","nissan");

/*carOrders*/
insert into carOrders value(123456,"12346289");
insert into carOrders value(123461,"123456789");
insert into carOrders value(123460,"12345789");
insert into carOrders value(123456,"12346089");
insert into carOrders value(123459,"12346289");
insert into carOrders value(123462,"123456789");
insert into carOrders value(123457,"12346289");
insert into carOrders value(123462,"12346189");
insert into carOrders value(123458,"12345889");
insert into carOrders value(123457,"12346189");
