<?php
/*---------------------------------------------------------
# BT Tooltip - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 3.0
# Copyright (C) 2007-2013 BonusThemes.com. All rights reserved.
# License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
# Demo: http://www.bonusthemes.com/demo/?template=tooltip
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */
defined( '_JEXEC' ) or die( 'Restricted access' ); 

JLoader::import( "joomla.version" );
$version = new JVersion();
if (!version_compare( $version->RELEASE, "2.5", "<=")) {
   if (!defined("DS")) define("DS", "/"); //j3
}

$bt_helper = JPATH_BASE.DS.'templates'.DS.$this->template.DS.'helpers'.DS.'bt_helper.php';
require_once ($bt_helper);
$bt = new btTemplateHelper();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"<?php echo ($bt->lang_type == 'RTL') ? ' dir="rtl"' : '';?>><head>
<jdoc:include type="head" />

<?php
// JS details 
jimport('joomla.environment.uri');
$host = JURI::root();
$document = JFactory::getDocument();
// jQuery v@1.6.4 jquery.com
$document->addScript('templates/bt_tooltip/helpers/assets/js/jquery.min.1.6.4.js'); 
$document->addScript('templates/bt_tooltip/helpers/assets/js/jquery.skin_switcher.noconflict.js'); 
// for css skins switcher via ajax
$document->addScript('templates/bt_tooltip/helpers/assets/js/bt_jquery.cookie.js');
$jquery_code = "";
$jquery_code .= "\n\n";
$jquery_code .= "<!-- BEGIN: BT Skin Switcher -->\n";
$jquery_code .= "jQuery_1_6_4(function(){";

$jquery_code .= "\n\njQuery_1_6_4('#change-skin-cerise').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"cerise\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_tooltip/css/skins/cerise".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n\njQuery_1_6_4('#change-skin-coral').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"coral\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_tooltip/css/skins/coral".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n\njQuery_1_6_4('#change-skin-emerald').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"emerald\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_tooltip/css/skins/emerald".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n});";
$jquery_code .= "\n<!-- END: BT Skin Switcher -->";
$jquery_code .= "\n\n";
$document->addScriptDeclaration($jquery_code);
?>

<?php
// Syntax Highlighter (powered by http://alexgorbatchev.com/SyntaxHighlighter/)
if ($this->params->get("display_syntax_highlighter", "1")) :
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shCore.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shBrushPhp.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shBrushXml.js');
$document->addStyleSheet('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/styles/shCore.css');
$document->addStyleSheet('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/styles/shThemeDefault.css');
?>

<!-- Syntax Highlighter (powered by http://alexgorbatchev.com/SyntaxHighlighter/) -->
<script language="javascript" type="text/javascript">
SyntaxHighlighter.config.clipboardSwf = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/helpers/jeffects/syntax_highlighter/scripts/clipboard.swf';
SyntaxHighlighter.config.stripBrs = true;
SyntaxHighlighter.all();
</script>

<?php
endif;
?>

<?php
// NIVO SLIDER (based on: http://dev7studios.com/nivo-slider/)
if ($this->params->get("display_nivo", "1")) :
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/jquery.min.1.9.1.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/jquery.nivo.slider.pack.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/bt.jquery.nivo.slider.js');
endif;
?>

<!-- DEFAULT CSS-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/system<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/joomla<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/mstyles<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/menu/css<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/typography<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/sliders<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/custom<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />

<!-- K2 CSS-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/k2_style<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />

<!-- SKIN CSS-->
<link rel="stylesheet" id="skin" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/skins/<?php echo $bt->skin.(($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />

<?php
// Google Fonts
echo $bt->getGoogleFonts();
?>

</head>

<body>
<?php 
// calculate widths
$bt->full_width = $bt->full_width-60; // remove left and right padding 
$bt->bt_main_outer_width = $bt->bt_main_outer_width-60; // remove left and right padding
?>

      <div id="bt_outer">
         <div id="bt_inner" style="width: <?php echo $bt->full_width; ?>px;">

            <?php

            if ($bt->display_top1 || $bt->display_top2 || $bt->display_top3 || $bt->display_top4) { 
               echo $bt->getPosition("top1_top2_top3_top4", array("top1"=>$bt->top1_width,"top2"=>$bt->top2_width,"top3"=>$bt->top3_width,"top4"=>$bt->top4_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            if ($bt->display_logo || $bt->display_header1 || $bt->display_header2) { 
               echo $bt->getPosition("logo_header1_header2", array("logo"=>$bt->logo_width,"header1"=>$bt->header1_width,"header2"=>$bt->header2_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
            }

            if ($bt->display_toolbar || $bt->display_menu) { 
               echo $bt->getPosition("toolbar_menu", array("toolbar"=>$bt->toolbar_width,"menu"=>$bt->menu_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "0", "0", "0", "0");
            }

            if ($bt->display_slideshow) { 
               echo $bt->getPosition("slideshow", array("slideshow"=>$bt->slideshow_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "16", "16", "16", "16");
            }

            if ($bt->display_header3 || $bt->display_header4 || $bt->display_header5) { 
               echo $bt->getPosition("header3_header4_header5", array("header3"=>$bt->header3_width,"header4"=>$bt->header4_width,"header5"=>$bt->header5_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "0", "0", "0", "0");
            }

            ?>

            <div class="bt_main">

                <?php

                if ($bt->display_left) { 
                   echo $bt->getPosition("left", array("left"=>$bt->left_width), ($bt->left_width-5), "vertical", "0", "0", "0", "0", "0", "0", "0", "0");
                }

                ?>

                <div id="bt_body" style="width: <?php echo $bt->bt_main_outer_width;?>px">

                      <?php

                      if ($bt->display_newsflash) { 
                         echo $bt->getPosition("newsflash", array("newsflash"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
                      }

                      if ($bt->display_news1 || $bt->display_news2 || $bt->display_news3) { 
                         echo $bt->getPosition("news1_news2_news3", array("news1"=>$bt->news1_width,"news2"=>$bt->news2_width,"news3"=>$bt->news3_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
                      }

                      if ($bt->display_pathway) { 
                         echo $bt->getPosition("pathway", array("pathway"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
                      }

                      if ($bt->display_mainbody) { 
                         echo $bt->getPosition("mainbody", array("mainbody"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "6", "10");
                      }

                      if ($bt->display_notice1 || $bt->display_notice2 || $bt->display_notice3) { 
                         echo $bt->getPosition("notice1_notice2_notice3", array("notice1"=>$bt->notice1_width,"notice2"=>$bt->notice2_width,"notice3"=>$bt->notice3_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
                      }

                      if ($bt->display_banner) { 
                         echo $bt->getPosition("banner", array("banner"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
                      }

                      ?>

                </div>

                <?php

                if ($bt->display_right) { echo $bt->getPosition("right", array("right"=>$bt->right_width), ($bt->right_width-5), "vertical", "0", "0", "0", "0", "0", "0", "0", "0"); } 

                ?>

            </div>

            <?php

            if ($bt->display_bottom1 || $bt->display_bottom2 || $bt->display_bottom3) { 
               echo $bt->getPosition("bottom1_bottom2_bottom3", array("bottom1"=>$bt->bottom1_width,"bottom2"=>$bt->bottom2_width,"bottom3"=>$bt->bottom3_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            if ($bt->display_bottom4 || $bt->display_bottom5 || $bt->display_bottom6) { 
               echo $bt->getPosition("bottom4_bottom5_bottom6", array("bottom4"=>$bt->bottom4_width,"bottom5"=>$bt->bottom5_width,"bottom6"=>$bt->bottom6_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            if ($bt->display_footer1 || $bt->display_footer2 || $bt->display_footer3) { 
               echo $bt->getPosition("footer1_footer2_footer3", array("footer1"=>$bt->footer1_width,"footer2"=>$bt->footer2_width,"footer3"=>$bt->footer3_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            if ($bt->display_footer4 || $bt->display_footer5 || $bt->display_footer6) { 
               echo $bt->getPosition("footer4_footer5_footer6", array("footer4"=>$bt->footer4_width,"footer5"=>$bt->footer5_width,"footer6"=>$bt->footer6_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            if ($bt->display_footer7) { 
               echo $bt->getPosition("footer7", array("footer7"=>$bt->footer7_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "10", "10", "10", "10");
            }

            ?>

            <!-- BEGIN: Footer -->
            <?php if ($bt->display_btlogo || $bt->copyright_message != "" || $bt->display_skin_switcher) : ?>
            <div id="bt_footer_area">
               <?php if ($bt->display_btlogo) : ?>
               <div id="bt_btlogo_div">
                  <?php echo $bt->bt_btlogo; ?>
               </div>
               <?php endif; ?>
                
               <?php if ($bt->copyright_message != "") : ?>
               <div id="bt_copyright_message"> 
                  <?php echo $bt->copyright_message; ?>
               </div>
               <?php endif; ?>
                
               <?php if ($bt->display_skin_switcher) : ?>
               <div id="bt_skin_switcher">
                  <a class="change_skin_icon" id="change-skin-cerise" href="">cerise</a> 
                  <a class="change_skin_icon" id="change-skin-coral" href="">coral</a> 
                  <a class="change_skin_icon" id="change-skin-emerald" href="">emerald</a> 
               </div>
               <?php endif; ?>
            </div>
            <?php endif; ?>
            <!-- END: Footer -->

         </div>
      </div>

<?php
// BEGIN: Go top button
if ($bt->display_gotop) { echo $bt->bt_gotop; }
// END: Go top button

// BEGIN: Debug
echo $bt->getDebug();
// END: Debug
?>
</body>
</html>