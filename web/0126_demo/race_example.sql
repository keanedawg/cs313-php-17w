CREATE TABLE type
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(50)
);

CREATE TABLE race
(
	id SERIAL PRIMARY KEY NOT NULL,
	type_id INT REFERENCES type(id) NOT NULL,
	location VARCHAR(100) NOT NULL,
	name VARCHAR(100) NOT NULL,
	date DATE NOT NULL
);

INSERT INTO type(name) VALUES ('Marathon');
INSERT INTO type(name) VALUES ('Half Marathon'), ('5K');

SELECT * FROM type;

INSERT INTO race(type_id, location, name, date)
  VALUES (1, 'Rexburg, ID', 'Web Engineering Marathon', '2017-04-06');


