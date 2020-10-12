var express = require('express');

var router = express.Router();
var user_dao = require('sport-track-db').user_dao;


router.get('/', function(req, res, next) {

  user_dao.findAll(function(err, rows) {

    if(err != null){
      console.log("ERROR= " +err);
    }else {
      res.render('users', {data:rows});
    }

  });
});

router.post('/', function(request, response){

  var firstname = request.body.firstname;
  var lastname = request.body.lastname;
  var date = request.body.date.replace("-",":").replace("-",":");
  var gender = request.body.gender;
  var height = parseInt(request.body.height, 10);
  var weight = parseInt(request.body.weight, 10);
  var email = request.body.email;
  var password = request.body.password;
  var confirm = request.body._confirm;

  if(confirm === password){

    var user = [firstname, lastname, date, gender, weight, height, email, password];

    user_dao.findAll((error, rows) => {
      var valid = true;

      for (row of rows) {
        if (row.email === user.email) {
          valid = false;
        }
      }

      if (valid) {
        console.log(user);
        user_dao.insert(user);
      }
    });

  }else{

    response.send('Match the password');


  }
  
  
  

});

module.exports = router;