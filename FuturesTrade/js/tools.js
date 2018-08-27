//打开查询用户登录
$("#loging————").click(function () {
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
            alert("success");
            d = JSON.parse(date);
            console.log(d);
            if(d.length == 0){               
                $("h3").html("没有查询到登录用户!");
            }else{
                //$("h1").html(d.email +d.password);               
                var na = d.map(function(v){
                   console.log("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city)
                    $("h3").html("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city); 
                });    
            }     
        }
    });
})

//点登录按键
function showLogin() {
    layer.open({
        type:1,
        title:"用户密码登录",
        erea:["350px","300px"],
        skin:'layui-layer-rim',
        content:$("#loginbox")
    });
}
//登录判断用户输入
function loginFun() {
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
            url: "php/loging.php",
            //发送数据
            data:{'hemail':hemail,'hpassword':hpassword},
            //成功接收到数据后触发        
            success: function (date) {
                //alert("success");
                d = JSON.parse(date);
                console.log(d);
                if(d.length == 0){               
                    layer.alert("没有此用户或密码为空！",{
                        title:"登录错误",
                        icon:5
                       }); 
                }else{           
                    var na = d.map(function(v){
                       //console.log("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city)
                        $("h3").html("名称："+v.user +" 邮箱："+v.email+" 城市："+v.city); 
                    });    
                }     
            }
        });
    }
}