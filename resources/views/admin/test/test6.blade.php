<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form class="" action="{{route('t7')}}" method="post" accept-charset="utf-8">
            账号：<input type="text" name="name" id="" value="" placeholder="请输入账号"/><br/>
            金额：<input type="number" name="fee" id="" value="" placeholder="请输入金额"/><br/>
            <!--添加隐藏表单token验证-->
            <input type="hidden" name="_token" id="" value="{{csrf_token()}}" />
            <input type="submit" name="" id="" value="转账" />
        </form>
    </body>
</html>