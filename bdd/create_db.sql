DROP TABLE user;

CREATE TABLE user (

	lastname TEXT NOT NULL,
	firstname TEXT NOT NULL,
	birthday TIMESTAMP NOT NULL,
	gender INTEGER NOT NULL,
	weight INTEGER NOT NULL,
	height INTEGER NOT NULL,
	mail TEXT NOT NULL,
	password TEXT NOT NULL,

	PRIMARY KEY (lastname, firstname)
);

CREATE TABLE activity (

	activity_date TIMESTAMP NOT NULL,
	activity_description TEXT NOT NULL,

	PRIMARY KEY (activity_date, activity_description)
);

CREATE TABLE data (

	data_time 

);