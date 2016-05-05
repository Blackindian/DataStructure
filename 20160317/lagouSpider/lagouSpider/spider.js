var getData = function (kd,city,pn) {
    var mongo = require('./mongo');
    var http = require('http');
    var queryString = require('querystring');

    var postData=queryString.stringify({
        'pn':pn,
        'kd':kd,
        'first':false
    });

    var options = {
        hostname:'www.lagou.com',
        method:'POST',
        path:'/jobs/positionAjax.json?px=default&city='+city,
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': postData.length
        }
    };
    
    var postResult = '';
    
    var req = http.request(options,(res)=>{
        console.log(`STATUS:${res.statusCode}`);
        res.setEncoding('utf8');
        res.on('data',(chunk)=>{
            postResult+=chunk;
        }); 
        res.on('end',()=>{
            console.log(`RESULT:${postResult}`);
            var jsonObj =JSON.parse(postResult);
            //insert into db
            jsonObj.content.result.forEach((item)=>{
                var salary = item.salary;
                //拆分3k-6k，易于统计
                var arr = salary.split('-');
                var min = arr[0].substring(0,arr[0].indexOf('k'));
                var max = arr.length>1? arr[1].substring(0,arr[1].indexOf('k')):min;
                item.salaryMin = parseInt(min);
                item.salaryMax = parseInt(max);
                
                mongo.save(city,item);
            });
            if(jsonObj.content.hasNextPage&&jsonObj.content.totalPageCount>pn){
                getData(kd,city,pn+1);
            }
        });
        req.on('error',(e)=>{
            console.log(`problem with request:${e.message}`);
        }); 
    });

    req.write(postData);
    req.end();
    console.log(`start to get data. pn:${pn} city:${city} kd:${kd}`);
};

exports.run = getData;

