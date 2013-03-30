<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tiaozao">
    <meta name="author" content="hywang">
    <link href="<?php echo (THEME_RESOURCE); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo (THEME_RESOURCE); ?>css/bootstrap_cover.css" rel="stylesheet">
    <style>
		#header .container {width: auto; padding: 0 20px;}
		#menu, #content {margin-top: 40px;}
		#menu {position: fixed; width: 25%; border-right: 1px solid #eee; overflow: auto;}
		#content {width: 74%;}
	</style>
  </head>
  <body>
    <div id="header" class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">
            湖工大在线
          </a>
          <ul class="nav">
            <li class='active'>
              <a href="#">
                跳蚤市场
              </a>
            </li>
            <li>
              <a href="#">
                南湖呓语
              </a>
            </li>
            <li>
              <a href="#">
                新闻网
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	<div id="menu" class='pull-left'>
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#queryType1" data-toggle='tab'>全部信息</a>
				</li>
				<li>
					<a href="#queryType2" data-toggle='tab'>出售信息</a>
				</li>
				<li>
					<a href="#queryType3" data-toggle='tab'>求购信息</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="queryType1">
					<form class="navbar-form input-append">
						<input type="hidden" name="queryType" value="0">
						<input type="text" class="" name="queryStr" class="queryStr">
						<input type="submit" class="btn" value="查询"></input>
					</form>
				</div>
				<div class="tab-pane" id="queryType2">
					<form class="navbar-form input-append">
						<input type="hidden" name="queryType" value="1">
						<input type="text" class="span3" name="queryStr" class="queryStr">
						<input type="submit" class="btn" value="查询"></input>
					</form>
				</div>
				<div class="tab-pane" id="queryType3">
					<form class="navbar-form input-append">
						<input type="hidden" name="queryType" value="2">
						<input type="text" class="span3" name="queryStr" class="queryStr">
						<input type="submit" class="btn" value="查询"></input>
					</form>
				</div>
			</div>
		</div>
		<div id="goodsCat">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							电脑外设
						</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">全部</a>
								</li>
								<li>
									<a href="#">鼠标</a>
								</li>
								<li>
									<a href="#">键盘</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							日用家居
						</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">水桶</a>
								</li>
								<li>
									<a href="#">脸盆</a>
								</li>
								<li>
									<a href="#">拖把</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							图书资料
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							娱乐休闲
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							运动器材
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							房屋租赁
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							娱乐休闲
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							运动器材
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							房屋租赁
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">教材</a>
								</li>
								<li>
									<a href="#">小说</a>
								</li>
								<li>
									<a href="#">资料</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
          </div>			
		</div>
	</div>
	<div id="content" class='pull-right'>
		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页
		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found
		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found
		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-2.jjshouse.com/version	
		302 Found

		nginx
		http://us-east-fe-3.jjshouse.com/version	
		302 Found

		nginx
		http://east.jjshouse.com/version	44870
		http://us-east-fe-1.jenjenhouse.com/version	44870
		http://us-east-fe-2.jenjenhouse.com/version	
		http://us-east-fe-4.jenjenhouse.com/version	44870
		http://east.jenjenhouse.com/version	44870
		http://us-east-fe-1.jennyjoseph.com/version	44870
		http://us-east-fe-2.jennyjoseph.com/version	
		http://us-east-fe-3.jennyjoseph.com/version	44870
		http://us-east-fe-1.dressdepot.com/version	42801
		http://us-east-fe-2.dressdepot.com/version	42801
		http://east.jennyjoseph.com/version	44870
		http://t.jjshouse.com/osticket/version	45891
		http://t.jenjenhouse.com/osticket/version	45891
		http://www.amormoda.com/version	45815
		http://cms.jjshouse.com/version	
		302 Found

		nginx
		http://cms.jenjenhouse.com/version	
		302 Found

		nginx
		http://fe-test.jjshouse.com/version	44870
		http://fe-cms.jjshouse.com/version	45901
		http://fe-editor.jjshouse.com/version	44870

		后台管理 首页		http://us-east-fe-1.jjshouse.com/version	
		302 Found
	</div>
    <script src="<?php echo (THEME_RESOURCE); ?>js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo (THEME_RESOURCE); ?>js/bootstrap.js"></script>
	<script type="text/javascript">
		var menuHeight = $(window).height() - $('#header').height();
		$('#menu').height(menuHeight);
	</script>
  </body>
</html>