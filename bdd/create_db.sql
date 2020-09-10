DROP TABLE user;
DROP TABLE activity;
DROP TABLE data_acitivty;

CREATE TABLE IF NOT EXISTS user (

	id_user INTEGER PRIMARY KEY,
	lastname TEXT NOT NULL,
	firstname TEXT NOT NULL,
	birthday DATE NOT NULL,
	gender INTEGER NOT NULL CHECK (gender == "Man" OR gender == "Woman"),
	weight INTEGER NOT NULL CHECK (weight >= 20 AND weight <= 250),
	height INTEGER NOT NULL CHECK (height >= 100 AND height <= 250),
	mail TEXT NOT NULL CHECK (mail LIKE '%@%.%'),
	password TEXT NOT NULL,
);

CREATE TABLE IF NOT EXISTS activity (

	id_activity INTEGER PRIMARY KEY,
	activity_date TIMESTAMP NOT NULL,
	activity_description TEXT NOT NULL,

	aUser INTEGER NOT NULL,
	FOREIGN KEY(aUser) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS data_acitivty (

	id_data INTEGER(4) PRIMARY KEY,
	data_time DATE TIME NOT NULL,
	cardio_frequency INTEGER NOT NULL CHECK (cardio_frequency > 0),
	latitude FLOAT NOT NULL CHECK (latitude >= -90 AND latitude <= 90),
	longitude FLOAT NOT NULL CHECK (longitude >= -180 AND longitude <= 180),
	altitude INTEGER NOT NULL,

	anActivity INTEGER NOT NULL,
	FOREIGN KEY(anActivity) REFERENCES activity(id_activity)
);

DELETE FROM user;
DELETE FROM activity;
DELETE FROM data_acitivty;

INSERT INTO user VALUES(0001, 'HERARD', 'Thibault', datetime('now'), 'Man', 70, 180, 'thibz@gmail.com', 'ouioui');
INSERT INTO activity VALUES(0002, datetime('now'), 'course de 800m', 0001);
INSERT INTO data_acitivty VALUES(0003, datetime('now'), 90, 47.12, -2.123, 18, 0002);

INSERT INTO user VALUES(0002, 'HERARD', 'Thibault', datetime('now'), 0, 180, 70, 'thibzgmail.com', 'ouioui');
-- Error on insertion
INSERT INTO activity VALUES(0002, datetime('now'), 'course de 800m', 0001);
INSERT INTO data_acitivty VALUES(0003, datetime('now'), 90, 91, -2.123, 18, 0002);
-- Error on insertion
