<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GEVIL</title>
	
</head>
<style>

	img{
		width:75%;
	}
</style>
<body>
<img src="{{URL::asset('img/404_custom_page.png')}}" alt="hoja" class="gevilIcon">
</body>
</html>