'' <!DOCTYPE html>
<html>
<head>
    <title>这是form页面</title>
</head>
<body>
   <form action="/inster" method="post" >
       用户名: <input type="text" name="username" >
       <br>
       密码：<input type="text" name="password" >
       <br>
       <input type="submit"  value="提交">
       {{csrf_field()}}
   </form>
</body>
</html>