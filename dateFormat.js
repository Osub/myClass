js格式化php时间戳函数
function dateFormatter(data) {
      var  data = new Date(data*1000);
      var year = data.getFullYear();       //年
      var month = data.getMonth() + 1;     //月
      var day = data.getDate();            //日
      var hh = data.getHours();            //时
      var mm = data.getMinutes();          //分
      var ss = data.getSeconds();          //秒
      var clock = year + "-";
      if(month < 10) clock += "0";
      clock += month + "-";
      if(day < 10) clock += "0";
      clock += day + " ";
      if(hh < 10) clock += "0";
      clock += hh + ":";
      if (mm < 10) clock += '0'; 
      clock += mm + ":"; 
      if (ss < 10) clock += '0';
      clock += ss;
      return clock;
    }
