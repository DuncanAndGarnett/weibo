    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/admin/base.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
        <script src="{{ asset('/js/jquery-2.0.2.min.js') }}" type="text/javascript"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>
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
    <form method="post" action="{{url("/Admin/user")}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <p>
            <input type="text" name="keyword" value="{{$keyword}}" placeholder="请输入要搜素的内容" />
            <input type="submit" value="查找" />
        </p>
    </form>
    {{session("info")}}
<table border='1' class='bordered'>
    <tr>
        <td>#</td><td>账号</td><td>昵称</td><td>性别</td><td>创建时间</td><td>所属分组</td><td>操作</td>
    </tr>
    @foreach($users as $tmp)
    <tr>
        <td>{{$tmp->uid}}</td>
        <td>{{$tmp->uname}}</td>
        <td>{{$tmp->nickname}}</td>
         <td>{{$tmp->sex}}</td>
        <td>{{$tmp->created_at}}</td>
        <td>
           <select name="groupid" uid="{{$tmp->uid}}">
                        @foreach ($groups as $group)
                            @if ($tmp->groupid == $group->id)
                                <option value="{{$group->id}}" selected>{{$group->title}}</option>
                            @else
                                <option value="{{$group->id}}">{{$group->title}}</option>
                            @endif
                        @endforeach
            </select>
        </td>
        <td><a href="/Admin/user/edit/{{$tmp->uid}}">编辑</a> | <a href="/Admin/user/destroy/{{$tmp->uid}}">删除</a></td>
    </tr>
    @endforeach
</table>

    <p>
    {!!$users->appends(['keyword'=>$keyword])->render()!!}
    </p>
    <script src="{{asset("/js/admin/user_index.js")}}"></script>
</center>

