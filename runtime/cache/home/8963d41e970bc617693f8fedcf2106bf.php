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
			<ul class="breadcrumb pull-left">
				<li>
					<strong>您当前的位置：</strong>
				</li>
				<li>
					<a href="#">跳蚤市场</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="#">商品信息</a> <span class="divider">/</span>
				</li>
				<li class="active">全部商品</li>
			</ul>
			<ul class="nav pull-right">
				<li>
					<a href="#">登录</a>
				</li>
				<li class="divider-vertical"></li>
				<li>
					<a href="#">注册</a>
				</li>
			</ul>
        </div>
      </div>
    </div>
	<div id="menu" class='pull-left'>
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#queryType2" data-toggle='tab'>出售信息</a>
				</li>
				<li>
					<a href="#queryType3" data-toggle='tab'>求购信息</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="queryType2">
					<form class="navbar-form input-append">
						<input type="hidden" name="queryType" value="1">
						<input type="text" class="span3" name="queryStr">
						<input type="submit" class="btn" value="查询"></input>
					</form>
				</div>
				<div class="tab-pane" id="queryType3">
					<form class="navbar-form input-append">
						<input type="hidden" name="queryType" value="2">
						<input type="text" class="span3" name="queryStr">
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
		<ul class="thumbnails">
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>
						<span id="productName">鞋子</span>
						<span id="productPrice">10元</span>
					</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
		</ul>
		<ul class="thumbnails">
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
		</ul>
		<ul class="thumbnails">
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
			<li class="span3">
				<div class="thumbnail">
					<img src="<?php echo (USERFILES_PRODUCTS); ?>220_220/1/demo.jpg" alt="">
					<h5>缩略项标签</h5>
					<p>缩略项标题介绍</p>
				</div>
			</li>
		</ul>
		<div class="pagination pagination-centered">
			<ul>
				<li><a href="#">Prev</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#">11</a></li>
				<li><a href="#">12</a></li>
				<li><a href="#">13</a></li>
				<li><a href="#">14</a></li>
				<li><a href="#">15</a></li>
				<li><a href="#">16</a></li>
				<li><a href="#">17</a></li>
				<li><a href="#">18</a></li>
				<li><a href="#">19</a></li>
				<li><a href="#">20</a></li>
				<li><a href="#">21</a></li>
				<li><a href="#">22</a></li>
				<li><a href="#">23</a></li>
				<li><a href="#">24</a></li>
				<li><a href="#">25</a></li>
				<li><a href="#">26</a></li>
				<li><a href="#">27</a></li>
				<li><a href="#">Next</a></li>
			</ul>
		</div>
	</div>
    <script src="<?php echo (THEME_RESOURCE); ?>js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo (THEME_RESOURCE); ?>js/bootstrap.js"></script>
	<script type="text/javascript">
		var menuHeight = $(window).height() - $('#header').height();
		$('#menu').height(menuHeight);
	</script>
  </body>
</html>