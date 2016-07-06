
<html>
    <head>
        <meta charset="utf-8"/>
        <title>注册页</title>
        <link rel="stylesheet" href="{{asset('/css/homestrap/css/zc.css')}}"/> 

    </head>
    <body>
        <!------------------------------------------------->
   
        <!------------------------------------------------->
        <div id="big">

            <div class="btfont">
                    <h3>注册</h3>
            </div>
            <div class="biaodan">
                <div class="tishi">
                        <p>请填写</p>
                </div>
                <form action="/Home/zc" method="post">
                    <table width="380" border="0" cellspacing="15">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <tr>
                                <td class="you">账号<span> *</span></td>
                                <td class="zuo"><input type="text" name="uname"/></td>
                            </tr>
                            <tr>
                                <td class="you">密  码<span> *</span></td>
                                <td class="zuo"><input type="password" name="password"/></td>
                            </tr>
                            <tr>
                                <td class="you">确认密码<span> *</span></td>
                                <td class="zuo"><input type="password" name="repassword"/></td>
                            </tr>
                            <tr>
                                <td class="you">昵称<span> *</span></td>
                                <td class="zuo"><input type="text" name="nickname""/></td>
                            </tr>
                            <tr>
                                <td class="you">性别<span> *</span></td>
                                <td>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="sex" id="fe" value="男"checked/><label for="fe">男</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="sex" id="f" value="女"/><label for="f">女</label>
                                </td>

                            </tr>

                            <tr style="text-align:center;">
                                    <td class="bb" colspan="2">
                                        <input type="submit" value="注册"/>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="reset" value="重置"/>
                                    </td>
                            </tr>
                    <div id="err" >
                    @if(count($errors)>0)
                        <ul>
                        @foreach($errors->all() as $v)
                            <li><span><font color="red">{{$v}}</font></span></li>
                        @endforeach
                        </ul>
                    @endif
                </div>
                    </table><!--{{ session("info") }}?????????-->
                     
            
                </form>
                
            </div>
            <div class="butdl">
                <h3>已经注册？</h3>
                <a href="#"><button>去登陆</button></a>
            </div>
	</div>
    </body>
</html>