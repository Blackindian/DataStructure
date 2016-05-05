var http = require('http');
var fs = require('fs');
var stati = require('./statistics');
var szStati = {text:'SuZhou'};
var shStati = {text:'ShangHai'};

var server=new http.Server();  
server.on('request',function(req,res){  
    res.writeHead(200,{'Content-Type':'text/html'});  
    
    fs.readFile('./index.html','utf8',(err,data)=>{
        if (err) {
            throw err;
        }
        console.log(data);
        // res.write(data);
        // res.end();
        stati.statiSalary('苏州',(results)=>{
            szStati.values = results;
            stati.statiSalary('上海',(results)=>{
                shStati.values = results;
                var series =[szStati,shStati];
                var strSeries = JSON.stringify(series);
                console.log(strSeries);
                
                data = data.replace('@series',strSeries);
                console.log(data);
                
                res.write(data);
                res.end();
            });
        });
    });
});  
  
server.listen(3000);  
console.log('http server started...port:3000');


