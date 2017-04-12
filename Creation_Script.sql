#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database:Web_Project
#------------------------------------------------------------

CREATE DATABASE Web_Project;
USE Web_Project;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        Id_User       int (11) Auto_increment  NOT NULL ,
        Avatar        Varchar (400) NOT NULL ,
        User_Name     Varchar (25) NOT NULL ,
        Surname       Varchar (25) NOT NULL ,
        Birth_date    Date NOT NULL ,
        Email         Varchar (100) NOT NULL ,
        User_Password Varchar (25) NOT NULL ,
        Studies       Varchar (50) NOT NULL ,
        User_Status   Varchar (25) NOT NULL ,
        PRIMARY KEY (Id_User )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Activity
#------------------------------------------------------------

CREATE TABLE Activity(
        Id_Activity            int (11) Auto_increment  NOT NULL ,
        Activity_Thumbnail     Varchar (400) NOT NULL ,
        Activity_Name          Varchar (25) NOT NULL ,
        Activity_Description   Varchar (400) NOT NULL ,
        Date_Event             datetime NOT NULL ,
        Activity_Place         Varchar (50) NOT NULL ,
        Votes                  Int ,
        Number_Of_Participants Int ,
        Remaining_Places       Int ,
        PRIMARY KEY (Id_Activity )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE Orders(
        Id_Order     int (11) Auto_increment  NOT NULL ,
        Date_Order   Date NOT NULL ,
        Total_Cost   Float NOT NULL ,
        Order_Status Varchar (25) NOT NULL ,
        Id_User      Int NOT NULL ,
        Id_Content   Int NOT NULL ,
        PRIMARY KEY (Id_Order )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Order_Content
#------------------------------------------------------------

CREATE TABLE Order_Content(
        Id_Content int (11) Auto_increment  NOT NULL ,
        Amount     Int NOT NULL ,
        PRIMARY KEY (Id_Content )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Goodie
#------------------------------------------------------------

CREATE TABLE Goodie(
        Id_Goodie          int (11) Auto_increment  NOT NULL ,
        Goodie_Thumbnail   Varchar (400) ,
        Goodie_Name        Varchar (25) NOT NULL ,
        Goodie_Description Varchar (1000) NOT NULL ,
        Price              Float NOT NULL ,
        Stock              Int ,
        Sales              Int ,
        PRIMARY KEY (Id_Goodie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photo
#------------------------------------------------------------

CREATE TABLE Photo(
        Id_Photo    int (11) Auto_increment  NOT NULL ,
        URL         Varchar (400) NOT NULL ,
        Likes       Int ,
        Id_Activity Int NOT NULL ,
        Id_User     Int NOT NULL ,
        PRIMARY KEY (Id_Photo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

CREATE TABLE Comment(
        Id_Comment int (11) Auto_increment  NOT NULL ,
        Content    Varchar (400) NOT NULL ,
        Id_User    Int NOT NULL ,
        Id_Photo   Int NOT NULL ,
        PRIMARY KEY (Id_Comment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PARTICIPATE
#------------------------------------------------------------

CREATE TABLE PARTICIPATE(
        Id_User     Int NOT NULL ,
        Id_Activity Int NOT NULL ,
        PRIMARY KEY (Id_User ,Id_Activity )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONTAIN
#------------------------------------------------------------

CREATE TABLE CONTAIN(
        Id_Content Int NOT NULL ,
        Id_Goodie  Int NOT NULL
)ENGINE=InnoDB;

ALTER TABLE Orders ADD CONSTRAINT FK_Orders_Id_User FOREIGN KEY (Id_User) REFERENCES Users(Id_User);
ALTER TABLE Orders ADD CONSTRAINT FK_Orders_Id_Content FOREIGN KEY (Id_Content) REFERENCES Order_Content(Id_Content);
ALTER TABLE Photo ADD CONSTRAINT FK_Photo_Id_Activity FOREIGN KEY (Id_Activity) REFERENCES Activity(Id_Activity);
ALTER TABLE Photo ADD CONSTRAINT FK_Photo_Id_User FOREIGN KEY (Id_User) REFERENCES Users(Id_User);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_Id_User FOREIGN KEY (Id_User) REFERENCES Users(Id_User);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_Id_Photo FOREIGN KEY (Id_Photo) REFERENCES Photo(Id_Photo);
ALTER TABLE PARTICIPATE ADD CONSTRAINT FK_PARTICIPATE_Id_User FOREIGN KEY (Id_User) REFERENCES Users(Id_User);
ALTER TABLE PARTICIPATE ADD CONSTRAINT FK_PARTICIPATE_Id_Activity FOREIGN KEY (Id_Activity) REFERENCES Activity(Id_Activity);
ALTER TABLE CONTAIN ADD CONSTRAINT FK_CONTAIN_Id_Content FOREIGN KEY (Id_Content) REFERENCES Order_Content(Id_Content);
ALTER TABLE CONTAIN ADD CONSTRAINT FK_CONTAIN_Id_Goodie FOREIGN KEY (Id_Goodie) REFERENCES Goodie(Id_Goodie);
