var router = require('express').Router()
var User = require('mongoose').model('Users')

router.get('/', function(req, res) {
    User.find().then(function(users) {
        return res.status(200).json({status: 200, data: users});
    })
})

router.post('/', function(req, res) {
    let users = new User(req.body)

    users.save(function(err, users) {
        if (err) return res.status(422).json({status: 422, message: err.message})

        return res.status(200).json({status: 200, message: 'Created'})
    })
})

router.put('/:id', function(req, res) {
    User.findOneAndUpdate({_id: req.param.id}, req.body, function(err) {
        if (err) res.status(422).json({status: 422, message: err.message});

        return res.status(200).json({status: 200, message: 'Updated'});
    })
})

router.delete('/:id', function(req, res) {
    User.findOneAndDelete({_id: req.param.id}, function(err) {
        if (err) return res.status(422).json({status: 422, message: err.message});

        return res.status(200).json({status: 200, message: 'Deleted'});
    })
})

module.exports = router