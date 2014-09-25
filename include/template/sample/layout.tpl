<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<link rel="stylesheet" type="text/css" href="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/bootstrap-select/bootstrap-select.min.css">
<style type="text/css">
.dropdown-menu.multi-column {
    width: 400px;
}
 
.dropdown-menu.multi-column .dropdown-menu {
    display: block !important;
    position: static !important;
    margin: 0 !important;
    border: none !important;
    box-shadow: none !important;
}
@media screen and (max-width: 991px){
.kolumny{
    height: 200px;
    overflow:scroll;
}
}

@media screen and (min-width: 992px){
.kolumny{
    -moz-column-count:2; /* Firefox */
    -webkit-column-count:2; /* Safari and Chrome */
    column-count:2;
    width: 500px;
}
}
ul.inline li{display:inline-block;padding:2px 4px;width:120px;}
</style>
<div class="well">
<select id="sel0" class="selectpicker" data-live-search="true" data-size="10" data-width="150px">
    <option data-subtext="Heinz1" value="1">维生素</option>
    <option data-subtext='ss' value="2">你好</option>
    <option data-subtext='<ul class="inline" style="display:inline-block"><li>喜马拉雅</li><li>300mg*100粒</li><li>印度</li><li>原料取材地道，易吸收，出口欧美</li><li></li>￥230.00元</ul>' value="3">大豆卵磷脂</option>
</select>
	<ul id="multicol-menu" class="nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">MultiCol Menu <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>a</th><th>b</th><th>c</th><th>d</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td><td>2</td><td>3</td><td>4</td>
						</tr>
					</tbody>
				</table>
            </li>
        </ul>
    </li>
</ul>
</div>
<div class="well">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">wybierz region<b class="caret"></b></a>
		<ul class="dropdown-menu kolumny">
			<li><a href="#"><strong>Górny Śląsk</strong></a></li>
			<li><a href="#">powiat będziński</a></li>
			<li><a href="#">powiat bielski</a></li>
			<li><a href="#">powiat bieruńsko-lędziński</a></li>
			<li><a href="#">powiat cieszyński</a></li>
			<li><a href="#">powiat częstochowski</a></li>
			<li><a href="#">powiat gliwicki</a></li>
			<li><a href="#">powiat kłobucki</a></li>
			<li><a href="#">powiat lubliniecki</a></li>
			<li><a href="#">powiat mikołowski</a></li>
			<li><a href="#">powiat myszkowski</a></li>
		</ul>
	</li>
</div>
<div class="well">
		<ul class="nav">
		  <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Heading</a>
		    <div class="dropdown-menu multi-column">
		      <div class="container-fluid">
		        <div class="row-fluid">
		          <div class="span6">
		            <ul class="dropdown-menu">
		              <li><a href="#">Col 1 - Opt 1</a></li>
		              <li><a href="#">Col 1 - Opt 2</a></li>
		            </ul>
		        </div>
		        <div class="span6">
		            <ul class="dropdown-menu">
		              <li><a href="#">Col 2 - Opt 1</a></li>
		              <li><a href="#">Col 2 - Opt 2</a></li>
		            </ul>
		          </div>
		        </div>
		      </div>
		    </div>
		  </li>
		</ul>
</div>
<div class="row-fluid">
	<form class="form-horizontal">
		<div class="well clearfix">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="input01">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input02">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input02">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="input01">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Text input</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01">
						<p class="help-block">Supporting help text</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


<form>
	<fieldset>
  	<legend>Legend text</legend>
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <label>First Name</label>
                <input type="text" class="span12" placeholder="">
                <p class="help-block">Supporting help text</p>
            </div>
            <div class="span6">
                <label>Last Name</label>
                <input type="text" class="span12" placeholder="Type something…">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <label>First Name</label>
                <input type="text" class="span12" placeholder="">
            </div>
            <div class="span6">
                <label>Last Name</label>
                <input type="text" class="span12" placeholder="Type something…">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <label>First Name</label>
                <input type="text" class="input-xlarge" placeholder="">
            </div>
            <div class="span6">
                <div class="control-group">
					<label class="control-label">Business Name:  </label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="business_name" id="business_name">
					</div>
				</div>
            </div>
        </div>
    </div>
    </fieldset>
</div>
    </form>

<div class="row-fluid">
		<form action="" class="form-horizontal" name="user_account_add" id="user_account_add" method="post">
			<div class="span12">
				<div class="well clearfix">
					<fieldset>
						<div class="span5">
							<legend>Business Info</legend>
							<input type="hidden" name="action"  value="save" />
							<div class="control-group">
								<label class="control-label">Business Name:  </label>
								<div class="controls">
								<input type="text" class="input-xlarge" name="business_name" id="business_name">
								</div>
							</div>
							<legend>Owner Info</legend>
							<div class="control-group">
								<label class="control-label">Firstname: </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="fname" id="owners_name">
									<p class="help-block">Supporting help text</p>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Lastname: </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="Lname" id="owners_name">
								</div>
							</div>
						</div>
						<div class="span7">
							<legend>Business Operation Location</legend>
							<div class="control-group">
								<label class="control-label">Street Address</label>
								<div class="controls">
									<input type="text" class="input-xlarge"  name="address" id="address" >
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">City</label>
								<div class="controls">
									<input type="text" class="span3"  name="city" id="city">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">State</label>
								<div class="controls">
									<input type="text" class="span3"  name="state" id="state">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Zip</label>
								<div class="controls">
									<input type="text" class="span3"  name="zip" id="zip">
								</div>
							</div>
						</div>
						</fieldset>
					<button class="btn btn-primary">Submit</button>
					<button class="btn">Clear</button>
				</div>
			</div>
		</form>

</div>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/bootstrap-select/bootstrap-select.min.js" ></script>
  <script type="text/javascript">
  $(document).ready(function() {
	$('.selectpicker').selectpicker();
  });
  </script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>