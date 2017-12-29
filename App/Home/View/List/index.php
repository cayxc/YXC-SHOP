<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>YXC商城</title>
		<!--引入公共头部*****************-->
		{{include file="../Common/indexHead"}}
		<!--菜单栏、轮播图分类区开始*******************-->
		<!--菜单栏、轮播图分类区结束*******************-->
		
		<!--首页区开始*******************-->
		<ul id="ListhomeBOX">
			<div class="homeTotal">
				共<span> {{$gnumber}} </span>件
			</div>
			<!--首页-->
			<li style="color: #E6E6E6;">
				<a href="{{U('Index/index')}}" target="_blank">首页</a>
			</li>
			<!--手机/手机配件--> 
			{{foreach from="$cname" value="$v"}}
				<li style="color: #E6E6E6;">></li>
				<li>
					<a href="{{U('index',['cid'=>$v['cid']])}}" {{if value="$_GET['cid'] eq $v['cid']"}}style="color:#FF335A;"{{endif}} >{{$v['cname']}}</a>
				</li>
			{{endforeach}}
		</ul>
		<!--首页区结束*******************-->
		
		<!--品牌框区开始*******************-->
		<div id="screenBox">	
			
			<div class="screenBoxList">
				<dl>
					<dt>分类:</dt>
					<dd>
						<div class="listsInner">
							<ul>
								<li>
									<a href="javascript:void(0);" style="color: #FF335A;">不限</a>
								</li>
								{{foreach from="$cate" value="$v"}}
									<li>
										<a href="{{U('index',['cid'=>$v['cid']])}}" {{if value="$_GET['cid'] eq $v['cid']"}}style="color:#FF335A;"{{endif}} >{{$v['cname']}}</a>
									</li>
								{{endforeach}}
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			
			<div class="screenBoxList">
				<dl>
					<dt>品牌:</dt>
					<dd>
						<div class="listsInner">
							<ul>
								<li>
									<a href="" style="color: #FF335A;">不限</a>
								</li>
								{{foreach from="$brands" value="$v"}}
									<li>
										<a href="{{U('List/index',array('cid'=>$_GET['cid'], 'bid'=>$v['bid']))}}" {{if value="$v['bid'] eq $_GET['bid']"}} style="color: #FF335A;" {{endif}}>{{$v['bname']}}</a>
									</li>
								{{endforeach}}
							</ul>
						</div>
					</dd>
				</dl>
			</div>
						
			<!--其他-->
			{{foreach from="$combineAttr" key="$k" value="$v"}}
				<?php
					$temp = $param;
					$temp[$k]=0;
				?>
				<div class="screenBoxList">
					<dl>
						<dt>{{$v['name']}}:</dt>
						<dd>
							<div class="listsInner">
								<ul class="clearCate">
									<li>
										<a href="{{U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp)])}}" {{if value="$param[$k] eq 0"}}style="color: #FF335A;"{{endif}} >不限</a>
									</li>
									{{foreach from="$v['value']" value="$value"}}
									<?php 
										$temp[$k]=$value['gaid'];
									?>
										<li>
											<a href="{{U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp),'bid'=>$_GET['bid']])}}" {{if value="$value['gaid'] eq $param[$k]"}}style="color: #FF335A;"{{endif}}>{{$value['gavalue']}}</a>
										</li>
									{{endforeach}}
								</ul>							
							</div>						
						</dd>
					</dl>
				</div>
			{{endforeach}}
		</div>
		<div id="shadow"></div> <!--阴影-->		
		<div class="moreChoice">
			更多选项
			<i></i>
		</div>
		<!--品牌框区结束*******************-->
		
		<!--商品排序导航开始*******************-->
		<div id="goodsNav">
			<!--默认-->
			<ul id="navLeftBOX">
				<!--默认-->
				<li><a href="javascript:;">默认</a></li>
				<!--<li><a href="">高人气</a></li>
				<li><a href="">高销量</a></li>
				<li><a href="">价格由低到高</a></li>
				<li><a href="">价格由高到低</a></li>
				<li><a href="">发货地></a></li>-->
				<!--价格排序*********************-->
				<!--<li class="navPrice">
					<div class="navPriceOrder">
						<form id="PriceForm" action="" method="post">
							<input type="text" placeholder="￥" maxlength="10" />
							<i>-</i>
							<input type="text" placeholder="￥" maxlength="10" /><br />
							<span class="operation" --><!--style="display: none;-->
					<!--			<a id="priceClear" href="javascript:void(0)">清除</a>
								<a id="priceConfirm" class="confirm" href="javascript:void(0)">确定</a>
							</span>
						</form>
					</div>
				</li>-->
			</ul>
		</div>
		<!--商品排序导航结束*******************-->
		
		<!--具体图片商品展示开始*******************-->
		<ul id="goodsShow">
			{{foreach from="$goodsFind" value="$v"}}
				<li>
					<a href="{{U('Detail/index',['zol_goods_gid'=>$v['gid'],'cid'=>$_GET['cid']])}}" title="{{$v['gname']}}&nbsp;&nbsp;点击查看详情">
						<img src="{{$v['glist_map']}}"/>
					</a>
					<div class="title">
						<a href="{{U('Detail/index',['zol_goods_gid'=>$v['gid']])}}">
							{{$v['gname']}}
						</a>
					</div>
					<div class="price">
						<span id="">&yen;{{$v['gprice']}}</span>
					</div>
					<div class="volume">						
						<span><em></em></span>
						<span>查看次数 :<em> {{$v['gclick']}} 次</em></span>
					</div>
					<div class="shopInfor">
						<a href=""></a>
					</div>
				</li>
			{{endforeach}}
			{{if value="$goodsFind eq null"}}
				<div style="height: 200px; width: 1200px;margin: 20px auto;text-align: center;line-height: 200px; background: #F5F5F5; color: #FF335A; border: 1px solid #E6E6E6;">
					抱歉没有找到您想要的产品,你可以去<a href="{{U('Index/index')}}" target="_blank" style="color: #3366CC; font-size: 20px;">商城</a>选购喜欢的商品	
				</div>
			{{endif}}	
	    </ul>
		
		<!--具体商品图片展示结束*******************-->
		
		<!--翻页区开始**********************-->
		<!--<ul id="page">
			<li>< 上一页</li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li></li>
			<li>下一页 ></li>
		</ul>-->
		<!--翻页区结束**********************-->
		
		<!--正在进行中的活动区开始**********************-->
		<!--<div id="HOT">正在进行中的活动</div>
		<ul id="hotImg">
			<a href=""><img src="./Public/Home/images/ChMkJlejRmaIEaHjAAAwF1ZZQL8AAUKawEB4PwAADAv657.jpg" alt="" /></a>
			<a href=""><img src="./Public/Home/images/ChMkJ1eimBSIDIu2AAElP9YQj6UAAUJAgO9OasAASVX407.jpg" alt="" /></a>
			<a href=""><img src="./Public/Home/images/ChMkJ1ej76SISqAyAADUy_qZVcsAAULHgD0yl0AANTj742.jpg" alt="" /></a>
			<a href=""><img src="./Public/Home/images/ChMkJ1eWqdCIfWpMAACtol7Dzi4AAT1ZgPwdXoAAK26940.jpg" alt="" /></a>
		</ul>-->
		<!--正在进行中的活动区结束**********************-->
		
		<!--底部搜索区开始*******************-->
		
		<!--<div id="searchBottomBox">
			<input class="searchContent" type="text" placeholder="请输入要搜索的内容"/></input>	
			<input class="searchBtn" type="submit" value="搜 索"/></input>	
		</div>-->
			
		<!--底部搜索区结束*******************-->
		
		<!--引入公共底部*****************-->
		{{include file="../Common/indexFooter"}}
		
		<!--引入公共右侧栏*****************-->
		{{include file="../Common/indexRight"}}
		
	</body>
</html>
