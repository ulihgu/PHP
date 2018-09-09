//////////////////点登录/注册按键弹出登录窗口--------------O
function showLogin(){
    var str =document.getElementById("loginreg").innerText;
    if(str.indexOf("欢迎")==-1){       
        layer.open({
            type:1,
            title:"用户密码登录",
            erea:["350px","300px"],
            skin:'layui-layer-rim',
            content:$("#loginbox")        
        });    
    }
}

/////////////////////////index.html弹出窗口-登录判断用户输入用户和密码--------------O
//发送：油箱地址，密码，到LOGING.PHP 返回查询结果
//查询结果1：“没有登录用户”
//查询结果2：H3值显示“名称，邮箱，城市”
//
function loginFun() {
    //console.log("点击");
    var hemail = $.trim($("#textUserName").val());//获取到用户名
    var hpassword = $.trim($("#textPassword").val());
    if (hemail == "" || hpassword == "") {
        layer.alert("用户密码不能为空！",{
            title:"用户密码登录",
            icon:5
           }); 
    } else {
        $.ajax({
            //发送类型
            type: "POST",
            url: "./php/loging.php",
            //发送数据
            data:{'hemail':hemail,'hpassword':hpassword},
            //成功接收到数据后触发        
            success: function (date) {
                //alert("success");
                console.log(date);
                d = JSON.parse(date);
                console.log(d);
                if(d['state'] == 'NO'){               
                    layer.alert("没有此用户或密码为空！",{
                        title:"登录错误",
                        icon:5
                       }); 
                }else{           
                        //console.log("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city)
                        //$("h3").html("名称1："+v.user +" 邮箱2："+v.email+" 城市3："+v.city); 
                        //document.getElementById("loginout").innerHTML = name;
                        //window.parent.document.getElementById("loginreg").innerText="欢迎！"+d['username'];
                        $("#loginreg").removeAttr("onclick");
                        layer.close(layer.index);
                       //setCookie(scemail,v.email,5);
                       //setCookie("c_name",v.user,5);
                       window.location.href="./index.html";    
                }     
            }
        });
    }
}
/////////////////////////弹出窗口-点击注册-切换到注册页--------------O
/* function signUp() {
    //console.log("点击注册");
    window.location.href="signup.html" 
} */

/////////////////////index.html-中“退出”执行--------------O
/* var jExit = document.getElementById("hExit");
jExit.addEventListener('click', function(){
    console.log("退出成功");
    //delCookie("c_name","",-1);
    //window.location.href="index.html" 
},false); */

/////////////////////index.html-中“个人设置”执行--------------N
//发送：油箱地址，密码，到LOGING.PHP 返回查询结果
//查询结果1：“没有登录用户”
//查询结果2：H3值显示“名称，邮箱，城市”
//
var loging_a = document.getElementById("personalSettings");
loging_a.addEventListener('click', function(){
        console.log("success");
        var hemail = $("#exampleInputEmail1").val();
        var hpassword = $("#exampleInputPassword1").val();
        $.ajax({
            //发送类型
            type: "POST",
            url: "php/loging.php",
            //发送数据
            data:{'hemail':hemail,'hpassword':hpassword},
            //成功接收到数据后触发        
            success: function (date) {
                d = JSON.parse(date);
                console.log(d);
                if(d.length == 0){               
                    console.log("没有查询到登录用户!");               
                }else{
                    //$("h1").html(d.email +d.password);               
                   /*  var na = d.map(function(v){
                       console.log("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city)
                    });    */ 
                }     
            }
        });
},false);
/////////////////////////////////////////检查用户SESSION是否登录过--------------O
function checKsession() {
    $.ajax({
        //发送类型
        type: "POST",
        url: "./php/lock.php",
        //发送数据
        //data:{'hemail':hemail,'hpassword':hpassword},
        //成功接收到数据后触发        
        success: function (date) {
            date = JSON.parse(date);
            //打印收到数据              
            console.log(date);
            //判断注册信息
             if (date['state']=='OK') {
                var username = date['username'];
                window.parent.document.getElementById("loginreg").innerText="欢迎！"+username;
                console.log("登录成功");
            } else {
                //取错误信息
                console.log("date[error]:"+date['error']);   
            }  
        }
    });
}
/////////////////////////////////////////检查COOKIE是否登录过--------------N
function checkCookie() {
    var username = getCookie('c_name');
    if(null!=username&&""!=username){
        console.log('Welcome agiin '+username+'!');
        window.parent.document.getElementById("loginreg").innerText="欢迎！"+username;
    }else{
        //window.parent.document.getElementById("loginreg").innerText=username;
        //console.log('Please enter your name: !');
        /* username = prompt('Please enter your name:',"");
        if(username!=null&&username!=""){
            setCookie('username',username,365);
        } */
    }
}

function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setTime(exdate.getTime()*expiredays*60*1000);
    document.cookie=c_name+"="+escape(value)+
            ((expiredays==null) ? "":";expires="+exdate.toGMTString());
}

function getCookie(c_name) {
    if(document.cookie.length>0){
        c_start = document.cookie.indexOf(c_name + "=");
        if(c_start!=-1){
            c_start = c_start + c_name.length+1;
            c_end = document.cookie.indexOf(";",c_start);
            if(c_end==-1){
                c_end=document.cookie.length;
                return unescape(document.cookie.substring(c_start,c_end));
            }
        }
    }
}
//删除cookie
function delCookie(c_name) {
    var exp = new Date();
    exp.getMilliseconds(exp.getMilliseconds() - 1);
    var value = getCookie(c_name);
    if (value != null) document.cookie = c_name + "=" + value + ";expires=" + exp.toGMTString();
}

/////////////////////////////////////////检查COOKIE是否登录过--完成--------------