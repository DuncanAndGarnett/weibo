<link type="text/css" rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/css/admin/base.css') }}" />
<style>
    table{
        width:880px;
	border-collapse: collapse;
	border:0;
        margin-left: 20px;
        margin-top: 20px;
    }
    p{
         
        margin-top: 20px;
    }
    
</style>
<center>
    <form method="post" action="{{url("./Admin/user")}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <p>
            <input type="text" name="keyword" value="{{$keyword}}" placeholder="请输入要搜素的内容" />
            <input type="submit" value="查找" />
        </p>
    </form>
<table border='1' class='bordered'>
    <tr>
        <td>#</td><td>账号</td><td>昵称</td><td>创建时间</td><td>操作</td>
    </tr>
    @foreach($users as $tmp)
    <tr>
        <td>{{$tmp->uid}}</td>
        <td>{{$tmp->uname}}</td>
        <td>{{$tmp->nickname}}</td>
        <td>{{$tmp->created_at}}</td>
        <td><a href=''>编辑</a> | <a href="">删除</a></td>
    </tr>
    @endforeach
</table>

    <p>
    {{$users->appends(['keyword'=>$keyword])->render()}}
    </p>
</center>

