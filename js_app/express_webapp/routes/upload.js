var express = require('express');
var uploadFile = require('express-fileupload');
var distance = require('sport-track-db/distance');
var activity_dao = require('sport-track-db').activity_dao;
var activity_entry_dao = require('sport-track-db').activity_entry_dao;
var router = express.Router();


router.get('/', function(req, res, next) {
    user_dao.findAll(function(err, rows) {
      if(err != null){
        console.log("ERROR= " + err);
      }else {
        res.render('upload', {data:rows});
      }
    });
  });

router.post('/', function(request, response){

    var content = request.files.fileToUpload.data.toString('utf-8');
    var json = JSON.parse(content);

    //handling activity_id
    var id_activity;
    var activity_date = json['activity']['date'];
    var activity_description = json['activity']['description'];
    var distance = distance.calculDistanceTrajet(json);

    //frequencies calculation
    var max_frequency = function();
    var min_frequency;
    var average_frequency;
    
    //activity object
    var activity = []

    //insertion in activity

    //looping to insert data_activity

});

module.exports = router;