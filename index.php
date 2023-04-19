<?php
include 'includes/header.php';
header('Cache-Control: max-age=300');
$page = $_GET['page'];
$type = $_GET['type'];
?>
<title><?php echo $slogan;?></title>
<meta name="description" content="<?php echo $description;?>" />
<link rel="canonical" href="###" />
<meta property="og:title" content="<?php echo $slogan;?>" />
<meta property="og:description" content="<?php echo $description;?>" />
<meta property="og:url" content="###" />
<meta property="og:image" content="https://media.discordapp.net/attachments/924155580124385280/1072038465899859999/zuighe4.png" />
 

<div class="postbody" style="width:100%"><div class="bixbox">
<table width='100%'><tr>
  <td width='14%'><a href='/index.php?type=T2'><button style='width:100%; color:white; padding: 10px 5px; background: #c31432;background: -webkit-linear-gradient(to right, #c31432, #240b36);background: linear-gradient(to right, #c31432, #240b36);'><b>T2</b></button></a></td>
  <td width='14%'><a href='/index.php?type=T3'><button style='width:100%; color:white; padding: 10px 5px; background: #009fff; background: -webkit-linear-gradient(to right, #009fff, #ec2f4b);background: linear-gradient(to right, #009fff, #ec2f4b);'><b>T3</b></button></a></td>
  <td width='14%'><a href='/index.php?type=T4'><button style='width:100%; color:white; padding: 10px 5px; background: #cc5333; background: -webkit-linear-gradient(to right, #cc5333, #23074d); background: linear-gradient(to right, #cc5333, #23074d);'><b>T4</b></button></a></td>
  <td width='14%'><a href='/index.php?type=T5'><button style='width:100%; color:white; padding: 10px 5px; background: #000000; background: -webkit-linear-gradient(to left, #000000, #0f9b0f); background: linear-gradient(to left, #000000, #0f9b0f);'><b>T5</b></button></a></td>
  <td width='14%'><a href='/index.php?type=T6'><button style='width:100%; color:white; padding: 10px 5px; background: #00bf8f; background: -webkit-linear-gradient(to right, #00bf8f, #001510); background: linear-gradient(to right, #00bf8f, #001510);'><b>T6</b></button></a></td>
  <td width='14%'><a href='/index.php?type=T7'><button style='width:100%; color:white; padding: 10px 5px;background: #eb5757; background: -webkit-linear-gradient(to right, #eb5757, #000000); background: linear-gradient(to right, #eb5757, #000000);'><b>T7</b></button></a></td>
  <td width='14%'><a href='/index.php?type=CN'><button style='width:100%; color:white; padding: 10px 5px;background: #03001e; background: -webkit-linear-gradient(to left, #03001e, #7303c0, #ec38bc, #fdeff9); background: linear-gradient(to left, #03001e, #7303c0, #ec38bc, #fdeff9);'><b>CN</b></button></a></td></tr></table>
<div class="releases"><h3>Phim Mới Cập Nhật</h3></div>
<div class="listupd"><div class="excstf">
<?php 
if ($page > 1) {
$html = curl('https://www.blogger.com/feeds/5770045855602829491/posts/default?max-results='.(20*($page - 1)).'&start-index='.(20*($page - 1)+1));
} elseif ($type) {
$html = file_get_contents('https://www.blogger.com/feeds/5770045855602829491/posts/default/-/'.$type);    
} else {
$html = curl('https://www.blogger.com/feeds/5770045855602829491/posts/default?max-results=20');    
}
$all_links = explode('div class="home"', $html);
foreach ($all_links as $all_links) {
if (strpos($all_links, 'div class="list"') == true) {  
$url = explode("'", explode("window.location='/", $all_links)['1'])['0'];
$slug = explode('.html', explode('/', $url)['2'])['0'];
$thumb = explode('"', explode('src="', $all_links)['1'])['0'];
$phim = explode("&lt;td&gt;", $all_links);
$tenphim = explode("&lt;/td&gt;", $phim['2'])['0'];
$tengoc = explode("&lt;/td&gt;", $phim['3'])['0'];
$stt = explode("&lt;/td&gt;", $phim['4'])['0'];
$nam = explode("&lt;/td&gt;", $phim['5'])['0'];
$hd = explode("&lt;/td&gt;", $phim['6'])['0'];
$quocgia = explode("&lt;/td&gt;", $phim['7'])['0'];
?>    
<article class="bs styleegg" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
<div class="bsx"> 
<a href="/<?php echo $slug;?>.html" itemprop="url" title="<?php echo $tenphim;?>" class="tip" rel="169">
<div class="limit"><div class="hotbadge" style="border-radius: 5%;width:auto;padding:5px;height:25px;background: linear-gradient(to right,#C02425 0%,#F0CB35 51%,#C02425 100%);"><b>Tập <?php echo $stt;?></b></div>

<div class="egghead"><div class="eggtitle"><font color="yellow"><?php echo $tenphim;?></font></div>
<div class="eggtitle"><?php echo $tengoc;?></div>
<div class="eggmeta"><div class="eggtype Drama"><?php echo $nam;?></div>
<div class="eggepisode"><?php $view = './view/'.$slug.'.php'; echo number_format(file_get_contents($view), 0, '', '.'); ?></div>
</div></div>
<img src="<?php echo $thumb;?>" itemprop="image" title="<?php echo $tenphim;?>" alt="<?php echo $tenphim;?>"/>
</div>
</a></div></article>
<?php } } ?>
</div></div></div>   

<div class="clear"></div>

<div class="pagination" style="display: block;">
<a style="color: white;" class="next page-numbers" href="/index.php">Đầu</a>
<a style="color: white;" class="page-numbers" href="/index.php?page=<?php if ($page > 1) { echo $page - 1; } else { echo '1'; }?>">&lt;&lt; Trước</a>
<span aria-current="page" style="color: white;" class="page-numbers current"><?php if ($page > 1) { echo $page; } else { echo '1'; }?></span>
<a style="color: white;" class="page-numbers" href="/index.php?page=<?php if ($page > 1) { echo $page + 1; } else { echo '2'; }?>">Sau &gt;&gt;</a></div>

</div>

<div class="clear"></div>
</div></div>

<?php
include 'includes/footer.php';
?>
