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
    foreign key (userId) references users (userId),
    foreign key (userId) references customerInfo (userId)
);

CREATE TABLE cars (
    vinNum      varchar(16)     NOT NULL,
    carType     varchar(12)     NOT NULL,
    color		varchar(16) 	not null,
    yearMake 	int(4) 		 	not null,
    manufactor	varchar(12)		not null,
    carPic longtext not null,
    carPrice float not null,
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
insert into  users value(null,"trancongvuit@gmail.com","trancongvuit123");
insert into  users value(null,"vincenttran@gmail.com","trancongvuit123");
insert into  users value(null,"rintran@gmail.com","trancongvuit123");
insert into  users value(null,"jacktran@gmail.com","trancongvuit123");
insert into  users value(null,"haodo@gmail.com","trancongvuit123");
insert into  users value(null,"hiepdo@gmail.com","trancongvuit123");
insert into  users value(null,"anhpham@gmail.com","trancongvuit123");

/*customerInfo*/
insert into  customerInfo value(null,"vu","tran","1994-01-26");
insert into  customerInfo value(null,"vincent","tran","1994-01-26");
insert into  customerInfo value(null,"rin","tran","1994-01-26");
insert into  customerInfo value(null,"jack","tran","1991-09-07");
insert into  customerInfo value(null,"hao","do","1995-05-23");
insert into  customerInfo value(null,"hiep","do","1993-01-26");
insert into  customerInfo value(null,"anh","pham","1995-01-26");

/*payment*/
insert into  payment value(1,"VISA",1234567891011111,"2018-01-26",3456);
insert into  payment value(3,"MASTER",1267567891011111,"2020-01-26",1234);
insert into  payment value(7,"VISA",1234567491011111,"2025-01-26",2345);
insert into  payment value(6,"AmericanExpress",1220567891011111,"2024-09-07",3456);
insert into  payment value(4,"Discover",1237867891011111,"2030-05-23",4567);
insert into  payment value(5,"VISA",1584567891011111,"2050-01-26",5678);
insert into  payment value(2,"MASTER",1236867891011111,"2017-01-26",6789);

/*orders*/
insert into  orders value(123456,3,"2018-01-26");
insert into  orders value(123457,2,"2018-01-26");
insert into  orders value(123458,6,"2018-01-26");
insert into  orders value(123459,4,"2018-09-07");
insert into  orders value(123460,7,"2018-05-23");
insert into  orders value(123461,1,"2018-01-26");
insert into  orders value(123462,5,"2018-01-26");

/*cars*/
insert into  cars value("123456789","sedan","red",2018,"toyota","pics/toyota_sedan.png", 99.99);
insert into  cars value("12345789","suv","black",2018,"ford","pics/ford_suv.png", 119.99);
insert into  cars value("12345889","truck","green",2018,"toyota","pics/toyota_trucks.png", 129.99);
insert into  cars value("12345989","sport","blue",2018,"cheverot","pics/chevrolet_sport.png", 139.00);
insert into  cars value("12346089","truck","white",2018,"lexus", "pics/lexus_truck.png", 149.99);
insert into  cars value("12346189","suv","black",2018,"honda", "pics/honda_suv.png", 119.99);
insert into  cars value("12346289","sedan","red",2018,"nissan", "pics/nissian_sedan.png", 99.99);


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
