@extends('layouts.mediawave')

@section('content')
<?php

echo '<img src="'.$_POST['img_screenshot'].'" />';
$filteredData=substr($_POST['img_screenshot'], strpos($_POST['img_screenshot'], ",")+1);
$unencodedData=base64_decode($filteredData);
file_put_contents('screenshot.png', $unencodedData);

?>
@endsection
