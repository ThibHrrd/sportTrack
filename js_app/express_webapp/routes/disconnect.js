var express = require('express');

var router = express.Router();

router.get('/', function(req, res, next) {

    req.session.loggedin = false;
    req.session.email = null;
    res.redirect('/connect');
  });

module.exports = router;