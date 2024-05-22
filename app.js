const express = require('express');
const bodyParser = require('body-parser');
const port = 3000;
const app = express();
const path = require('path');

app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({extended:true}));
app.use('/', require('./routes/modelRoutes'));

app.use(express.static(path.join(__dirname, 'public')));
app.get('/', (req, res) => {
   res.render('index');
});

app.listen(port, () => {
   console.log(`Server running at http://localhost:${port}`);
});