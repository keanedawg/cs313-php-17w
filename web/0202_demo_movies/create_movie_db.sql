CREATE TABLE movie
(
	id SERIAL PRIMARY KEY NOT NULL,
	title VARCHAR(100) NOT NULL,
	length SMALLINT,
	year SMALLINT,
	rating VARCHAR(10)
);

CREATE TABLE actor
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(100) NOT NULL
);

CREATE TABLE movie_actor
(
	id SERIAL PRIMARY KEY NOT NULL,
	movie_id INT NOT NULL REFERENCES movie(id),
	actor_id INT NOT NULL REFERENCES actor(id),
	character VARCHAR(100)
);

INSERT INTO movie(title, length, year, rating)
  VALUES ('Star Wars IV: A New Hope', NULL, 1977, 'PG');

INSERT INTO movie(title, rating)
  VALUES ('Indiana Jones and the Last Crusade', 'PG-13');

INSERT INTO actor(name) VALUES ('Mark Hamill'), ('Harrison Ford'), ('Carrie Fisher'), ('Sean Connery');

INSERT INTO movie_actor(movie_id, actor_id, character)
  VALUES (1, 1, 'Luke Skywalker'),
  (1, 2, 'Han Solo'),
  (1, 3, 'Princess Leia'),
  (2, 2, 'Indiana Jones'),
  (2, 4, 'Henry Jones Sr.');

SELECT * FROM movie m INNER JOIN movie_actor ma ON m.id = ma.movie_id;

SELECT title, character FROM movie m
	INNER JOIN movie_actor ma ON m.id = ma.movie_id
	INNER JOIN actor a ON a.id = ma.actor_id
	WHERE a.name = 'Mark Hamill';


SELECT title, character FROM movie m
	INNER JOIN movie_actor ma ON m.id = ma.movie_id
	INNER JOIN actor a ON a.id = ma.actor_id
	WHERE a.name = 'Harrison Ford';

CREATE USER php_movie_guy WITH PASSWORD 'orange';
GRANT SELECT, INSERT, UPDATE ON ALL TABLES IN SCHEMA public TO php_movie_guy;

# Do the following and repeat for all auto increment columns
GRANT USAGE, SELECT ON movie_id_seq TO php_movie_guy;
# Or just do this for all sequences:
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO php_movie_guy;


