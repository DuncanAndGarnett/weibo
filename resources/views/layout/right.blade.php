<script src="{{ asset('/plugins/uploadify/jquery.uploadify.min.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('/plugins/uploadify/uploadify.css') }}" />
<img src="{{ asset(Session::get("userData")->avartar) }}" width="120" class="fl" id="im" />
<ul>
	<li>昵称：{{ Session::get("userData")->nickname }}</li>
	<li>账号：{{ Session::get("userData")->uname }}</li>
	<li>新建：{{ Session::get("userData")->created_at }}</li>
	<li>更新：{{ Session::get("userData")->updated_at }}</li>
</ul>
<p class="clear"></p>
<form name="fm">
	<input type="hidden" name="uid" value="{{ Session::get("userData")->uid }}" />
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="file" name="avartar" id="avartar" />
</form>
<script src="{{ asset('/js/admin/index.js') }}"></script>