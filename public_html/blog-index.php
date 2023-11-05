<?php ini_set('default_charset','UTF-8');header('Content-Type: text/html; charset=UTF-8'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BLOG - Index</title>
<meta name="referrer" content="same-origin">
<link rel="canonical" href="https://www.thestephaniemiranda.com/blog-index.php">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $pages = 10;
    $page = (isset($_GET['page']) ? $_GET['page'] : 1);
    if($page < 1) {
        $page = 1;
    }
    $current_page = 1;
    $current_result = 0;

    $blogName = 'blog-index';
    $blogJSON = file_get_contents($blogName . '.json');
    if($blogJSON === FALSE) {
        echo $blogName;
        exit(-1);
    }

    $blogData = json_decode($blogJSON, TRUE);
    if($blogData == NULL) {
        echo "JSON";
        exit(-2);
    }

    $blogPostsPerPage = $blogData['blogPostsPerPage'];
    $blogPostsMargin = $blogData['blogPostsMargin'];
    $blogPosts = $blogData['blogPosts'];
    $css = $blogData['css'];
    $mq = $blogData['mq'];

    $end_page = $page + $pages / 2 - 1;
    if($end_page < $pages) {
        $end_page = $pages;
    }
    $blogPostsCount = count($blogPosts);
    $blogPostsPages = intval(($blogPostsCount - 1) / $blogPostsPerPage) + 1;
    if($blogPostsPages < $end_page) {
        $end_page = $blogPostsPages;
    }

    $start_page = $end_page + 1 - $pages;
    if($start_page < 1) {
        $start_page = 1;
    }

    $style = '';
    foreach($css as $device => $deviceCSSClasses) {
        $mediaQuery = (isset($mq[$device]) ? $mq[$device] : NULL);
        if($mediaQuery !== NULL) {
            $style .= "@media " . $mediaQuery . ' {';
        }
        $style .= ".bpc{margin-top:" . $blogPostsMargin[$device] . "px}";
        $cssClassesAdded = array();
        $blogPostIndex = ($page - 1) * $blogPostsPerPage;
        $count = 0;
        while($blogPostIndex < $blogPostsCount && ++$count <= $blogPostsPerPage) {
            $blogPost = $blogPosts[$blogPostIndex++];

            $cssClasses = $blogPost['cssClasses'];
            foreach($cssClasses as $cssClass) {
                if(!in_array($cssClass, $cssClassesAdded) && isset($deviceCSSClasses[$cssClass])) {
                    $style .= $deviceCSSClasses[$cssClass];
                }
                $cssClassesAdded[] = $cssClass;
            }
        }
        if($mediaQuery !== NULL) {
            $style .= '}';
        }
    }
    echo "<style>" . $style . "</style>";

?>

<style>html,body{-webkit-text-zoom:reset !important;-ms-text-size-adjust:100% !important;-moz-text-size-adjust:100% !important;-webkit-text-size-adjust:100% !important}@font-face{font-display:block;font-family:"Lato";src:url('css/Lato-Regular.woff2') format('woff2'),url('css/Lato-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Nunito";src:url('css/Nunito-Regular.woff2') format('woff2'),url('css/Nunito-Regular.woff') format('woff');font-weight:400}body>div{font-size:0}p, span,h1,h2,h3,h4,h5,h6{margin:0;word-spacing:normal;word-wrap:break-word;-ms-word-wrap:break-word;pointer-events:auto;max-height:1000000000px}sup{font-size:inherit;vertical-align:baseline;position:relative;top:-0.4em}sub{font-size:inherit;vertical-align:baseline;position:relative;top:0.4em}ul{display:block;word-spacing:normal;word-wrap:break-word;list-style-type:none;padding:0;margin:0;-moz-padding-start:0;-khtml-padding-start:0;-webkit-padding-start:0;-o-padding-start:0;-padding-start:0;-webkit-margin-before:0;-webkit-margin-after:0}li{display:block;white-space:normal}li p{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}form{display:inline-block}a{text-decoration:inherit;color:inherit;-webkit-tap-highlight-color:rgba(0,0,0,0)}textarea{resize:none}.shm-l{float:left;clear:left}.shm-r{float:right;clear:right}.whitespacefix{word-spacing:-1px}#consentBanner{position:fixed;bottom:0;z-index:9999}html{font-family:sans-serif}body{font-size:0;margin:0}audio,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:0 0;outline:0}b,strong{font-weight:700}dfn{font-style:italic}h1,h2,h3,h4,h5,h6{font-size:1em;line-height:1;margin:0}img{border:0}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=submit]{-webkit-appearance:button;cursor:pointer;box-sizing:border-box;white-space:normal}input[type=text],input[type=password],textarea{-webkit-appearance:none;appearance:none;box-sizing:border-box}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;box-sizing:border-box;border-color:#ddd}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}blockquote{margin-block-start:0;margin-block-end:0;margin-inline-start:0;margin-inline-end:0}:-webkit-full-screen-ancestor:not(iframe){-webkit-clip-path:initial!important}
.menu-content{cursor:pointer;position:relative}li{-webkit-tap-highlight-color:rgba(0,0,0,0)}
#b{background:#fff url(images/black_linen_v2.png) repeat center top}.ps314{position:relative;margin-top:20px}.v83{display:block;*display:block;zoom:1;vertical-align:top}.s532{pointer-events:none;min-width:960px;width:960px;margin-left:auto;margin-right:auto}.s533{width:777px;margin-left:125px}.v84{display:inline-block;*display:inline;zoom:1;vertical-align:top}.ps315{position:relative;margin-left:0;margin-top:0}.s534{min-width:777px;width:777px;min-height:43px}.c336{z-index:15}.ps316{position:relative;margin-left:0;margin-top:0;pointer-events:auto}.c337{pointer-events:none}.ps317{position:relative;margin-left:0;margin-top:6px}.s535{min-width:518px;width:518px;min-height:37px;height:37px}.c338{z-index:16;pointer-events:auto}.input1{border:1px solid #c0c0c0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box;width:518px;height:37px;font-family:"Helvetica Neue", sans-serif;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;line-height:14px;letter-spacing:normal;text-shadow:none;text-indent:0;padding-bottom:0;text-align:left;padding:4px}.input1::placeholder{color:rgb(169,169,169)}.ps318{position:relative;margin-left:28px;margin-top:7px}.s536{min-width:171px;width:171px;min-height:35px}.c339{z-index:17;pointer-events:auto}.s537{width:171px;height:35px}.submit1{font-family:"Helvetica Neue", sans-serif;font-size:18px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#fff;line-height:22px;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;border:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#8c1d40;background-clip:padding-box;padding-top:7px;padding-bottom:6px;padding-left:0;padding-right:0}.submit1:hover{background-color:#404040;border-color:#000;color:#000}.submit1:active{background-color:#ffc627;border-color:#000;color:#000}.v85{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:visible}.ps319{position:relative;margin-left:10px;margin-top:0}.s538{min-width:50px;width:50px;min-height:40px;height:40px}.c340{z-index:18;pointer-events:auto}.v86{display:inline-block;*display:inline-block;zoom:1;vertical-align:top}.m12{padding:0px 0px 0px 0px}.mcv12{display:inline-block}.s539{min-width:50px;width:50px;min-height:40px}.c341{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-image:url(images/hamburger-gray-40.png);background-color:rgba(0,0,0,.50);background-repeat:no-repeat;background-position:50% 50%;background-size:contain;background-clip:padding-box}.webp .c341{background-image:url(images/hamburger-gray-40.webp)}.v87{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:hidden}.ps320{position:relative;margin-left:0;margin-top:10px}.s540{min-width:50px;width:50px;min-height:19px;height:19px}.c342{pointer-events:auto}.p42{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:center}.f126{font-family:Lato;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:transparent;background-color:initial;line-height:16px;letter-spacing:normal;text-shadow:none}.v88{display:none;*display:none;zoom:1;vertical-align:top}.ps321{position:relative;margin-left:-200px;margin-top:0}.s541{min-width:250px;width:250px;min-height:306px;height:306px}.ml12{outline:0}.s542{min-width:250px;width:250px;min-height:50px;height:50px}.s543{min-width:248px;width:248px;min-height:48px;height:48px}.c343{pointer-events:none;border:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);background-clip:padding-box}.ps322{position:relative;margin-left:0;margin-top:6px}.s544{min-width:248px;width:248px;min-height:36px;height:36px}.f127{font-family:Verdana, Geneva, sans-serif;font-size:20px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#fff;background-color:initial;line-height:29px;letter-spacing:normal;text-shadow:none}.ps323{position:relative;margin-left:0;margin-top:14px}.s545{min-width:250px;width:250px;min-height:50px;height:50px}.s546{min-width:248px;width:248px;min-height:48px;height:48px}.c344{pointer-events:none;border:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);background-clip:padding-box}.s547{min-width:248px;width:248px;min-height:36px;height:36px}.c345{pointer-events:none;border:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);background-clip:padding-box}.c346{pointer-events:none;border:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);background-clip:padding-box}.c347{pointer-events:none;border:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);behavior:url(js/PIE.htc);-pie-background:rgba(0,0,0,.50);background-clip:padding-box}.ps324{position:relative;margin-top:37px}.s548{width:100%;min-width:960px;min-height:1px}.c348{z-index:1}.ps325{position:relative;margin-top:293px}.s549{width:708px;margin-left:126px}.ps326{display:inline-block;*display:inline;position:relative;left:50%;-ms-transform:translate(-50%,0);-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}.s550{min-width:708px;width:708px;min-height:40px}.c349{z-index:2}.s551{min-width:48px;width:48px;min-height:40px}.c350{z-index:3;pointer-events:auto}.f128{font-family:"Helvetica Neue", sans-serif;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;line-height:14px;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;padding-top:13px;padding-bottom:13px;margin-top:0;margin-bottom:0}.btn43{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn43:hover{background-color:#82939e;border-color:#000;color:#000}.btn43:active{background-color:#ffc627;border-color:#000;color:#000}.span12{background-color:initial}.v89{display:inline-block;overflow:hidden;outline:0}.s552{width:48px;padding-right:0;height:14px}.ps327{position:relative;margin-left:12px;margin-top:0}.c351{z-index:4;pointer-events:auto}.btn44{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn44:hover{background-color:#82939e;border-color:#000;color:#000}.btn44:active{background-color:#ffc627;border-color:#000;color:#000}.c352{z-index:5;pointer-events:auto}.btn45{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn45:hover{background-color:#82939e;border-color:#000;color:#000}.btn45:active{background-color:#ffc627;border-color:#000;color:#000}.c353{z-index:6;pointer-events:auto}.btn46{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn46:hover{background-color:#82939e;border-color:#000;color:#000}.btn46:active{background-color:#ffc627;border-color:#000;color:#000}.c354{z-index:7;pointer-events:auto}.btn47{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn47:hover{background-color:#82939e;border-color:#000;color:#000}.btn47:active{background-color:#ffc627;border-color:#000;color:#000}.c355{z-index:8;pointer-events:auto}.btn48{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn48:hover{background-color:#82939e;border-color:#000;color:#000}.btn48:active{background-color:#ffc627;border-color:#000;color:#000}.c356{z-index:9;pointer-events:auto}.btn49{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn49:hover{background-color:#82939e;border-color:#000;color:#000}.btn49:active{background-color:#ffc627;border-color:#000;color:#000}.c357{z-index:10;pointer-events:auto}.btn50{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn50:hover{background-color:#82939e;border-color:#000;color:#000}.btn50:active{background-color:#ffc627;border-color:#000;color:#000}.c358{z-index:11;pointer-events:auto}.btn51{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn51:hover{background-color:#82939e;border-color:#000;color:#000}.btn51:active{background-color:#ffc627;border-color:#000;color:#000}.c359{z-index:12;pointer-events:auto}.btn52{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn52:hover{background-color:#82939e;border-color:#000;color:#000}.btn52:active{background-color:#ffc627;border-color:#000;color:#000}.c360{z-index:13;pointer-events:auto}.btn53{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn53:hover{background-color:#82939e;border-color:#000;color:#000}.btn53:active{background-color:#ffc627;border-color:#000;color:#000}.c361{z-index:14;pointer-events:auto}.btn54{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#8c1d40;background-clip:padding-box;color:#000}.btn54:hover{background-color:#82939e;border-color:#000;color:#000}.btn54:active{background-color:#ffc627;border-color:#000;color:#000}.s553{width:100%;min-width:960px;min-height:57px}.c362{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#c0c0c0;background-clip:padding-box}.ps329{position:relative;margin-top:15px}.s554{min-width:960px;width:960px;margin-left:auto;margin-right:auto}.s555{width:880px;margin-left:41px}.s556{min-width:880px;width:880px;min-height:32px}.s557{min-width:748px;width:748px;min-height:32px;height:32px}.p43{padding-top:0;padding-bottom:0;text-align:center;text-indent:0;padding-right:0}.f129{font-family:Lato;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:16px;letter-spacing:normal;text-shadow:none}.ps330{position:relative;margin-left:8px;margin-top:0}.s558{min-width:124px;width:124px;min-height:32px}.f130{font-family:Nunito;font-size:17px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;line-height:23px;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;padding-top:5px;padding-bottom:4px;margin-top:0;margin-bottom:0}.btn55{border:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#000;background-clip:padding-box;color:#fff}.btn55:hover{background-color:#82939e;border-color:#000;color:#000}.btn55:active{background-color:#8c1d40;border-color:#000;color:#fff}.s559{width:124px;padding-right:0;height:23px}.menu-device{background-color:rgb(0,0,0);display:none}@media (min-width:768px) and (max-width:959px) {.ps314{margin-top:13px}.s532{min-width:768px;width:768px}.s533{width:613px;margin-left:100px}.s534{min-width:613px;width:613px;min-height:38px}.ps317{margin-top:8px}.s535{min-width:415px;width:415px;min-height:30px;height:30px}.input1{width:415px;height:30px;font-size:9px;line-height:11px}.ps318{margin-left:22px;margin-top:9px}.s536{min-width:137px;width:137px;min-height:28px}.s537{width:137px;height:28px}.submit1{font-size:14px;line-height:16px;padding-top:6px}.ps319{margin-left:-1px}.s538{min-width:40px;width:40px;min-height:32px;height:32px}.s539{min-width:40px;width:40px;min-height:32px}.c341{background-image:url(images/hamburger-gray-32.png)}.webp .c341{background-image:url(images/hamburger-gray-32.webp)}.ps320{margin-top:8px}.s540{min-width:40px;width:40px;min-height:15px;height:15px}.f126{font-size:9px;line-height:12px}.ps321{margin-left:-991px}.s541{min-width:1031px;width:1031px;min-height:254px;height:254px}.s542{min-width:1031px;width:1031px}.s543{min-width:1029px;width:1029px}.s544{min-width:1029px;width:1029px}.ps323{margin-top:1px}.s545{min-width:1031px;width:1031px}.s546{min-width:1029px;width:1029px}.s547{min-width:1029px;width:1029px}.ps324{margin-top:29px}.s548{min-width:768px}.ps325{margin-top:148px}.s549{width:566px;margin-left:112px}.s550{min-width:566px;width:566px;min-height:32px}.s551{min-width:38px;width:38px;min-height:32px}.f128{font-size:9px;line-height:11px;padding-top:11px;padding-bottom:10px}.s552{width:38px;height:11px}.ps327{margin-left:10px}.s553{min-width:768px;min-height:46px}.ps329{margin-top:12px}.s554{min-width:768px;width:768px}.s555{width:766px;margin-left:2px}.s556{min-width:766px;width:766px;min-height:34px}.s557{min-width:656px;width:656px;min-height:34px;height:34px}.p43{text-align:left}.f129{font-size:20px;line-height:27px}.ps330{margin-left:7px}.s558{min-width:103px;width:103px;min-height:26px}.f130{font-size:13px;line-height:17px}.s559{width:103px;height:17px}.menu-device{background-color:rgb(1,1,1);display:none}}@media (max-width:767px) {.ps314{margin-top:6px}.s532{min-width:320px;width:320px}.s533{width:278px;margin-left:41px}.s534{min-width:278px;width:278px;min-height:33px}.ps317{margin-top:2px}.s535{min-width:174px;width:174px;min-height:14px;height:14px}.input1{width:174px;height:14px;font-size:3px;line-height:4px}.ps318{margin-left:9px;margin-top:3px}.s536{min-width:57px;width:57px;min-height:12px}.s537{width:57px;height:12px}.submit1{font-size:5px;line-height:6px;padding-top:3px;padding-bottom:3px}.ps319{margin-left:-9px}.s538{min-width:47px;width:47px;min-height:33px;height:33px}.s539{min-width:47px;width:47px;min-height:33px}.c341{background-image:url(images/hamburger-gray-33-1.png)}.webp .c341{background-image:url(images/hamburger-gray-33-1.webp)}.ps320{margin-top:13px}.s540{min-width:47px;width:47px;min-height:6px;height:6px}.f126{font-size:3px;line-height:4px}.ps321{margin-left:-69px}.s541{min-width:116px;width:116px;min-height:192px;height:192px}.s542{min-width:114px;width:114px;min-height:36px;height:36px}.s543{min-width:112px;width:112px;min-height:34px;height:34px}.ps322{margin-top:0}.s544{min-width:112px;width:112px;min-height:34px;height:34px}.f127{font-size:18px;line-height:27px}.ps323{margin-top:3px}.s545{min-width:116px;width:116px;min-height:36px;height:36px}.s546{min-width:114px;width:114px;min-height:34px;height:34px}.s547{min-width:114px;width:114px;min-height:34px;height:34px}.ps324{margin-top:-6px}.s548{min-width:320px}.ps325{margin-top:92px}.s549{width:236px;margin-left:42px}.s550{min-width:236px;width:236px;min-height:14px}.s551{min-width:16px;width:16px;min-height:14px}.f128{font-size:3px;line-height:4px;padding-top:5px;padding-bottom:5px}.s552{width:16px;height:4px}.ps327{margin-left:4px}.s553{min-width:320px;min-height:90px}.ps329{margin-top:8px}.s554{min-width:320px;width:320px}.s555{width:299px;margin-left:8px}.s556{min-width:299px;width:299px;min-height:74px}.s557{min-width:255px;width:255px;min-height:74px;height:74px}.f129{font-size:18px;line-height:24px}.ps330{margin-left:3px;margin-top:29px}.s558{min-width:41px;width:41px;min-height:23px}.f130{font-size:12px;line-height:16px;padding-top:4px;padding-bottom:3px}.s559{width:41px;height:16px}.menu-device{background-color:rgb(2,2,2);display:none}}@media (-webkit-min-device-pixel-ratio:2), (min-resolution:192dpi) {.c341{background-image:url(images/hamburger-gray-80.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-80.webp)}}@media (-webkit-min-device-pixel-ratio:3), (min-resolution:288dpi) {.c341{background-image:url(images/hamburger-gray-120.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-120.webp)}}@media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2), (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {.c341{background-image:url(images/hamburger-gray-64.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-64.webp)}}@media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:3), (min-width:768px) and (max-width:959px) and (min-resolution:288dpi) {.c341{background-image:url(images/hamburger-gray-96.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-96.webp)}}@media (max-width:767px) and (-webkit-min-device-pixel-ratio:2), (max-width:767px) and (min-resolution:192dpi) {.c341{background-image:url(images/hamburger-gray-66-1.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-66-1.webp)}}@media (max-width:767px) and (-webkit-min-device-pixel-ratio:3), (max-width:767px) and (min-resolution:288dpi) {.c341{background-image:url(images/hamburger-gray-99-1.png);background-size:contain}.webp .c341{background-image:url(images/hamburger-gray-99-1.webp)}}</style>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<script>window.gaf=function(){var e,t,a,n;e="script",t=document,a=t.createElement(e),n=t.getElementsByTagName(e)[0],a.async=1,a.src="https://www.googletagmanager.com/gtag/js?id=",n.parentNode.insertBefore(a,n)};if(!!document.cookie.match(/cookieConsent=true/))window.gaf();</script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','',{'anonymize_ip':true,'forceSSL':true});</script>
<meta name="author" content="Stephanie Miranda">
<link rel="alternate" hreflang="en" href="https://www.thestephaniemiranda.com/blog-index.php">
<script>!function(){var A=new Image;A.onload=A.onerror=function(){1==A.height&&(document.documentElement.className+=" webp")},A.src="data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAD8D+JaQAA3AA/ua1AAA"}();</script>
<link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.8e5ff2.css" media="print">
<!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.8e5ff2-lteIE7.css" type="text/css">
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.8e5ff2-lteIE8.css" type="text/css">
<![endif]-->
<!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.8e5ff2-gteIE9.css" type="text/css">
<![endif]-->
</head>
<body id="b">
<div class="ps314 v83 s532">
<div class="s533">
<div class="v84 ps315 s534 c336">
<form method="GET" action="search.php" class="v84 ps316 s534">
<div class="v84 ps315 s534 c337">
<div class="v84 ps317 s535 c338">
<input type="text" name="search" required class="input1">
</div>
<div class="v84 ps318 s536 c339">
<input type="submit" value="Search Blogs" name="" class="js46 s537 submit1">
</div>
<div id="hamburger-menu" class="v85 ps319 s538 c340">
<ul class="menu-dropdown-2 v86 ps315 s538 m12" id="m2">
<li class="v84 ps315 s538 mit12">
<div class="menu-content mcv12">
<div class="v84 ps315 s539 c341">
<div class="v87 ps320 s540 c342">
<p class="p42 f126">Menu</p>
</div>
</div>
</div>
<ul class="menu-dropdown v88 ps321 s541 m12">
<li class="v84 ps315 s542 mit12">
<a href="./" class="ml12"><div class="menu-content mcv12"><div class="v84 ps315 s543 c343"><div class="v87 ps322 s544 c342"><p class="p42 f127">Home</p></div></div></div></a>
</li>
<li class="v84 ps323 s545 mit12">
<a href="professional.html" class="ml12"><div class="menu-content mcv12"><div class="v84 ps315 s546 c344"><div class="v87 ps322 s547 c342"><p class="p42 f127">Professional</p></div></div></div></a>
</li>
<li class="v84 ps323 s542 mit12">
<a href="projects.html" class="ml12"><div class="menu-content mcv12"><div class="v84 ps315 s543 c345"><div class="v87 ps322 s544 c342"><p class="p42 f127">Projects</p></div></div></div></a>
</li>
<li class="v84 ps323 s542 mit12">
<a href="art-gallery.html" class="ml12"><div class="menu-content mcv12"><div class="v84 ps315 s543 c346"><div class="v87 ps322 s544 c342"><p class="p42 f127">Art Gallery</p></div></div></div></a>
</li>
<li class="v84 ps323 s542 mit12">
<a href="blog.html" class="ml12"><div class="menu-content mcv12"><div class="v84 ps315 s543 c347"><div class="v87 ps322 s544 c342"><p class="p42 f127">Blog</p></div></div></div></a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="v84 ps324 s548 c348">
<?php

    $blogPostIndex = ($page - 1) * $blogPostsPerPage;
    $deferredLoad = '';
    $count = 0;
    while($blogPostIndex < $blogPostsCount && ++$count <= $blogPostsPerPage) {
        $blogPost = $blogPosts[$blogPostIndex++];

        echo '<div style="width:100%"';
        if($count > 1) {
            echo ' class="bpc"';
        }
        echo '>';
        echo $blogPost['html'];
        echo '</div>';

        $deferredLoad .= $blogPost['deferredLoad'];
    }

    echo '<script type="text/javascript">var blogIndexLoadImages = function() {' . $deferredLoad . '}</script>';

?>

</div>
<div class="ps325 v83 s532">
<div class="s549">
<div class="v84 ps315 s550 c349">
<div class="ps326">
<?php

    $control = '<div class="v84 ps315 s551 c350" style="display:none"><a href="#" class="f128 btn43 v89 s552"><span class="span12">&lt;&lt;</span></a></div>';
    if($page > 1) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . ($page - 1);
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c351" style="display:none"><a href="#" class="f128 btn44 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c352" style="display:none"><a href="#" class="f128 btn45 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 2 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c353" style="display:none"><a href="#" class="f128 btn46 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 3 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c354" style="display:none"><a href="#" class="f128 btn47 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 4 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c355" style="display:none"><a href="#" class="f128 btn48 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 5 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c356" style="display:none"><a href="#" class="f128 btn49 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 6 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c357" style="display:none"><a href="#" class="f128 btn50 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 7 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c358" style="display:none"><a href="#" class="f128 btn51 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 8 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c359" style="display:none"><a href="#" class="f128 btn52 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 9 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c360" style="display:none"><a href="#" class="f128 btn53 v89 s552"><span class="span12">{page_num}</span></a></div>';
    $buttonPage = $start_page + 10 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #82939e"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"' . $style, $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v84 ps327 s551 c361" style="display:none"><a href="#" class="f128 btn54 v89 s552"><span class="span12">&gt;&gt;</span></a></div>';
    if($page < $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . ($page + 1);
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
    }
    echo $control;

?>

</div>
</div>
</div>
</div>
<div id="consentBanner" class="v88 ps328 s553 c362">
<div class="ps329 v83 s554">
<div class="s555">
<div class="v84 ps315 s556 c363">
<div class="v87 ps315 s557 c342">
<p class="p43 f129">This website makes use of cookies. Please see our <span class="f129"><a class="noConsent" href="privacy-policy.html">privacy policy</a></span> for details.</p>
</div>
<div class="v84 ps330 s558 c342">
<a href="#" class="allowConsent f130 btn55 v89 s559"><span class="span12">OK</span></a>
</div>
</div>
</div>
</div>
</div>
<div class="menu-device"></div>
<script>dpth="/";!function(){var s=["js/jquery.94abca.js","js/h5validate.js","js/jqueryui.94abca.js","js/menu.94abca.js","js/menu-dropdown-animations.94abca.js","js/menu-dropdown.8e5ff2.js","js/menu-dropdown-2.8e5ff2.js","js/consent.94abca.js","js/blog-index.8e5ff2.js"],n={},j=0,e=function(e){var o=new XMLHttpRequest;o.open("GET",s[e],!0),o.onload=function(){if(n[e]=o.responseText,9==++j)for(var t in s){var i=document.createElement("script");i.textContent=n[t],document.body.appendChild(i)}},o.send()};for(var o in s)e(o)}();
</script>
<script type="text/javascript">
var ver=RegExp(/Mozilla\/5\.0 \(Linux; .; Android ([\d.]+)/).exec(navigator.userAgent);if(ver&&parseFloat(ver[1])<5){document.getElementsByTagName('body')[0].className+=' whitespacefix';}
</script>
</body>
</html>