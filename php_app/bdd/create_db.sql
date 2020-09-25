DROP TABLE user;
DROP TABLE activity;
DROP TABLE data_activity;

CREATE TABLE IF NOT EXISTS user (

	lastname TEXT NOT NULL,
	firstname TEXT NOT NULL,
	birthdate DATE NOT NULL,
	gender TEXT NOT NULL CHECK (gender == "Man" OR gender == "Woman"),
	weight INTEGER NOT NULL CHECK (weight >= 20 AND weight <= 250),
	height INTEGER NOT NULL CHECK (height >= 100 AND height <= 250),
	email TEXT NOT NULL CHECK (email LIKE '%@%.%') PRIMARY KEY,
	password TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS activity (

	id_activity INTEGER PRIMARY KEY,
	activity_date TIMESTAMP NOT NULL,
	activity_description TEXT NOT NULL,

	aUser INTEGER NOT NULL,
	FOREIGN KEY(aUser) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS data_activity (

	id_data INTEGER(4) PRIMARY KEY,
	data_time DATE TIME NOT NULL,
	cardio_frequency INTEGER NOT NULL CHECK (cardio_frequency > 0),
	latitude FLOAT NOT NULL CHECK (latitude >= -90 AND latitude <= 90),
	longitude FLOAT NOT NULL CHECK (longitude >= -180 AND longitude <= 180),
	altitude INTEGER NOT NULL,

	anActivity INTEGER NOT NULL,
	FOREIGN KEY(anActivity) REFERENCES activity(id_activity)
);
