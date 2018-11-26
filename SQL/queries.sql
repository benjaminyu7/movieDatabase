use moviedatabase;


-- SEARCH FOR CONTRIBUTOR --

-- GET PERSON'S IINFO BY FULL NAME
SET @fname = "Robert";
SET @lname = "Downy JR";
SELECT p.* FROM person p
WHERE p.firstName = @fname
AND p.lastName = @lname;

-- SELECTING MEDIAS WHICH A PERSON ACTED IN
-- USE Person ID select first to get the person ID
SET @id_var = 4;
SELECT c.role, m.* FROM mediaType m,casts c
WHERE c.personId = @id_var
AND m.id = c.mediaId;

-- SELECT AWARDS WON BY A PERSON

SET @award_var = 4;
SELECT award,year_awarded FROM awards
WHERE personId = @award_var;


-- SEARCH FOR MEDIA --


-- GET MEDIA BY NAME
SET @mname = "The Avengers";
SELECT * FROM mediaType m 
WHERE m.name = @mname;

-- GET MOVIE INFO BY ID
SET @mid = 4;
SELECT * FROM movie m
WHERE m.mediaId = mid;

-- GET TV INFO BY ID
SET @tid = 2;
SELECT * FROM tvshow t
WHERE t.mediaId = @tid;

-- SELECTING PEOPLE WHO ACTED/PRODUCED/DIRECTED A MOVIE
SET @mid = 4;
SELECT p.id,p.firstName,p.lastName,p.age,p.height,p.sex,p.birthdate,p.picture,l.city,l.state,l.country,c.role
from person p, mediaType m, casts c, location l
WHERE m.id = @mid
AND m.id = c.mediaId
AND p.id = c.personId
and l.id = p.birthplace;

-- SELECT GENRES
SET @genre_var = 4;
SELECT genre FROM mediaGenre
WHERE mediaId = @genre_var;

-- SEARCH BY GENRE -- 
-- Select all movies with a certain genre
SET @genre_name = "Action";
SELECT * FROM mediaType m, mediaGenre mg
WHERE m.id = mg.mediaId
AND mg.genre = @genre_name;

-- SEARCH AWARDS --
SET @award_name = "Golden Globe";
SELECT p.firstName, p.lastName, a.award, a.year_awarded FROM awards a, person p
WHERE a.award = @award_name
AND a.personId = p.id;

-- SEARCH BY DISTRIBUTORS --
SET @dist_name = "Paramount Pictures";
SELECT m.name, d.name FROM distributor d, distributes ds, mediaType m
WHERE d.name = @dist_name
AND d.id = ds.distributorId
AND m.id = ds.mediaId;

