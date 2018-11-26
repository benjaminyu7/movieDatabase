USE moviedatabase;

-- ADDRESS, ADDRESS2, City, State, Country --
INSERT INTO location (address,address2,city,state,country) VALUES 
(NULL,NULL,"Syracuse","NY","USA"),
(NULL,NULL,"Owensboro","KY","USA"),
(NULL,NULL,"Concord","CA","USA"),
(NULL,NULL,"Manhattan","NY","USA"),
(NULL,NULL,"Hollywood","CA","USA"),
(NULL,NULL,"Chicago","IL","USA"),
(NULL,NULL,"Philadelphia","PA","USA"),
(NULL,NULL,"Memphis","TN","USA"),
(NULL,NULL,"Hayward","CA","USA"),
(NULL,NULL,"Washington","DC","USA"),
(NULL,NULL,"Indian Hills","KY","USA"),
(NULL,NULL,"Manhattan","NY","USA"),
(NULL,NULL,"Petah Tikva",NULL,"Israel"),
(NULL,NULL,"Reading",NULL,"United Kingdom"),
(NULL,NULL,"London",NULL,"United Kingdom"),
(NULL,NULL,"London",NULL,"United Kingdom"),
(NULL,NULL,"Vancouver",NULL,"Canada"),
(NULL,NULL,"Cincinnati","OH","USA"),
(NULL,NULL,"Knoxville","TN","USA"),
(NULL,NULL,"Kapuskasing",NULL,"Canada"), -- 20
("1120 6th Ave",NULL,"New York","NY","USA"),
("10201 West Pico Blvd",NULL,"Los Angeles","CA","USA"),
("425 Meadowlands Pkwy",NULL,"Secaucus","NJ","USA"),
(NULL,NULL,"Los Angeles","CA","USA"),
(NULL,NULL,"Sedgefield",NULL,"United Kingdom"), -- 25
(NULL,NULL,"Flushing","NY","USA");

-- first name, last name, age, height, sex, birthdate, birthplace,URL
INSERT INTO person (firstName, lastName, age, height, sex, birthdate, birthplace, picture) VALUES
("Tom","Cruise",56,67,'M',DATE("1962-07-03"),1,"https://pixel.nymag.com/imgs/daily/vulture/2017/06/14/14-tom-cruise.w700.h700.jpg"),
("Johnny","Depp",55,70,'M',DATE("1963-06-09"),2,"https://akm-img-a-in.tosshub.com/indiatoday/images/story/201505/johnny-depp-story_650_051415014151.jpg"),
("Tom","Hanks",62,72,'M',DATE("1956-07-09"),3,"http://iruntheinternet.com/lulzdump/images/tom-hanks-stoned-face-too-good-ugh-1388351045Q.jpg"),
("Robert","Downey JR",53,69,'M',DATE("1965-04-04"),4,"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Robert_Downey%2C_Jr._2012.jpg/220px-Robert_Downey%2C_Jr._2012.jpg"),
("Leonardo","DiCaprio",44,72,'M',DATE("1974-11-11"),5,"http://www.gstatic.com/tv/thumb/persons/435/435_v9_bb.jpg"),
("Harrison","Ford",76,73,'M',DATE("1942-07-13"),6,"http://www.gstatic.com/tv/thumb/persons/25704/25704_v9_ba.jpg"),
("Will","Smith",50,74,'M',DATE("1968-09-25"),7,"http://www.gstatic.com/tv/thumb/persons/1650/1650_v9_ba.jpg"),
("Morgan","Freeman",81,74,'M',DATE("1937-06-01"),8,"http://www.gstatic.com/tv/thumb/persons/47162/47162_v9_bb.jpg"),
("Dwayne","Johnson",46,77,'M',DATE("1972-05-02"),9,"http://www.gstatic.com/tv/thumb/persons/235135/235135_v9_ba.jpg"),
("Samuel","Jackson",69,74,'M',DATE("1948-12-21"),10,"http://www.gstatic.com/tv/thumb/persons/71048/71048_v9_ba.jpg"),
("Jennifer","Lawrence",28,69,'F',DATE("1990-08-15"),11,"http://www.gstatic.com/tv/thumb/persons/389416/389416_v9_bc.jpg"),
("Scarlett","Johansson",34,63,'F',DATE("1984-11-22"),12,"http://www.gstatic.com/tv/thumb/persons/69369/69369_v9_bb.jpg"),
("Gal","Gadot",33,70,'F',DATE("1985-04-30"),13,"http://www.gstatic.com/tv/thumb/persons/532761/532761_v9_bb.jpg"),
("Kate","Winslet",43,67,'F',DATE("1975-10-05"),14,"http://www.gstatic.com/tv/thumb/persons/70811/70811_v9_ba.jpg"),
("Benedict","Cumberbatch",42,72,'M',DATE("1976-07-19"),15,"http://www.gstatic.com/tv/thumb/persons/275459/275459_v9_bb.jpg"),
("Helena","Bonham Carter",52,62,'F',DATE("1966-05-26"),16,"http://www.gstatic.com/tv/thumb/persons/202273/202273_v9_ba.jpg"),
("Ryan","Reynolds",42,74,'M',DATE("1976-10-23"),17,"http://www.gstatic.com/tv/thumb/persons/57282/57282_v9_bb.jpg"),
("Steven","Spielberg",71,67,'M',DATE("1946-12-18"),18,"http://www.gstatic.com/tv/thumb/persons/1672/1672_v9_ba.jpg"),
("Quentin","Tarantino",55,73,'M',DATE("1963-03-27"),19,"http://www.gstatic.com/tv/thumb/persons/52431/52431_v9_ba.jpg"),
("James","Cameron",64,74,'M',DATE("1954-08-16"),20,"http://www.gstatic.com/tv/thumb/persons/263/263_v9_bb.jpg"),
-- 21 below
("Gwyneth","Paltrow",46,69,'F',DATE("1972-09-27"),24,"http://www.gstatic.com/tv/thumb/persons/25268/25268_v9_bb.jpg"),
("Mark","Gatiss", 52,73,'M',DATE("1966-10-17"),25,"http://www.gstatic.com/tv/thumb/persons/199349/199349_v9_bb.jpg"),
("Jon","Favreau",52,72,'M',DATE("1966-10-19"),26,"http://www.gstatic.com/tv/thumb/persons/71093/71093_v9_ba.jpg");

-- name, release date
INSERT INTO mediaType (name,releaseDate) VALUES
("Titanic",DATE("1997-12-19"),"M"),
("Sherlock",DATE("2010-1-1"),"T"),
("Ironman",DATE("2008-05-02"),"M"),
("The Avengers",DATE("2012-05-04"),"T");

-- mediaID, genre
INSERT INTO mediaGenre (mediaId, genre)VALUES
(1,"Drama"),
(1,"Romance"),
(2,"Crime"),
(2,"Drama"),
(2,"Mystery"),
(3,"Action"),
(3,"Adventure"),
(3,"Sci-Fi"),
(4,"Action"),
(4,"Adventure"),
(4,"Sci-Fi");

-- mediaID, duration, boxOffice, rating
INSERT INTO movie (mediaId,duration,boxOffice,rating) VALUES
(1,TIME("03:14:00"),2186772302,"PG-13"),
(3,TIME("02:06:00"),585174222,"PG-13"),
(4,TIME("02:23:00"),1519557910,"PG-13");

-- mediaId, seasons,episodes,rating
INSERT INTO tvshow (mediaId, seasons,episodes, rating) VALUES
(2,4,15,"TV-14");

-- role, mediaID, personID
INSERT INTO casts (role,mediaId,personId) VALUES
("Actor",1,5),
("Actor",1,14),
("Director",1,20),
("Actor",2,15),
("Director",2,23),
("Actor",3,4),
("Actor",3,21),
("Director",3,22),
("Actor",4,4),
("Actor",4,10),
("Actor",4,12),
("Actor",4,21),
("Director",4,23);

INSERT INTO distributor (name, location) VALUES
("BBC Worldwide",21),
("20th Century Fox",22),
("Paramount Pictures",23);

INSERT INTO distributes (distributorId, mediaId) VALUES
(1,2),
(2,1),
(3,1),
(3,3);


INSERT INTO awards (personId,award,year_awarded) VALUES
(4,"Golden Globe",2001),
(4,"Golden Globe",2010),
(4,"Golden Globe",2009);