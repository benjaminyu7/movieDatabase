use moviedatabase;

-- All the queries we will need.

-- SEARCH FOR CONTRIBUTOR --

-- GET PERSON'S IINFO BY FULL NAME
SET @fname = "Robert";
SET @lname = "Downey JR";
SELECT p.* FROM person p
WHERE p.firstName = @fname
AND p.lastName = @lname;

-- SELECTING MEDIAS WHICH A PERSON ACTED IN
-- USE Person ID select first to get the person ID
SET @id_var = 4;
SELECT c.role, m.* FROM media m,casts c
WHERE c.personId = @id_var
AND m.id = c.mediaId;

-- SELECT AWARDS WON BY A PERSON

SET @award_var = 4;
SELECT * FROM awards
WHERE personId = @award_var;

-- SEARCH FOR MEDIA --

-- GET MEDIA BY NAME
SET @mname = "The Avengers";
SELECT * FROM media m 
WHERE m.name = @mname;

-- SELECTING PEOPLE WHO ACTED/PRODUCED/DIRECTED A MOVIE
SET @mid = 4;
SELECT p.*,c.role
from person p, media m, casts c
WHERE m.id = @mid
AND m.id = c.mediaId
AND p.id = c.personId;

-- SELECT GENRES of a specific movie
SET @genre_var = 4;
SELECT genre FROM mediaGenre
WHERE mediaId = @genre_var;

-- SELECT AWARD FOR A SPECIFIC MOVIE
SET @movie_var = 1;
SELECT * FROM awards
WHERE mediaId = @movie_var;

-- SEARCH BY GENRE -- 
-- Select all movies with a certain genre
SET @genre_name = "Action";
SELECT * FROM media m, mediaGenre mg
WHERE m.id = mg.mediaId
AND mg.genre = @genre_name;

-- SEARCH AWARDS --
SET @award_name = "Golden Globe";
SELECT a.*,p.firstName, p.lastName, p.picture,m.name,m.releaseDate,m.picture FROM awards a, person p, media m
WHERE a.award = @award_name
AND a.personId = p.id
AND a.mediaId = m.id;

-- SEARCH BY DISTRIBUTORS --
SET @dist_name = "Paramount Pictures";
SELECT m.name, m.id,m.picture, m.releaseDate FROM distributor d, distributes ds, media m
WHERE d.name = @dist_name
AND d.id = ds.distributorId
AND m.id = ds.mediaId;

-- Get Dist Location
SET @dist_name = "Paramount Pictures";
SELECT l.* FROM location l, distributor d
WHERE d.name = @dist_name
AND l.id = d.location;

