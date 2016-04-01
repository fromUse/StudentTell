
CREATE  DATABASE software_1 CHARACTER_SET_NAME utf8;


CREATE TABLE stu_info (
  ID VARCHAR (10) PRIMARY KEY,
  Name VARCHAR (10) NOT NULL,
  Sex CHAR (2) DEFAULT '男',
  QQ VARCHAR (15),
  Tell VARCHAR (11),
  Major VARCHAR (20),
  Class VARCHAR (20)
);


