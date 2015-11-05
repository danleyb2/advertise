<?php



?>

<!-- Bootstrap Core CSS -->
<link href="<?php echo $dir_path;?>assets/stylesheets/bootstrap.min.css" rel="stylesheet">

<style>
body{
	background-color: rgb(228, 228, 238);
}
footer,.navbar{
	background-color: rgb(193, 190, 233);
}
.main{
    margin-top:60px;
}
li.active{
	background-color: white;
}
.add_img{
	width:150px;
	height:100px;
	border-radius:3px;
}

.ad-name {
    color: #000;
    font-size: 24px;
    font-family: cursive;
    width: 60%;
	display:inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
	overflow: hidden;
}

.ad-row {
    margin-top: 1px;
    margin-bottom: 1px;
    width: 100%;
	text-align:left;
}

.ad-price {
    font-size: 23px;
    color: #3023D8;
    width: 100%;
    text-align: center;
}

.col-md-2c {
    position: relative;
    width: 15%;
    margin-left: auto;
    margin-right: auto;
    display: inline-block;
    float: none !important;
}
.add-item{
	height: 240px;
	min-height: 20px;
    padding: 5px;
    margin-bottom: 20px;
    background-color: #C1BEE9;
    border: 1px solid #337AB7;;
    border-radius: 3px;
    -webkit-box-shadow: inset -1px -2px 5px #2A441E;
    box-shadow: inset -1px -2px 5px #2A441E;

    /*margin-left: 2px;
    margin-right: 2px;*/
}
.ad-desc {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: #000000;
}

.ad-desc:hover {
    white-space: normal;
}

.cart-btn {
    background-color: #8cbdff;
    position: fixed;
    top: 13px;
    right: 2px;
    z-index: 10000;
    border-radius: 3px;
    padding: 2px;
}
.ad-catg-ul{
   height: 50px;
   overflow: hidden;
}
.ad-catg-ul>li{
   /* width: 11%;*/
}
.ad-catg-ul>li>a{
    font-size: 18px;
    color: #0B273E;
    font-weight: 300;
}
.ad-count{
    color: #fcf8e3;
    font-size: 16px;
    font-family: cursive;
}
</style>