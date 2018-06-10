<!DOCTYPE html>
<html>
<head>
    <title>put提交</title>
</head>
<body>
<form action="/put" method="post">

   用户名：<input type="text" name="uresname" >
   <br>
   密码：<input type="text" name="password" >
   <br>
   <input type="submit" value="提交">
   <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
   </form>
</body>
</html>