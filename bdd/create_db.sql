CREATE TABLE IF NOT EXISTS user (

	id_user INTEGER(4) PRIMARY KEY,
	lastname TEXT NOT NULL,
	firstname TEXT NOT NULL,
	birthday DATE NOT NULL,
	gender INTEGER NOT NULL,
	weight INTEGER NOT NULL,
	height INTEGER NOT NULL,
	mail TEXT NOT NULL,
	password TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS activity (

	id_activity INTEGER(4) PRIMARY KEY,
	activity_date TIMESTAMP NOT NULL,
	activity_description TEXT NOT NULL,

	aUser INTEGER(4) NOT NULL,
	FOREIGN KEY(aUser) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS data_acitivty (

	id_data INTEGER(4) PRIMARY KEY,
	data_time DATE TIME NOT NULL,
	cardio_frequency INTEGER NOT NULL,
	latitude FLOAT NOT NULL,
	longitude FLOAT NOT NULL,
	altitude INTEGER NOT NULL,

	anActivity INTEGER(4) NOT NULL,
	FOREIGN KEY(anActivity) REFERENCES activity(id_activity)
);