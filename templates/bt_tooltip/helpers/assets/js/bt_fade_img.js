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
var $j = jQuery.noConflict();

$j(function() {
        $j(".bt_fade_img")
        .find("a")
        .hide()
        .end()
        .hover(function() {
                $j(this).find("a").stop(true, true).fadeIn(500);
        }, function() {
                $j(this).find("a").stop(true, true).fadeOut(1000);
        });
});