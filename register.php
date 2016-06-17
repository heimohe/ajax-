<html>
<head>
<title>user register</title>
<meta http-equiv="content-type" content="text/html"/>
<script type="text/javascript">
	//创建ajax引擎
	function getXmlHttpObject(){
		//不同的浏览器获取xmlhttprequest对象方法不一样
		var xmlHttpRequest;
		if(window.ActiveXObject)	
		{
			xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP"); 
		}
		else{
			xmlHttpRequest=new XMLHttpRequest();
		}
			return xmlHttpRequest;
	}


	var myXmlHttpRequest="";
	function checkName(){
		//验证用户名是否存在
		myXmlHttpRequest=getXmlHttpObject();
		//判断是否创建成功
		if(myXmlHttpRequest){
			//window.alert("创建ajax引擎成功");
			//第一个参数设置请求方式
			//第二个请求的url 对哪个页面发出ajax请求（本质是http请求）
			//第三个参数使用异步机制 
			var url="/ajax/registerprocess.php?username="+$("username").value;
			//打开请求
			myXmlHttpRequest.open("get",url,true);
			//指定回调函数 chuli是函数
			myXmlHttpRequest.onreadystatechange=chuli;
			//发送请求 get写null  如果是post 写入实际数据
			myXmlHttpRequest.send(null);
		}
		else
		{
			window.alert("create ajax fail!");
		}
	}
 
	//这里我们写一个函数
	function $(id){
		return document.getElementById(id);
	}
 
	//返回时，处理函数
	function chuli(){
		//window.alert("deal function return :"+myXmlHttpRequest.readyState);
		if(myXmlHttpRequest.readyState==4&& myXmlHttpRequest.status==200){
			//取出值 根据返回信息的格式而定.text
			window.alert("service return  <------ :"+myXmlHttpRequest.responseText);
			$("myDiv").innerHTML=myXmlHttpRequest.responseText;
		}
	}
	
</script>
</head>
<body>
<form action="???" method="get">
username：<input type="text" name="username1" id="username"><input type="button" onclick="checkName();" value="test username">
<input style="border-width:0;color:red" type="text" id="myres"><br/>
password：<input type="password" name="password1"><br/>
e-mail  ：<input type="text" name="email"><br/>
<div id="myDiv"></div>
</form>
</body>
</html>
