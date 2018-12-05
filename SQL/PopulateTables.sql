USE moviedatabase;

-- Populate the tables with data.

-- ADDRESS, ADDRESS2, City, State, Country --
INSERT INTO location (address,address2,city,state,country) VALUES 
("1120 6th Ave",NULL,"New York","NY","USA"),
("10201 West Pico Blvd",NULL,"Los Angeles","CA","USA"),
("425 Meadowlands Pkwy",NULL,"Secaucus","NJ","USA"),
("114 5th Ave","#13","New York","NY","USA"),
("77 W 66th St","#13","New York","NY","USA");

-- first name, last name, age, height, sex, birthdate, birthplace,URL
INSERT INTO person (firstName, lastName, age, height, sex, birthdate, birthplace, picture) VALUES
("Tom","Cruise",56,67,'M',DATE("1962-07-03"),"Syracuse, NY","https://pixel.nymag.com/imgs/daily/vulture/2017/06/14/14-tom-cruise.w700.h700.jpg"),
("Johnny","Depp",55,70,'M',DATE("1963-06-09"),"Owensboro, KY","https://akm-img-a-in.tosshub.com/indiatoday/images/story/201505/johnny-depp-story_650_051415014151.jpg"),
("Tom","Hanks",62,72,'M',DATE("1956-07-09"),"Concord, CA","http://iruntheinternet.com/lulzdump/images/tom-hanks-stoned-face-too-good-ugh-1388351045Q.jpg"),
("Robert","Downey JR",53,69,'M',DATE("1965-04-04"),"Manhattan, NY","https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Robert_Downey%2C_Jr._2012.jpg/220px-Robert_Downey%2C_Jr._2012.jpg"),
-- 5
("Leonardo","DiCaprio",44,72,'M',DATE("1974-11-11"),"Hollywood, CA","http://www.gstatic.com/tv/thumb/persons/435/435_v9_bb.jpg"),
("Harrison","Ford",76,73,'M',DATE("1942-07-13"),"Chicago, IL","http://www.gstatic.com/tv/thumb/persons/25704/25704_v9_ba.jpg"),
("Will","Smith",50,74,'M',DATE("1968-09-25"),"Philadelphia, PA","http://www.gstatic.com/tv/thumb/persons/1650/1650_v9_ba.jpg"),
("Morgan","Freeman",81,74,'M',DATE("1937-06-01"),"Memphis, TN","http://www.gstatic.com/tv/thumb/persons/47162/47162_v9_bb.jpg"),
("Dwayne","Johnson",46,77,'M',DATE("1972-05-02"),"Hayward, CA","http://www.gstatic.com/tv/thumb/persons/235135/235135_v9_ba.jpg"),
-- 10
("Samuel","Jackson",69,74,'M',DATE("1948-12-21"),"Washington, DC","http://www.gstatic.com/tv/thumb/persons/71048/71048_v9_ba.jpg"),
("Jennifer","Lawrence",28,69,'F',DATE("1990-08-15"),"Indian Hills, KY","http://www.gstatic.com/tv/thumb/persons/389416/389416_v9_bc.jpg"),
("Scarlett","Johansson",34,63,'F',DATE("1984-11-22"),"Manhattan, NY","http://www.gstatic.com/tv/thumb/persons/69369/69369_v9_bb.jpg"),
("Gal","Gadot",33,70,'F',DATE("1985-04-30"),"Petah Tikva, Israel","http://www.gstatic.com/tv/thumb/persons/532761/532761_v9_bb.jpg"),
("Kate","Winslet",43,67,'F',DATE("1975-10-05"),"Reading, United Kingdom","http://www.gstatic.com/tv/thumb/persons/70811/70811_v9_ba.jpg"),
-- 15
("Benedict","Cumberbatch",42,72,'M',DATE("1976-07-19"),"London, United Kingdom","http://www.gstatic.com/tv/thumb/persons/275459/275459_v9_bb.jpg"),
("Helena","Bonham Carter",52,62,'F',DATE("1966-05-26"),"London, United Kingdom","http://www.gstatic.com/tv/thumb/persons/202273/202273_v9_ba.jpg"),
("Ryan","Reynolds",42,74,'M',DATE("1976-10-23"),"Vancouver, Canada","http://www.gstatic.com/tv/thumb/persons/57282/57282_v9_bb.jpg"),
("Steven","Spielberg",71,67,'M',DATE("1946-12-18"),"Cincinnati, OH","http://www.gstatic.com/tv/thumb/persons/1672/1672_v9_ba.jpg"),
("Quentin","Tarantino",55,73,'M',DATE("1963-03-27"),"Knoxville, TN","http://www.gstatic.com/tv/thumb/persons/52431/52431_v9_ba.jpg"),
-- 20
("James","Cameron",64,74,'M',DATE("1954-08-16"),"Kapuskasing, Canada","http://www.gstatic.com/tv/thumb/persons/263/263_v9_bb.jpg"),
("Gwyneth","Paltrow",46,69,'F',DATE("1972-09-27"),"Los Angeles, CA","http://www.gstatic.com/tv/thumb/persons/25268/25268_v9_bb.jpg"),
("Mark","Gatiss", 52,73,'M',DATE("1966-10-17"),"Sedgefield, United Kingdom","http://www.gstatic.com/tv/thumb/persons/199349/199349_v9_bb.jpg"),
("Jon","Favreau",52,72,'M',DATE("1966-10-19"),"Flushing, NY","http://www.gstatic.com/tv/thumb/persons/71093/71093_v9_ba.jpg"),
("Anthony","Russo",48,72,'M',DATE("1970-02-03"),"Cleveland, OH","https://m.media-amazon.com/images/M/MV5BMTc2NjM5MTM0Ml5BMl5BanBnXkFtZTgwMTY3ODczNjM@._V1_UX214_CR0,0,214,317_AL_.jpg"),
-- 25
("Clark","Gregg",56,69,'M',DATE("1962-04-02"),"Boston, MA","https://m.media-amazon.com/images/M/MV5BMjYyNjAwNDUyOV5BMl5BanBnXkFtZTgwOTc5NzgyNjE@._V1_.jpg"),
("Kevin","Tancharoen",34,70,'M',DATE("1984-04-23"),"Los Angeles, CA","https://m.media-amazon.com/images/M/MV5BMzI4MTI0NTAzM15BMl5BanBnXkFtZTgwNTY5NTUxMjE@._V1_.jpg"),
("Ben","Stiller",53,67,'M',DATE("1965-11-30"),"New York, NY","https://m.media-amazon.com/images/M/MV5BMjc4NDc3NDkzMl5BMl5BanBnXkFtZTcwMTAyNTQwMw@@._V1_.jpg"),
("Guy","Ritchie",50,71,'M',DATE("1968-09-10"),"Hatfield, United Kingdom","https://m.media-amazon.com/images/M/MV5BMTM2NDkxMTcxMl5BMl5BanBnXkFtZTcwNTMyNjI5MQ@@._V1_.jpg"),
("Tim","Burton",60,71,'M',DATE("1958-08-25"),"Burbank, CA","https://m.media-amazon.com/images/M/MV5BMTcwNTc4NTMzOF5BMl5BanBnXkFtZTYwMzc5ODYz._V1_UX214_CR0,0,214,317_AL_.jpg");


-- name, release date
INSERT INTO media (name,releaseDate,type,duration,boxOffice,seasons,episodes,rating,picture) VALUES
("Titanic",DATE("1997-12-19"),"M",TIME("03:14:00"),2186772302,NULL,NULL,"PG-13","https://m.media-amazon.com/images/M/MV5BMDdmZGU3NDQtY2E5My00ZTliLWIzOTUtMTY4ZGI1YjdiNjk3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg"),
("Sherlock",DATE("2010-1-1"),"T",NULL,NULL,4,15,"TV-14","https://static.metacritic.com/images/products/tv/4/525c42f7a1b036d6716878d6b59f28e9.jpg"),
("Ironman",DATE("2008-05-02"),"M",TIME("02:06:00"),585174222,NULL,NULL,"PG-13","http://www.gstatic.com/tv/thumb/v22vodart/170620/p170620_v_v8_al.jpg"),
("The Avengers",DATE("2012-05-04"),"T",TIME("02:23:00"),1519557910,NULL,NULL,"PG-13","https://upload.wikimedia.org/wikipedia/en/f/f9/TheAvengers2012Poster.jpg"),
-- 5
("Avengers: Infinity War",DATE("2018-04-27"),"M",TIME("02:29:00"),2046900111,NULL,NULL,"PG-13","https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SY1000_CR0,0,674,1000_AL_.jpg"),
("Agents of S.H.I.E.L.D.",DATE("2013-1-1"),"T",NULL,NULL,7,135,"TV-PG","https://m.media-amazon.com/images/M/MV5BMTc5NzEzMzA2MF5BMl5BanBnXkFtZTgwNDkyNzgyNDM@._V1_.jpg"),
("Ally McBeal",DATE("1997-09-08"),"T",NULL,NULL,5,112,"TV-PG","https://m.media-amazon.com/images/M/MV5BMTg1NTI0MTUxMl5BMl5BanBnXkFtZTcwODE1MzgyMQ@@._V1_.jpg"),
("Tropic Thunder",DATE("2008-08-13"),"M",TIME("01:47:00"),188072649,NULL,NULL,"R","https://m.media-amazon.com/images/M/MV5BNDE5NjQzMDkzOF5BMl5BanBnXkFtZTcwODI3ODI3MQ@@._V1_SY1000_CR0,0,711,1000_AL_.jpg"),
("Sherlock Holmes",DATE("2009-12-25"),"M",TIME("02:08:00"),524028679,NULL,NULL,"PG-13","https://m.media-amazon.com/images/M/MV5BMTg0NjEwNjUxM15BMl5BanBnXkFtZTcwMzk0MjQ5Mg@@._V1_SY1000_CR0,0,669,1000_AL_.jpg"),
-- 10
("Sweeney Todd",DATE("2007-12-21"),"M",TIME("01:56:00"),152523073,NULL,NULL,"R","https://m.media-amazon.com/images/M/MV5BMTg3NjUxMzM5NV5BMl5BanBnXkFtZTcwMzQ1NjQzMw@@._V1_UX182_CR0,0,182,268_AL_.jpg");

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
(4,"Sci-Fi"),
(5,"Action"),
(5,"Adventure"),
(5,"Fantasy")
,(6,"Action"),
(6,"Adventure"),
(6,"Drama"),
(7,"Comedy"),
(7,"Drama"),
(7,"Fantasy"),
(8,"Action"),
(8,"Adventure"),
(8,"Comedy"),
(9,"Action"),
(9,"Adventure"),
(9,"Crime"),
(10,"Drama"),
(10,"Horror"),
(10,"Musical");

-- role, mediaID, personID
INSERT INTO job (role,mediaId,personId) VALUES
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
("Director",4,23),
("Actor",5,4),
("Actor",5,12),
("Actor",5,15),
("Director",5,24),
("Actor",6,10),
("Actor",6,25),
("Director",6,26),
("Actor",7,4),
("Actor",8,4),
("Actor",8,1),
("Actor",8,27),
("Director",8,27),
("Actor",9,4),
("Director",9,28),
("Actor",10,2),
("Actor",10,16),
("Director",10,29);

INSERT INTO distributor (name, location, picture) VALUES
("BBC Worldwide",1, "https://vignette.wikia.nocookie.net/logopedia/images/e/e9/BBC_Worldwide-0.png/revision/latest?cb=20170729115314"),
("20th Century Fox",2, "https://yt3.ggpht.com/a-/AN66SAwtsHodTEUXBGyJfdmCCVfGEML0iAsZMHDoQA=s900-mo-c-c0xffffffff-rj-k-no"),
("Paramount Pictures",3, "https://upload.wikimedia.org/wikipedia/en/thumb/4/4d/Paramount_Pictures_2010.svg/220px-Paramount_Pictures_2010.svg.png"),
("Walt Disney Studios Motion Pictures",4,"https://vignette.wikia.nocookie.net/starwars/images/e/e7/Walt_Disney_Studios_Motion_Pictures_logo.png/revision/latest?cb=20140728012556"),
("American Broadcasting Company",5,"https://vignette.wikia.nocookie.net/disney/images/0/05/ABC_Studios.png/revision/latest?cb=20170713095024");

INSERT INTO distribution (distributorId, mediaId) VALUES
(1,2),
(2,1),
(3,1),
(3,3),
(3,4),
(4,5),
(5,6),
(2,7),
(3,8),
(2,9);


INSERT INTO awards (personId,mediaId,award,year_awarded,description, won) VALUES
(4,7,"Golden Globe",2001,"Best Performance by an Actor in a Supporting Role in a Series, Miniseries or Motion Picture Made for Television",1),
(4,8,"Golden Globe",2010,"Best Performance by an Actor in a Motion Picture - Comedy or Musical",1),
(4,9,"Golden Globe",2009,"Best Performance by an Actor in a Supporting Role in a Motion Picture",1),
(20,1,"Oscar",1998,"Best Picture",1),
(20,1,"Oscar",1998,"Best Director",1),
(20,1,"Oscar",1998,"Best Film Editing",1),
(20,1,"Golden Globe",1998,"Best Director - Motion Picture",1),
(14,1,"Oscar",1998,"Best Actress In a Leading Role",0),
(14,1,"Golden Globe",1998,"Best Performance by an Actress in a Motion Picture - Drama",0),
(5,1,"Golden Globe",1998,"Best Performance by an Actor in a Motion Picture - Drama",0);