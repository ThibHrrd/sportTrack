const { response } = require('express');
var express = require('express');

var router = express.Router();
var user_dao = require('sport-track-db').user_dao;


router.get('/', function(req, res, next) {

  user_dao.findAll(function(err, rows) {

    if(err != null){
      console.log("ERROR= " +err);
    }else {
      res.render('connect', {data:rows});
    }

  });
});

router.post('/', function(request, response){

  var email = request.body.email;
  var password = request.body.password;

  user_dao.findByKey(email,(error, rows) => {

    for (row of rows) {

      if (row.password === password) {

        sess=request.session;
        sess.id = row.email;

        response.redirect('/');     
        
      }
      else {
        response.redirect('/connect');
      }
    }

    

  });

response.redirect('/connect')
});

module.exports = router;