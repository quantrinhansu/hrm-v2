<!DOCTYPE html>
<html>
<head>
	<title>Import</title>
</head>
<body>
<form action="import" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="import_file">
	<input type="submit" value="Import">
</form>
</body>
</html>