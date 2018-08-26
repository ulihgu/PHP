//打开查询用户登录
$("#inputDate").click(function () {
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
           // alert("success");
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

