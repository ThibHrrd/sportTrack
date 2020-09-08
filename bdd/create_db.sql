CREATE TABLE IF NOT EXISTS user (

	lastname TEXT NOT NULL,
	firstname TEXT NOT NULL,
	birthday DATE NOT NULL,
	gender INTEGER NOT NULL,
	weight INTEGER NOT NULL,
	height INTEGER NOT NULL,
	mail TEXT NOT NULL,
	password TEXT NOT NULL,

	PRIMARY KEY (lastname, firstname)
);

CREATE TABLE IF NOT EXISTS activity (

	activity_date TIMESTAMP NOT NULL,
	activity_description TEXT NOT NULL,

	PRIMARY KEY (activity_date, activity_description)
);

CREATE TABLE IF NOT EXISTS data_acitivty (

	data_time DATE TIME NOT NULL,
	cardio_frequency INTEGER NOT NULL,
	latitude FLOAT NOT NULL,
	longitude FLOAT NOT NULL,
	altitude INTEGER NOT NULL
);