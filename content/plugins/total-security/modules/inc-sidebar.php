<?php
# Donation Message #
if( get_site_option( 'fdx1_hidden_time' ) && get_site_option( 'fdx1_hidden_time' ) < time() ) {
echo '<div class="updated"><form method="post" action=""><input type="hidden" name="fdx_page" value="hide_message" /><p>';
echo '<strong>'.__('Do you like this Plugin? Rate', $this->hook).' <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span> '.__('on', $this->hook).' WordPress.org</strong> &nbsp;&nbsp;<input type="button" class="button button-primary" onClick="location.href=\''. $this->sbar_wpratelink . '\'" value="' . __( 'Vote & Rate Now', $this->hook ) . '">&nbsp;&nbsp;&nbsp;';
submit_button( __('Hide this message', $this->hook ), 'secondary', 'Submit', false, array( 'id' => '' ) ) ;
echo '</p></form></div>';
}
/*---------------------------------------*/
echo '<div id="postbox-container-1" class="postbox-container">';
echo '<div id="side-sortables" class="meta-box-sortables">';

/* class="postbox closed"
----------------------------------------*/
echo '<div class="postbox"><div class="handlediv" title="'.__('Click to toggle', $this->hook) .'"><br /></div><h3 class="hndle"><span>'. $this->pluginname . ' <small style="float: right">v'. $this->pluginversion . '</small></span></h3>';
echo '<div class="inside">';
echo '<a href="'. $this->sbar_homepage . '" target="_blank"><div id="logo"></div></a>';
echo '<a class="sm_button sm_code" href="'. $this->sbar_homepage . '" target="_blank">' . __( 'Suggest a Feature', $this->hook ) . '</a>';
echo '<a class="sm_button sm_bug" href="'. $this->sbar_homepage . '" target="_blank">' . __( 'Report a Bug', $this->hook ) . '</a>';
echo '<a class="sm_button sm_lang" href="' . $this->sbar_glotpress . '" target="_blank">' . __( 'Help translating it', $this->hook ) . '</a>';
echo '<a class="sm_button sm_star" href="'. $this->sbar_wpratelink . '" target="_blank">'. __( 'Rate the plugin 5 star on WordPress', $this->hook ) .'.</a>';
echo '<hr><div style="text-align: center; margin-top: 13px"><a href="http://api.addthis.com/oexchange/0.8/forward/facebook/offer?url='. $this->sbar_homepage . '&amp;title='. $this->pluginname .'&amp;pubid=ra-52eb02b34be83059" data-width="850" data-height="500" rel="1" id="pop_1" class="newWindow" title="'. __( 'Share on', $this->hook ) .' Facebook"><img src="'. plugins_url( 'images/h3_icons/facebook.png', dirname(__FILE__)).'" width="32" height="32" border="0"  alt="*" style="margin-right: 15px" /></a>';
echo'<a href="http://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url='. $this->sbar_homepage .'&amp;pubid=ra-52eb02b34be83059" data-width="500" data-height="600" rel="1" id="pop_2" class="newWindow" title="'. __( 'Share on', $this->hook ) .' Google Plus"><img src="'. plugins_url( 'images/h3_icons/googleplus.png', dirname(__FILE__)).'" width="32" height="32" border="0" alt="*" style="margin-right: 15px" /></a>';
echo '<a href="http://api.addthis.com/oexchange/0.8/forward/twitter/offer?title=Plugin '. $this->pluginname . '&amp;url='. $this->sbar_homepage .'&amp;pubid=ra-52eb02b34be83059" data-width="500" data-height="690" rel="1" id="pop_5" class="newWindow" title="'. __( 'Share on', $this->hook ) .' Twitter"><img src="'. plugins_url( 'images/h3_icons/twitter.png', dirname(__FILE__)).'" width="32" height="32" border="0" alt="*" style="margin-right: 15px" /></a>';
echo '<a href="http://api.addthis.com/oexchange/0.8/offer?title='. $this->pluginname . '&amp;url='. $this->sbar_homepage .'&amp;pubid=ra-52eb02b34be83059" data-width="500" data-height="690" rel="1" id="pop_6" class="newWindow" title="'. __( 'Share on', $this->hook ) .' Addthis"><img src="'. plugins_url( 'images/h3_icons/addthis.png', dirname(__FILE__)).'" width="32" height="32" border="0" alt="*" /></a></div>';
echo '</div></div>';

//----------------------------------------

//----------------------------------------
echo '</div></div>';