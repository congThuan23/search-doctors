Đây là trang bác sỹ
<?php
$name = Session::get('username');
$id = Session::get('userid');

echo 'ID bác sỹ: '.$id. ' ||| Tên bác sỹ: '.$name;
?>
