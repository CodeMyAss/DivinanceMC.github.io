<style>
2
.sucess{
3
color:#088A08;
4
}
5
.error{
6
color:red;
7
}
8
</style>
9
 
10
<?php
11
$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
12
$upload_exts = end(explode(".", $_FILES["file"]["name"]));
13
if ((($_FILES["file"]["type"] == "image/gif")
14
|| ($_FILES["file"]["type"] == "image/jpeg")
15
|| ($_FILES["file"]["type"] == "image/png")
16
|| ($_FILES["file"]["type"] == "image/pjpeg"))
17
&& ($_FILES["file"]["size"] < 2000000)
18
&& in_array($upload_exts, $file_exts))
19
{
20
if ($_FILES["file"]["error"] > 0)
21
{
22
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
23
}
24
else
25
{
26
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
27
echo "Type: " . $_FILES["file"]["type"] . "<br>";
28
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
29
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
30
// Enter your path to upload file here
31
if (file_exists("c:\wamp\www\upload/newupload/" .
32
$_FILES["file"]["name"]))
33
{
34
echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
35
" already exists. "."</div>";
36
}
37
else
38
{
39
move_uploaded_file($_FILES["file"]["tmp_name"],
40
"c:\wamp\www\upload/newupload/" . $_FILES["file"]["name"]);
41
echo "<div class='sucess'>"."Stored in: " .
42
"c:\wamp\www\upload/newupload/" . $_FILES["file"]["name"]."</div>";
43
}
44
}
45
}
46
else
47
{
48
echo "<div class='error'>Invalid file</div>";
49
}
50
?>
