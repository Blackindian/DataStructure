var spider = require('./spider');
var mongo = require('./mongo');

mongo.removeAll('苏州',(err)=>{
    if (!err) {
        spider.run('.net','苏州',1);
    }
});
mongo.removeAll('上海',(err)=>{
    if (!err) {
         spider.run('.net','上海',1);
    }
});

