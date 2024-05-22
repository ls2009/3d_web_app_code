const Model = require('model/modelModel');

exports.listModels = (req, res) => {
    Model.getAllModels((err, models) => {
      if(err) {
        res.status(500).send(err);
      } else {
        res.render('index',{models});
      }
    });
};