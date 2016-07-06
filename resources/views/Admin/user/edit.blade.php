<script src="{{ asset('/js/jquery-2.0.2.min')}}" type="text/javascript"></script>
<script src="{{ asset('/plugins/uploadify/jquery.uploadify.min.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('/plugins/uploadify/uploadify.css') }}" />
<link type="text/css" rel="stylesheet" href="/css/admin/user_add.css" />
<a href=""> << 返回上一级</a>
<hr />
<div  class="fl">
	<form name="edit" method="post" action="/Admin/user/update">
		<fieldset draggable="draggable">
			<legend>基本信息</legend>
			<input type="hidden" name="uid" value="{{$userRec->uid}}" />
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<p>账 号：<input type="text" name="uname" value="{{$userRec->uname}}" disabled /></p>
			<p>性 别：
				<input type="radio" name="sex" value="男" @if($userRec->sex == "男") checked @endif  />男、
					   女<input type="radio" name="sex" value="女" @if($userRec->sex == "女") checked @endif  />
			</p>
			<p>密 码：<input type="password" name="password" value="" />（*置空则不修改*）</p>
			<p>确 认：<input type="password" name="repassword" value="" /></p>
			<p>昵 称：<input type="text" name="nickname" value="{{$userRec->nickname}}" /></p>
                        <p>分组:
                            <select name="groupid">
                                @foreach($groups as $group)
                                    @if($userRec->groupid == $group->id)
                                        <option value="{{$group->id}}" selected >{{$group->title}}</option>
                                    @else
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </p>
			<p><input type="submit" value="保存" /></p>
                </fieldset>
        </form>
         <form name="upload">
		<fieldset>
			<legend>头像信息</legend>
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<input type="hidden" name="uid" value="{{$userRec->uid}}" />
			<img src="{{url($userRec->avartar)}}" id="im" width="120" />
			<input type="file" name="avartar" id="avartar" multiple="true" />
		</fieldset>
	</form>
</div>
<div class="fl">
	@if(session("info"))
	<ul>
		<li>{{session("info")}}<li>
	</ul>
	@endif
	@if (count($errors) > 0)
	<ul>
		@foreach($errors->all() as $tmp)
		<li>{{$tmp}}</li>
		@endforeach
	</ul>
	@endif
</div>
<script src="{{url('/js/admin/user_edit.js')}}"></script>

