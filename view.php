<?php
include 'includes/header.php';
header('Cache-Control: max-age=300');
$slug = $_GET['phim'];
$movie = './movie/'.$slug.'.php';
$list = './list/'.$slug.'.php';
if (file_exists($movie)) {
include $movie;

if (time() > ($time + 600)) {
$html = file_get_contents('https://api-hh.blogspot.com/2023/04/'.$slug.'.html');
$info = explode('</div>', explode('<div class="home">', $html)['1'])['0'];
$thumb = explode('"', explode('src="', $info)['1'])['0'];
$noidung = explode('</td>', explode('max-width:1px;">', $info)['1'])['0'];
$phim = explode("<td>", $info);
$tenphim = explode("</td>", $phim['2'])['0'];
$tengoc = explode("</td>", $phim['3'])['0'];
$stt = explode("</td>", $phim['4'])['0'];
$nam = explode("</td>", $phim['5'])['0'];
$hd = explode("</td>", $phim['6'])['0'];
$quocgia = explode("</td>", $phim['7'])['0'];

$nd = '<?php $time="'.time().'"; $tenphim="'.$tenphim.'"; $tengoc="'.$tengoc.'"; $noidung="'.$noidung.'"; $quocgia="'.$quocgia.'"; $stt="'.$stt.'"; $nam="'.$nam.'"; $hd="'.$hd.'"; $thumb="'.$thumb.'"; ?>';
$myfile = fopen($movie, "w");
fwrite($myfile, $nd);
fclose($myfile);
include $option;

$list0 = explode('</div>', explode('<div class="list">', $html)['1'])['0'];
$list0 = preg_replace('/\R+/', "\n", trim($list0));
$myfile1 = fopen($list, "w");
fwrite($myfile1, $list0);
fclose($myfile1);    
}

} else {
$html = file_get_contents('https://api-hh.blogspot.com/2023/04/'.$slug.'.html');
$info = explode('</div>', explode('<div class="home">', $html)['1'])['0'];
$thumb = explode('"', explode('src="', $info)['1'])['0'];
$noidung = explode('</td>', explode('max-width:1px;">', $info)['1'])['0'];
$phim = explode("<td>", $info);
$tenphim = explode("</td>", $phim['2'])['0'];
$tengoc = explode("</td>", $phim['3'])['0'];
$stt = explode("</td>", $phim['4'])['0'];
$nam = explode("</td>", $phim['5'])['0'];
$hd = explode("</td>", $phim['6'])['0'];
$quocgia = explode("</td>", $phim['7'])['0'];

$nd = '<?php $time="'.time().'"; $tenphim="'.$tenphim.'"; $tengoc="'.$tengoc.'"; $noidung="'.$noidung.'"; $quocgia="'.$quocgia.'"; $stt="'.$stt.'"; $nam="'.$nam.'"; $hd="'.$hd.'"; $thumb="'.$thumb.'"; ?>';
$myfile = fopen($movie, "w");
fwrite($myfile, $nd);
fclose($myfile);
include $option;

$list0 = explode('</div>', explode('<div class="list">', $html)['1'])['0'];
$list0 = preg_replace('/\R+/', "\n", trim($list0));
$myfile1 = fopen($list, "w");
fwrite($myfile1, $list0);
fclose($myfile1);

}
?>

<div class="postbody">
<article id="post-169" class="post-169 hentry" itemscope="itemscope" itemtype="http://schema.org/CreativeWorkSeries"><div class="ts-breadcrumb bixbox"><ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="/"><span itemprop="name"><font color="limegreen">Trang Chủ</font></span></a><meta itemprop="position" content="1"></li> / 
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="<?php echo '/'.$slug; ?>.html"><span itemprop="name"><font color="yellow"><?php echo $tenphim; ?></font></span></a><meta itemprop="position" content="2"></li></ol></div><div class="bixbox zphimle">
    


<div class="bigcontent" style="min-height:auto;padding-bottom: 30px;"><div class="thumbook"><div class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    
<img src="<?php echo $thumb;?>"  itemprop="image" title="<?php echo $tenphim; ?>" alt="<?php echo $tenphim; ?>"/>
</div>

<div class="rt">

</div>
</div><div class="infox"><h1 class="entry-title" itemprop="name"><font color="yellow"><?php echo $tenphim; ?></font></h1>
<h3 style="padding-bottom:5px" class="entry-title" itemprop="name"><font color="white"><?php echo $tengoc; ?></font></h3>
<div class="ninfo">
    
<div class="info-content"><div class="spe">
<span style="padding-bottom:5px"><b>💎 Tình Trạng: </b> Tập <?php echo $stt; ?></span>

<span style="padding-bottom:5px"><b>🌍 Quốc Gia:</b> <a href="/Quoc-Gia/<?php echo $quocgia; ?>/Trang-1.html"><font color="magenta"><?php echo $quocgia; ?></font></a></span> 
<span style="padding-bottom:5px"><b>🎡 Thể Loại:</b> <?php echo $theloai; ?></span> 



<?php if ($sotap > 0) { ?>
<span style="padding-bottom:5px"><b>⏰ Số Tập :</b> <?php echo $sotap; ?> Tập</span>  
<?php } else { ?>
<span style="padding-bottom:5px"><b>⏰ Thời Lượng:</b> <?php echo $tg; ?> Phút</span>  
<?php } ?>
<span style="padding-bottom:5px"><b>📻 Phát Hành:</b> <a href="#"><?php echo $nam; ?></a></span> 
<span style="padding-bottom:5px"><b>💚 Lượt Xem:</b> <time itemprop="dateModified">~</time></span></div>

<?php
$list0 = file_get_contents($list);
$first = explode('|', $list0)['0'];
?>

<div class="genxed"><a style="padding: 10px;font-size:15px;background:#4cae4c;color: #fff;" href="<?php echo '/'.$first.'/'.$slug; ?>.html"><b>Xem Phim 🎬</b></a></div>
</div></div>


</div></div>

</div>


<div class="bixbox synp" style="margin-bottom: 7px;">

<div class="releases"><h2>📚 Danh Sách Tập</h2></div>

<div style="display: flex; flex-wrap: wrap; justify-content: left; max-height: 600px; overflow: auto; overflow-x: hidden; padding: 10px;">
<style type="text/css">
.list-item-episode {
    background: #333232;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 5px;
    border: 1px solid #4e4e4e;
    font-size: 13px;
    width: 5%;
    box-sizing: border-box; 
}
@media only screen and (max-width: 768px) {
.list-item-episode {
    width: 10%;
}
}
@media only screen and (max-width: 450px) {
.list-item-episode {
    width: 20%;
}
}

</style>

<?php
$list1 = preg_replace('~\\R~u', "\n", $list0);
$list1 = explode("\n", $list1);
foreach ($list1 as $list1) {
$get_tap = explode("|", $list1)['0'];    
?>

<a class="list-item-episode" href="<?php echo '/'.$get_tap.'/'.$slug; ?>.html"  style="<?php if ($get_tap == $tap) echo 'background-color: #ce6464;color: yellow;'; ?>">
<span><?php echo $get_tap; ?></span>
</a>
<?php } ?>

</div></div>


<div class="bixbox synp" style="text-align: justify;"><div class="releases"><h2>📝 Nội Dung</h2></div><div class="entry-content" itemprop="description"><p><?php echo $noidung; ?></p></div></div>


</article></div> 

<?php
include 'includes/chat.php';
?>

<div class="clear"></div>
</div></div>


<?php
include 'includes/footer.php';
?>
