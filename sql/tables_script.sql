create table category (
	code Int NOT NULL AUTO_INCREMENT,
	name char(50) ,
	description varchar(200) ,
	image_url text ,
	Primary Key (code)) ENGINE = InnoDB;
INSERT INTO `category` VALUES (21,'Competitions','Competitions','img/categories/132613904756a52ef9a9b2ecompetition.jpg'),(22,'Ideate','Ideate','img/categories/8232245456a53e6545370dexter4.jpg'),(23,'Fun Events','Fun Events','img/categories/119267159456a54732976a3mario-wallpaper-wonderful.jpg');
create table event (
	code Int NOT NULL AUTO_INCREMENT,
	name char(100) ,
	introduction text ,
	description text ,
	coordinator_details text,
	team_description text,
	category_code Int ,
	image_url text,
	instructions_document text,
	Primary Key (code)) ENGINE = InnoDB;
INSERT INTO `event` VALUES (7,'Aqua War','This event gives you an opportunity to participate in a battle of two-Sailing Boats and to test your creativity. Time has come to boost up your creativity to a different level.','Build a robot which can sail on water, push balls into a specified place in arena FASTER THAN YOUR OPPONENTâ€™S.','NAVEEN RAI - 8602329982<br> SHUBHAM MALVIYA - 9479435156<br> ABHAY KUMAR RAHANGDALE - 9179689714','A team can consist of maximum 4 members;(Members of different institutions can also form a team.)',21,'img/albums/event_images/122833786656a530ad6698fAqua War.jpg','img/albums/event_images/124490945856a530ad66a18Aqua WAR final.pdf'),(8,'Auto Quiz','MTM Auto Quiz is a step towards inculcating this passion for auto that recognizes and develops young talent in the auto field','Each candidate will be provided with a question set containing 75 questions consisting of multiple choices (MCQs). Each question will carry 1 mark each.','AMIT MAKIJA - 9584097862<br> KUMAR NIKHIL - 8602750226<br> HIMANSHU VISHWAKARMA - 9826567439','Individual Participation',21,'img/albums/event_images/174705355956a5339c99d5fautoquiz.jpg','img/albums/event_images/26712904056a5339c99db8AUTO QUIZ final.pdf'),(9,'Bottle Rocket','Bottle rocket is a dynamic event in which the pressurized air-water mixture carried by the bottle will take it to sky.','To design a rocket carrying a bottle, partially filled with water will act as a fuel tank. Air-water need to be pressurized in manner to provide thrust for the rocket to move maximum horizontal distance.','NAVEEN RAI - 8602329982<br> SHANTAM KANUNGO - 9407462235<br> SHUBHAM MALVIYA - 9479435156','A team can have maximum of 3 members.<br> Students from different semesters, branches and college may participate together as a team.',21,'img/albums/event_images/57239403356a53682272c7maxresdefault.jpg','img/albums/event_images/61734650156a5368227317BOTTLE ROCKET final.pdf'),(10,'Bridging','test your ability to design and construct the most efficient bridge within the given specifications. Your model bridges are intended to be simplified versions of their real world counterparts.','Test your ability to design and construct the most efficient bridge within the given specifications. Your model bridges are intended to be simplified versions of their real world counterparts.','Tarun Soni : 7566318611<br> Gopal Goyal : 9479681043<br> Prateek Soni: 8878747717','A team may consist of 4 members at max. Students from different educational institutions are allowed to form a team.',21,'img/albums/event_images/24491556356a5379cc1328bbc2.jpg','img/albums/event_images/38308729156a5379cc1379bridging final.pdf'),(11,'CAD-O-MANIAC','Solve the given problem statement using your creative design skills.','This event conducted in rounds of two, the first round tests basics of your Designing skills. In the next round shortlisted participants will be given a problem statement to show their expertise.','KONAL SHRIVASTAV - 8989542848<br> BHAVESH DAVE- 9755786054<br> SHIVANI THAPLOO - 9826156436<br> RISHABH PAGARIA- 9575989999<br>','Maximum of two members per team is allowed.<br> Team members can be from different institutions.',21,'img/albums/event_images/85136371656a539631242dcad-designer-for-post.jpg','img/albums/event_images/26798454456a539631246eCAD-O-MANIAC final.pdf'),(12,'Eraldus','Propose a unique insulating setup to minimize the heat transfer rate without using electricity in any form.','Propose a unique insulating setup to minimize the heat transfer rate without using electricity in any form.','Rushabh Ghate - 9074698191<br> Krati Maloo- 8109907695<br> Nitendra Kumar - 9039588523','Maximum two participants are allowed in a team.',21,'img/albums/event_images/148580565756a53b23dce7fIMG_0517.jpg','img/albums/event_images/193811895256a53b23dcecaERALDUS final.pdf'),(13,'Mud Rally','Design your robots such that it should have the capability of crossing the hurdles. This event gives you the opportunity to test your machine and to vanquish all other opponents.','Design and built a manually controlled wired or wireless robot which is capable of completing rally successfully in minimum time.','SHANTAM KANUNGO - 9407462235<br> PRANJAL JAIN - 9806374295<br> ISHAN SINGH - 8602244940','The team should not consist of more than 4 members.',21,'img/albums/event_images/64730852356a53caa688902013-mud-pitt-event.jpg','img/albums/event_images/97748495556a53caa688ccmud Rally.pdf'),(14,'Paper Presentation','This event brought to you the opportunity to test yourself to the best as a presenter.','The best way of presenting your ideas in technical or professional field is paper presentation. Let the spark in you ignite the charge of knowledge and innovations. Engineering field has witnessed the most extensive research history and is still going, and so is the profession of ours.','AKSHAY SAXENA- 9039832970<br> SAKSHI PANDIT- 8989439349<br> NUZHAT FATIMA KHAN - 7692079100','Maximum two members in a team are allowed.',22,'img/albums/event_images/133410624456a53f8f03559paper_presentation.jpg','img/albums/event_images/165075452356a53f8f035a1PAPER PRESENTATION Final.pdf'),(16,'Robo-Race','This event gives you the opportunity to test your machine and to vanquish all other opponents. And in the end only fastest and snakiest machines will survive.','Design and built a manually controlled wired or wireless robot which is capable of completing race successfully in minimum time.`','Piyush Rajani -  9179336634<br> Pooja Nagdewani - 8962256334<br> Pranjal Jain - 9806374295<br> Ishan Singh - 8602244940','The team should not consist of more than 4 members.',21,'img/albums/event_images/65143523956a5415d2ea59marathon.jpg','img/albums/event_images/134912223456a5415d2eab6roborace final.pdf'),(17,'Robo Soccer','Participants are required to build one manually controlled bot capable of playing soccer on an arenaspecially designed for the robotic soccer match.','Participants are required to build one manually controlled bot capable of playing soccer on an arenaspecially designed for the robotic soccer match.','HARSH BAIWAL -9179413565<br> RICHA PATHAK - 8989107949<br> TAHER ALI - 9589999455<br> SOURABH - 9406976115','A team should consist of 2 or 3 members. Students from different educational institutes can form a team.',21,'img/albums/event_images/200326826456a5428925878soccer1.jpg','img/albums/event_images/78751193356a54289258c9ROBO SOCCER Final.pdf'),(18,'Shooter','This season, MTM brings an event for innovative design and compete to be the best you to test your skills in shooting','Build a shooter to shoot at a specified target.','Sunil Dhanger - 8120199516 <br> Satyam Paliwal - 8602469246<br> Sourabh - 9406976115','A team can consist of maximum 4 members.',21,'img/albums/event_images/204991173056a544dc06f591447249301.jpg','img/albums/event_images/155647532756a544dc06f96shooter final.pdf'),(19,'Pic- o-mania','The most exciting online event. show off your clicking skills get maximum likes and shares to win this fun event.','Photo with maximum number of likes and shares (likes to the shared photos will not be counted; NO SPAM AUTOLIKERS) will be declared as winner.','Contact to: Mechtechmeet official Facebook page.','Individual Participation',23,'img/albums/event_images/113239061556a5482866681Picture-1.png','img/albums/event_images/38699960056a54828666c0Pic o mania final.pdf'),(20,'HackRDrome','Unleash the Hacker in you.','6. There will be a problem statement and you will have to code the solution in either C/C++/JAVA','Vaibhav Singh - 9752074007','1. The team consists of maximum 2 members.',21,'img/albums/event_images/61802485956a54946d5979anonymous.jpg','img/albums/event_images/21005311956a54946d59eaHackRDome.pdf');
create table admin (
	code Int NOT NULL AUTO_INCREMENT,
	name char(50) ,
	username varchar(30) ,
	unique(username),
	password varchar(100),
	Primary Key (code)) ENGINE = InnoDB;
create table participant (
	code Int NOT NULL AUTO_INCREMENT,
	participant_id char(50) NOT NULL,
	unique(participant_id),
	name char(50) ,
	email varchar(50) ,
	unique(email),
	age Int ,
	gender char(5),
	phone varchar(20),
	unique(phone),
	college text,
	address text,
	Primary Key (code)) ENGINE = InnoDB;
create table registrations (
	code Int NOT NULL AUTO_INCREMENT,
	participant_id char(50) ,
	event_id Int ,
	Primary Key (code)) ENGINE = InnoDB;
Alter table event add Foreign Key (category_code) references category (code) on 
delete restrict on update restrict;
Alter table registrations add Foreign Key (participant_id) references participant (participant_id) on 
delete restrict on update restrict;









