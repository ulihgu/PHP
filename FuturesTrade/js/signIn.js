/////////////////////////注册界面-点击执行注册--------------O
var signup_in = document.getElementById("signup_in");
signup_in.addEventListener('click', function () {
    //console.log("点-注册-准备开始");
    var hemail = $.trim($("#exampleInputEmail").val());//获取到用户名
    var hpassword1 = $.trim($("#exampleInputPassword1").val());
    var hpassword2 = $.trim($("#exampleInputPassword2").val());
    var husername = $.trim($("#userName").val());
    console.log("油箱："+hemail+"密码:"+hpassword1+"用户名"+husername);
    if (hemail == "" || hpassword1 == "" || hpassword2 == "" || husername == "") {
        layer.alert("用户密码不能为空！", {
            title: "用户密码登录！",
            icon: 5
        });
     } else{
        $.ajax({
            type: "post",
            url: "php/signIn.php",
            data:{'hemail':hemail,'husername':husername,'hpassword1':hpassword1,'hpassword2':hpassword2},
            //成功接收到数据后触发        
            success: function (date) {
                console.log(date);
                date = JSON.parse(date);
                //打印收到数据              
                console.log(date);
                console.log(date[0]);
                console.log(date['state']);
                //判断注册信息
                 if (date['state']=='OK') {
                    //signInInester();  //单独执行插入
                    layer.alert("用户注册成功！", {
                        title: "注册成功！",
                        icon: 1
                    });
                    //setCookie("c_name", husername, 5);
                    //window.location.href="index.html"
                    console.log("注册完成");
                } else {
                    //取错误信息        
                    layer.alert(date['error'], {
                        title: "注册失败！",
                        icon: 2
                    });
                }
            } 
        });
    }
}, false);

//设置setCOOKIE
/* function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setTime(exdate.getTime()*expiredays*60*1000);
    document.cookie=c_name+"="+escape(value)+
            ((expiredays==null) ? "":";expires="+exdate.toGMTString());
} */
//开始插入注册数据
function signInInsert() {
 /*    $.ajax({
        //发送类型
        type: "POST",
        url: "php/signInInsert.php",
        //发送数据
        data: { 'hemail': hemail, 'hpassword1': hpassword1, 'hpassword2': hpassword2 },
        //成功接收到数据后触发        
        success: function (date) {
            //alert("success");
            d = JSON.parse(date);
            console.log(d);
            if (d.length == 0) {
                var na = d.map(function (v) {
                    //console.log("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city)
                    //$("h3").html("名称1："+v.user +" 邮箱2："+v.email+" 城市3："+v.city); 
                    var name = v.user;
                    //$("h3").html(name); 
                    //document.getElementById("loginout").innerHTML = name;
                    window.parent.document.getElementById("loginreg").innerText = "欢迎！" + name;
                    $("#loginreg").removeAttr("onclick");
                    layer.close(layer.index);
                    //setCookie(scemail,v.email,5);
                    setCookie("c_name", v.user, 5);
                    window.location.href = "index.html"
                });
            } else {
                layer.alert("此写入数据库失败，请重新填写！", {
                    title: "注册失败！",
                    icon: 5
                });
            }
        }
    }); */
}