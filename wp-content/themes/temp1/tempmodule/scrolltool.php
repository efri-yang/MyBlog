<div class="scrollbtn-list"> 
	<?php qrcode(); ?>
	<a href="#" id="J_exchangelink"  class="exchangelink" title="交换友情链接">交换友情链接</a>
	
	  
   <!--  <a href="#" id="J_screenzoom"  class="screenzoom" title="宽屏"><i class="iconfont icon-quanping icon-quanping"></i></a> -->
    <a href="#" title="返回顶部" class="scrolltop" id="J_gotop"><i class="iconfont icon-fanhuidingbu"></i></a>
</div>
	<div id="J_exchangelink-layer" class="exchangelink-layer">
	  <form id="exchangelink-form">
		<table class="exchangelink-tbl">
			<tr>
				<td class="tit"><b>*</b>qq账号</td>
				<td class="para"><input type="text" class="wn-input exchangelink_owner" name="link_owner"> </td>
			</tr>
			<tr>
				<td class="tit"><b>*</b>网站名称</td>
				<td class="para"><input type="text" class="wn-input exchangelink_name" name="link_name"></td>
			</tr>
			<tr>
				<td class="tit"><b>*</b>网站地址</td>
				<td class="para"><input type="text" class="wn-input exchangelink_url" name="link_url">
						
				</td>
			</tr>
			<tr class="last">
				<td class="tit"></td>
				<td class="para"><p>例如：http://www.wnworld.com/</p></td>
			</tr>	
		</table>
		</form>
	</div>

<script type="text/javascript">
	$(function(){
		var regValidate={
			isQQ:function(values){
					var bValidate = RegExp(/^[1-9][0-9]{4,9}$/).test(values);  
		            if (bValidate) {  
		                return true;  
		            }else{  
		                return false;  
					}
			},
			isUrl:function(values){
				var strRegex = "^((https|http|ftp|rtsp|mms)://)?[a-z0-9A-Z]{3}\.[a-z0-9A-Z][a-z0-9A-Z]{0,61}?[a-z0-9A-Z]\.com|net|me|cn|cc (:s[0-9]{1-4})?/$";
				var re = new RegExp(strRegex);
				if (re.test(values)) {
					return true;
				} else {
					return false;
				}
			}
		};
		function validating(){
			var flag=true,
				$qq=$("input[name=link_owner]"),
				$name=$("input[name=link_name]"),
				$url=$("input[name=link_url]");
			if(!regValidate.isQQ($.trim($qq.val()))){
				layer.msg('亲，请填写正确的qq号码！',{
    				time: 2000
				});
				return flag=false;
			}
			if(!$.trim($name.val())){
				layer.msg('亲,请输入您的网站名称！');
				return flag=false;
			}
			if(!regValidate.isUrl($.trim($url.val()))){
				layer.msg('亲，请填写正确的网站地址哈！');
				return flag=false;	
			}
			return flag;
		}
		

		var layerload;
		$("#J_exchangelink").on("click",function(){
			layer.open({
			    type: 1,
			    maxWidth:"auto",
			    shade: [0.9, '#111'],
			    shadeClose:true,
			    title: "交换友情链接", //不显示标题
			    content: $('#J_exchangelink-layer'), //捕获的元素
			    btn: ['提交', '取消'],
			    yes: function(index, layero){ 			      
			       var isValidate=validating();
			       if(isValidate){
			       		$.ajax({
							url:"<?php echo site_url(); ?>/?action=exchangelink",
							type:"post",
							data:$("#exchangelink-form").serializeArray(),
							beforeSend:function(){
								layerload=layer.load(0, {shade:[0.5, '#111']});
							},
							success:function(data, textStatus){
								layer.close(layerload);
								if(data==0){
									layer.msg('提交失败，再来一次吧！');
								}else if(data==1){
									layer.close(index);
									layer.msg('提交成功，请耐心等待回复！');
								}else{
									layer.msg(data);
								}								
							}

						})
			       }
			    },
			    cancel: function(index){
			        layer.close(index);
			    }
			});
			return false;
		})
	})
</script>