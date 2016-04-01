/**
 * Created by chenq on 2016/3/29.
 */
var flag = false;
function check(){
    if($('input:text').val().length<1){
        alert('请输入您的用户名');
        return;
    } else if($('input:password').val().length<1){
        alert('请输入您的密码');
        return;
    }



    if(flag){
        var login = document.getElementById('login');
        login.submit();
    }
}


$('input:password').bind('keyup',function(){
    if($('input:password').val().length<6){
        flag=false;
    }else{
        flag = true;
    }
});


//$('input:password').bind('keyup',function(){
//    if($('input:password').val().length<6){
//        $('#pwd').removeClass('mes_ok');
//        $('#pwd').addClass('mes_error');
//        $('#pwd').text('密码长度6位以上');
//        flag=false;
//    }else{
//        $('#pwd').removeClass('mes_error');
//        $('#pwd').addClass('mes_ok');
//        $('#pwd').text('Ok');
//        flag = true;
//    }
//});