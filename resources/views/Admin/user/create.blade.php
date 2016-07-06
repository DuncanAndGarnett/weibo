<style>
    form {
        margin: 20px 80px;
    }

    form p {
        margin:10px 0;
        font:14px 宋体;
    }
    form p input[type="text"], .main_right form p input[type="password"] {
        border:1px solid #ccc;
        width:250px;
        height:24px;
        border-radius: 3px;
        box-shadow:2px 2px 3px #ddd;
        padding: 0 0 0 5px;
    }
    
</style>

<a href=""><<返回上一级</a>
<hr/>
<form name="add" method="post" action="/Admin/user/store">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <p>账号:<input type="text" name="uname" value=""/></p>
    <p>性别:<input type="radio" name="sex" value="男" checked />男、女<input type="radio" name="sex" value="女" /></p>
    <p>密码:<input type="password" name="password" value=""/></p>
    <p>确认:<input type="password" name="repassword" value=""/></p>
    <p>昵称:<input type="text" name="nickname" value=""/></p>
    <p>分组:
        <select name='groupid'>
            @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->title}}</option>
            @endforeach
        </select>
    </p>
    <input type="submit" value="添加" />
</form>
@if(session("info"))
<ul>
    <li>{{session("info")}}<li>
</ul>
@endif
@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $tmp)
    <li>{{$tmp}}</li>
    @endforeach
</ul>
@endif

