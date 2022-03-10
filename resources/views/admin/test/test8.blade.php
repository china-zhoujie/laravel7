<!DOCTYPE html>
<html>
    <head>
       <script type="text/javascript" src="http://php-acad.28sjw.com/Statics/Assets/js/jquery.min-3.2.1.js"></script>
       <script type="text/javascript">
        	$(function(){
        		$('img').click(function(){
        			$(this).attr('src','{{captcha_src()}}' + '&_=' + Math.random());
        		});
        	});
        </script>
    </head>
    <body>
        <form class="" action="admin_test9" method="post" enctype="multipart/form-data">
            姓名：<input type="text" name="name" id="" value="" placeholder="请输入姓名"/><br/>
            年龄：<input type="number" name="age" id="" value="" placeholder="请输入年龄"/><br/>
            email：<input type="email" name="email" id="" value="" placeholder="请输入邮箱"/><br/>
                头像：<input type="file" name="touxiang"></br>
                验证码：<input type="text" name="yzm" value="" maxlength="5"><img src="{{captcha_src()}}" alt=""/><br>
            {{csrf_field()}}
            <!--<input type="hidden" name="_token" id="" value="{{csrf_token()}}" placeholder=""/><br/>-->
            <input type="submit" name="" id="" value="提交" />
        </form>
        @if(count($errors) > 0)
            <div class="alter alter-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>