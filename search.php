<?php
include 'includes/header.php';
$s = $_GET['s'];
$s1 = str_replace(' ', '+', $s);
?>


<div class="postbody" style="width:100%"><div class="bixbox">
<table width='100%'><tr>
  <td width='14%'><a href='/index.php?lich=T2'><button style='width:100%; color:white; padding: 10px 5px; background: #c31432;background: -webkit-linear-gradient(to right, #c31432, #240b36);background: linear-gradient(to right, #c31432, #240b36);'><b>T2</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=T3'><button style='width:100%; color:white; padding: 10px 5px; background: #009fff; background: -webkit-linear-gradient(to right, #009fff, #ec2f4b);background: linear-gradient(to right, #009fff, #ec2f4b);'><b>T3</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=T4'><button style='width:100%; color:white; padding: 10px 5px; background: #cc5333; background: -webkit-linear-gradient(to right, #cc5333, #23074d); background: linear-gradient(to right, #cc5333, #23074d);'><b>T4</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=T5'><button style='width:100%; color:white; padding: 10px 5px; background: #000000; background: -webkit-linear-gradient(to left, #000000, #0f9b0f); background: linear-gradient(to left, #000000, #0f9b0f);'><b>T5</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=T6'><button style='width:100%; color:white; padding: 10px 5px; background: #00bf8f; background: -webkit-linear-gradient(to right, #00bf8f, #001510); background: linear-gradient(to right, #00bf8f, #001510);'><b>T6</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=T7'><button style='width:100%; color:white; padding: 10px 5px;background: #eb5757; background: -webkit-linear-gradient(to right, #eb5757, #000000); background: linear-gradient(to right, #eb5757, #000000);'><b>T7</b></button></a></td>
  <td width='14%'><a href='/index.php?lich=CN'><button style='width:100%; color:white; padding: 10px 5px;background: #03001e; background: -webkit-linear-gradient(to left, #03001e, #7303c0, #ec38bc, #fdeff9); background: linear-gradient(to left, #03001e, #7303c0, #ec38bc, #fdeff9);'><b>CN</b></button></a></td></tr></table>    
<div class="releases"><h3>Tìm Kiếm Phim <?php echo $s; ?></h3> <a class="vl" href="/Phan-Loai/Phim-Bo/Trang-1.html">Xem Thêm</a></div>
<div class="listupd"><div class="excstf">
<?php $html = file_get_contents('https://api-hh.blogspot.com/search?q='.$s1);
$all_links = explode('<div class="home">', $html);
foreach ($all_links as $all_links) {
if (strpos($all_links, '<div class="list">') == true) {  
$url = explode("'", explode("window.location='/", $all_links)['1'])['0'];
$slug = explode('/', $url)['2'];
$thumb = explode('"', explode('src="', $all_links)['1'])['0'];
$phim = explode("<td>", $all_links);
$tenphim = explode("</td>", $phim['2'])['0'];
$tengoc = explode("</td>", $phim['3'])['0'];
$stt = explode("</td>", $phim['4'])['0'];
$nam = explode("</td>", $phim['5'])['0'];
$hd = explode("</td>", $phim['6'])['0'];
$quocgia = explode("</td>", $phim['7'])['0'];
$noidung = explode('max-width:1px;">', explode("</td>", $phim['8'])['0'])['1'];
?>    
<article class="bs styleegg" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
<div class="bsx"> 
<a href="/<?php echo $slug;?>" itemprop="url" title="<?php echo $tenphim;?>" class="tip" rel="169">
<div class="limit"><div class="hotbadge" style="border-radius: 5%;width:auto;padding:5px;height:25px;background: linear-gradient(to right,#C02425 0%,#F0CB35 51%,#C02425 100%);"><b>Tập <?php echo $stt;?></b></div>

<div class="egghead"><div class="eggtitle"><font color="yellow"><?php echo $tenphim;?></font></div>
<div class="eggtitle"><?php echo $tengoc;?></div>
<div class="eggmeta"><div class="eggtype Drama"><?php echo $nam;?></div>
<div class="eggepisode"></div></div>
</div>
<img src="<?php echo $thumb;?>" itemprop="image" title="<?php echo $tenphim;?>" alt="<?php echo $tenphim;?>"/>
</div>
</a></div></article>
<?php } } ?>
</div></div></div>   


</div>


<?php
include 'includes/chat.php';
?>

<div class="clear"></div>
</div></div>

<?php
include 'includes/footer.php';
?>
