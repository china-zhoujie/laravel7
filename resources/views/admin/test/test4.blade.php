<html>
<head>
<body>
    循环操作<br/>
    @foreach($data as $k=>$v)
        {{$v->id}} - {{$v->name}} -{{$v->age}} -{{$v->email}}<br/>
    
    @endforeach
 <hr>   
    判断操作<br/>
    今天的星期数字是{{$day}}<br/>
    @if($day==1)
    星期一
    @elseif($day==2)
    星期二
    @elseif($day==3)
    星期三
    @elseif($day==4)
    星期四
    @elseif($day==5)
    星期五
    @elseif($day==6)
    星期六
    @else
    星期天
    @endif
</body>
</html>