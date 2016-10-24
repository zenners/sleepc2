var express = require('express');
var router = express.Router();
// var dataSchema = require('../models/data');


var returnRouter = function(io) {
    router.get('/', function(req, res, next) {
       res.send('welcome to sleepc')
    });

    router.post('/report', function(req, res){
	    // var newData = new dataSchema(req.body)
	    // newData.save(function(err, res){
	    //     if (err) console.log (err)

	    //     console.log(res)

	    //     io.emit('new data')
	    // })
	})

    return router;
}

module.exports = returnRouter;

