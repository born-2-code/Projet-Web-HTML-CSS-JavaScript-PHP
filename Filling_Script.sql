#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database:Web_Project
#------------------------------------------------------------

USE Web_Project;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

INSERT INTO `users` (`Id_User`, `Avatar`, `User_Name`, `Surname`, `Birth_date`, `Email`, `User_Password`, `Studies`, `User_Status`) VALUES (NULL, 'images/avatar/nathanaelanstett.jpg', 'Nathanael', 'Anstett', '1998-01-13', 'synologym9@gmail.com', 'admin', 'Exia Cesi Orleans', 'Etudiant'), (NULL, 'images/avatar/ErwanPlessis.jpg', 'Erwan', 'Plessis', '1991-03-17', 'erwan.plessis@viacesi.fr', 'admin', 'Exia Cesi Orleans', 'Etudiant'), (NULL, 'images/avatar/BenoitBaschou.jpg', 'Benoit', 'Baschou', '1994-11-21', 'benoit.baschou@viacesi.fr', 'admin', 'Exia Cesi Orleans', 'Etudiant'), (NULL, 'images/avatar/StephanieTellier.jpg', 'Stephanie', 'Tellier', '1990-07-21', 's.tellier@cesi.fr', 'admin', 'CESI', 'Equipe CESI'), (NULL, 'images/avatar/NicolasTruc.jpg', 'Nicolas', 'Truc', '1992-06-24', 'nicolas.truc@viacesi.fr', 'admin', 'RH', 'Etudiant');



#------------------------------------------------------------
# Table: Activity
#------------------------------------------------------------

INSERT INTO `activity` (`Id_Activity`, `Activity_Thumbnail`, `Activity_Name`, `Activity_Description`, `Date_Event`, `Activity_Place`, `Votes`, `Number_Of_Participants`, `Remaining_Places`, `Activity_Price`) VALUES (NULL, 'images/activity/thumbnail/bowling.jpg', 'Bowling', 'Bowling entre collègues', '2017-04-20 19:00:00', '2 Rue Moreau, 45100 Orléans', '2', '2', '8', '5'), (NULL, 'images/activity/thumbnail/Basket.jpg', 'Basket', 'Basket entre collègues', '2017-04-20 19:00:00', '2 Rue Kapfer, 45100 Orléans', '10', '10', '0', '0'), (NULL, 'images/activity/thumbnail/Foot.jpg', 'Foot', 'Foot entre collègues', '2017-04-20 14:00:00', 'Stade Yvremont, 45160 Olivet', '8', '8', '14', '0'), (NULL, 'images/activity/thumbnail/lasergame.jpg', 'Lasergame', 'Lasergame entre collègues', '2017-04-17 14:00:00', '2 Rue Pelaud, 45100 Orléans', '1', '1', '9', '10');





#------------------------------------------------------------
# Table: Order_Content
#------------------------------------------------------------

INSERT INTO `order_content` (`Id_Content`, `Amount`) VALUES (NULL, '3');




#------------------------------------------------------------
# Table: Goodie
#------------------------------------------------------------


INSERT INTO `goodie` (`Id_Goodie`, `Goodie_Thumbnail`, `Goodie_Name`, `Goodie_Description`, `Price`, `Stock`, `Sales`) VALUES (NULL, 'images/goodie/mugexia.jpg', 'Mug EXIA', 'Un Mug pour exprimer votre amour pour votre formation EXIA', '29.99', '97', '3'), (NULL, 'images/goodie/mugrh.jpg', 'Mug RH', 'Un Mug pour exprimer votre amour pour votre formation RH', '29.99', '99', '1'), (NULL, 'images/goodie/SweatBDE.jpg', 'Sweat EXIA', 'Un Sweat pour exprimer votre amour pour votre BDE', '49.99', '91', '9');



#------------------------------------------------------------
# Table: Photo
#------------------------------------------------------------


INSERT INTO `photo` (`Id_Photo`, `URL`, `Likes`, `Id_Activity`, `Id_User`) VALUES (NULL, 'images/activity/bowling1.jpg', '1248', '1', '1'), (NULL, 'images/activity/bowling2.jpg', '2', '1', '2');


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

INSERT INTO `comment` (`Id_Comment`, `Content`, `Id_User`, `Id_Photo`) VALUES (NULL, 'Trop beau Erwan <3<3', '1', '2');


#------------------------------------------------------------
# Table: PARTICIPATE
#------------------------------------------------------------

INSERT INTO `participate` (`Id_User`, `Id_Activity`) VALUES ('1', '1'), ('2', '1');


#------------------------------------------------------------
# Table: CONTAIN
#------------------------------------------------------------

INSERT INTO `contain` (`Id_Content`, `Id_Goodie`) VALUES ('1', '1'), ('1', '1'), ('1', '1');


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

INSERT INTO `orders` (`Id_Order`, `Date_Order`, `Total_Cost`, `Order_Status`, `Id_User`, `Id_Content`) VALUES (NULL, '2017-04-12', '89.87', 'Sent', '2', '1');



