<?php
include 'includes/header.php';
header('Cache-Control: max-age=300');
$slug = $_GET['phim'];
$tap = $_GET['tap'];
$movie = './movie/'.$slug.'.php';
$list = './list/'.$slug.'.php';
if (file_exists($movie)) {
include $movie;
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

<title><?php echo $tenphim; ?> Tập <?php echo $tap;?> | <?php echo $slogan;?></title>
<meta name="description" content="<?php echo $tenphim; ?> Tập <?php echo $tap;?> | <?php echo $slogan;?>"/>
<meta name="robots" content="follow, index"/>
<link rel="canonical" href="<?php echo '/'.$link.'-'.$idphim; ?>.html" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $tenphim; ?> Tập <?php echo $tap;?> | <?php echo $slogan;?>" />
<meta property="og:description" content="<?php echo $tenphim; ?> Tập <?php echo $tap;?> | <?php echo $slogan;?>" />
<meta property="og:url" content="<?php echo '/'.$link.'-'.$idphim; ?>.html" />
<meta property="og:site_name" content="ZuiGhe.Net" />
<meta property="og:image" content="<?php echo $thumb; ?>" />
<meta property="og:image:secure_url" content="#" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="449" />
<meta property="og:image:type" content="image/png" />


<div class="postbody">
<article id="post-339" class="post-339 hentry" itemscope="itemscope" itemtype="http://schema.org/Episode">
<script type="text/javascript" src="/js/jquery.min.js"></script>    
<div class="ts-breadcrumb bixbox" style="margin-bottom: 7px;"><ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="/"><span itemprop="name"><font color="limegreen">Trang Chủ</font></span></a><meta itemprop="position" content="1"></li> / 
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="<?php echo '/'.$slug; ?>.html"><span itemprop="name"><font color="yellow"><?php echo $tenphim; ?></font></span></a><meta itemprop="position" content="2"></li> / 
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="#"><span itemprop="name"><font color="limegreen">Tập <?php echo $tap; ?></font></span></a><meta itemprop="position" content="3"></li>
</ol></div>
<div class="megavid"><div class="mvelement">

<div class="video-content"><div id="embed_holder" class="lowvid"><div class="player-embed" id="pembed">

<?php
$list0 = file_get_contents($list);
$get_auto = explode('<br/>', explode($tap.'|', $list0)['1'])['0'];
if (strpos($get_auto, '+++') == true) {
$auto = explode('+++', $get_auto)['0'];
$sv2 = explode('+++', $get_auto)['1'];
$sv3 = explode('+++', $get_auto)['2'];
}   
?>
    
<iframe id="zuighe" width="100%" height="100%" src="<?php echo $auto; ?>" frameborder="0" scrolling="0" allowfullscreen></iframe>

</div></div></div>

<div class="naveps bignav"  style="margin-bottom: 7px;">
<div class="nvs">
<a href="<?php if ($tap > 1) { echo '/'.($tap-1).'/'.$slug.'.html'; } else { echo '#'; } ?>"><span class="tex">« Tập Trước</span></a>    
</div>

<div class="nvs nvsc"><a>
💎 <span class="tex">Tập <?php echo $tap; ?></span> 💎</a>
</div>

<div class="nvs">
<a href="<?php if ($tap > 1 ) { echo '/'.($tap+1).'/'.$slug.'.html'; } else { echo '#'; } ?>"><span class="tex">Tập Sau »</span></a> 
</div>

</div>


<style>
.button {
display: inline-block;
background-color: white;
padding: 5px; 
font-size: 15px; 
color: blue; 
border: .5px solid #0c70de; 
border-radius: 3px;
} 

.button:hover {
background-color: green; 
color: white;
  border: 1px solid;
  box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
  outline-color: rgba(255, 255, 255, 0);
  outline-offset: 15px;
  text-shadow: 1px 1px 2px #427388; 
}
</style>
<div class="item video-nav" style="margin-bottom: 7px;"><div class="mobius">

<?php if ($auto) { ?>
<button class="yellow" onclick="document.getElementById('zuighe').src = '<?php echo $auto?>'">VIPVS</button>
<?php } ?>

<?php if ($sv2) { ?>
<button class="green" onclick="document.getElementById('zuighe').src = '<?php echo $sv2; ?>'">SS-VS</button>
<?php } ?>

</div></div>


<style>
.green{
    background-color: green;
    color:white;
    padding: 5px;
    border-radius: 3px;
    border: none;
    font-size: 15px;
    margin-left: 5px;
}
.yellow {
    background-color: yellow;
    color:black;
    padding: 5px;
    border-radius: 3px;
    border: none;
    font-size: 15px;
    margin-left: 5px;
}
</style>
<script type="text/javascript">
function go(loc) {
    document.getElementById('zuighe').src = loc;
     }
var buttons = $('button').click(function(){
  buttons.not(this).addClass('green');
  buttons.not(this).removeClass('yellow');
  $(this).addClass('yellow');
});
</script>


</div></div>


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
if (strpos($list1, '|') == true) {    
$get_tap = explode("|", $list1)['0'];    
?>

<a class="list-item-episode" href="<?php echo '/'.$get_tap.'/'.$slug; ?>.html"  style="<?php if ($get_tap == $tap) echo 'background-color: #ce6464;color: yellow;'; ?>">
<span><?php echo $get_tap; ?></span>
</a>
<?php }} ?>

</div></div>


<div class="bixbox synp" style="text-align: justify;"><div class="releases"><h2>📝 Nội Dung</h2></div>
<div class="entry-content" itemprop="description"><p><?php echo $noidung; ?></p></div></div>



</article>
</div>


<?php
include 'includes/chat.php';
?>

<div class="clear"></div>
</div></div>






<script>
$(document).ready(function(){
    $(this).scrollTop(120);
});
</script>
<?php
include 'includes/footer.php';
?>
