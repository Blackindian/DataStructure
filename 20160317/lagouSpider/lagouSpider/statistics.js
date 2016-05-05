var mongo = require('./mongo');

var stati = function (city,callback) {
    var count0005=0;
    var count0510=0;
    var count1015=0;
    var count1520=0;
    var count2025=0;
    var count25=0;

    mongo.readAll(city,(results)=>{
        console.log(`${city} results length:${results.length}`);
        for (var index = 0; index < results.length; index++) {
            var item = results[index];
            if (item.salaryMax > 0 && item.salaryMax <= 5) {
                count0005++;
                continue;
            }
            if (item.salaryMax>5&&item.salaryMax <= 10) {
                count0510++;
                continue;
            } 
            if (item.salaryMax>10&&item.salaryMax <= 15) {
                count1015++;
                continue;
            }
            if (item.salaryMax>15&&item.salaryMax <= 20) {
                count1520++;
                continue;
            }
            if (item.salaryMax>20&&item.salaryMax <= 25) {
                count2025++;
                continue;
            }
            if (item.salaryMax>25) {
                count25++;
                continue;
            }
        }
        callback([count0005,count0510,count1015,count1520,count2025,count25]);
    });
};

exports.statiSalary=stati;