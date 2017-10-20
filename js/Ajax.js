//参数1:请求方式,参数2:服务器地址, 参数3:参数(对象) ,参数4:回调函数, 参数5:同步异步
function ajax(type, url, par, fn, async) {
    //判断请求方式是否合法 get post
    //因为传入可能会有大写或者小写,统一转化为大写,方便验证
    type = type.toUpperCase();
    //判断合法性
    if (type != "GET" && type != "POST") {
            console.error("请求方式不合法");
            return;
    }
    //判断浏览器类型
    var ajaxObj;
    if(window.XMLHttpRequest){
        ajaxObj = new XMLHttpRequest();
    }else {
        ajaxObj = new ActiveXObject('Microsoft.XMLHTTP');
    }
    //处理参数
    var data = "";
    for(var prop in par){
        data += prop + "=" + par[prop]+"&";
    }
    data = data.split(0,data.length-1);
    if(type == "GET"){
        url += "?"+data;
    }
    //调用open
    ajaxObj.open(type,url, async);
    if(type == "POST"){
        ajaxObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajaxObj.send(data);
    }else {
        ajaxObj.send();
    }
    //监听数据返回
    ajaxObj.onreadystatechange = function () {
        if (4 == ajaxObj.readyState && 200 == ajaxObj.status) {
                fn (ajaxObj.responseText)
        }
    }

}