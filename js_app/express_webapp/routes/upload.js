var express = require('express');
var uniqid = require('uniqid');
var uploadFile = require('express-fileupload');
var distanceCalc = require('sport-track-db/distance');
var activity_dao = require('sport-track-db').activity_dao;
var activity_entry_dao = require('sport-track-db').activity_entry_dao;
var router = express.Router();


router.get('/', function(req, res, next) {

    activity_dao.findAll(function(err, rows) {

      console.log('IN FINDALL');

      if(err != null){
        console.log("ERROR= " + err);
      }else if (req.session.loggedin == false) {
        res.redirect('/connect')
      }else{
        console.log(req.session);
        res.render('upload', {data:rows});
        
      }
    });
  });

router.post('/', function(request, response){

    var content = request.files.fileToUpload.data.toString('utf-8');
    var json = JSON.parse(content);

    var id_activity = uniqid();
    var activity_date = json['activity']['date'];
    var activity_description = json['activity']['description'];
    var distance = distanceCalc.calculDistanceTrajet(json);
    var user = request.session.email;
    var activityData = Array();

    //frequencies calculation
    var max_frequency = 0;
    var min_frequency = 1000;
    var average_frequency = 0;

    for (cardio of json['data']) {
      var c = cardio['cardio_frequency'];
      if (c < min_frequency) {
        min_frequency = c;
      }
      if (c > max_frequency) {
        max_frequency = c;
      }
      average_frequency = average_frequency + c;
    }

    average_frequency = average_frequency/json['data'].length;
    
    //activity object
    var activity = [id_activity, activity_date, activity_description, distance, max_frequency, min_frequency, average_frequency, user];

    //insertion in activity
    activity_dao.insert(activity);
    console.log(activity_dao);
    console.log(activity_entry_dao);

    //looping to insert data_activity
    for (data of json['data']) {
      var data_time = data['time'];
      var cardio_frequency = data['cardio_frequency'];
      var latitude = data['latitude'];
      var longitude = data['longitude'];
      var altitude = data['altitude'];
      var dataActivity = [data_time, cardio_frequency, latitude, longitude, altitude, id_activity];
      activity_entry_dao.insert(dataActivity);
    }

    response.redirect("/activities");
    

});

module.exports = router;