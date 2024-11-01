
	<script type="text/javascript">
	
	jQuery(document).ready(function($) {
		$('.mydate').datepicker({
			dateFormat : 'dd-mm-yy'
		});
	});
	
	</script>
	<div class="wrap" id="poststuff">
			<?php screen_icon(); echo "<h2>". __( 'WP Christmas Class', 'mytextdomain' ) . "</h2>"; ?>
	<br class="clear">
		<form method="post" action="options.php">
        	<div class="metabox-holder">
                <div class="postbox">
                    <h3>Date &amp; Class Options</h3>
                    <div class="inside"><p>Set the 'date range from' &amp; 'date range to' below, which will determine when your custom body class is added to your website.</p></div>
                    <?php settings_fields( 'creare_christmas_options' ); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"><div class="inside"><?php _e( 'Date From', 'mytextdomain' ); ?></div></th>
                            <td>
                            <input class="mydate small-text" id="creare_christmas_settings_from" type="text" name="creare_christmas_settings_from" value="<?php esc_attr_e( get_option('creare_christmas_settings_from') ); ?>" />
                            </td>
                        </tr> 
                        <tr valign="top">
                            <th scope="row"><div class="inside"><?php _e( 'Date To', 'mytextdomain' ); ?></div></th>
                            <td>
                            <input class="mydate small-text" id="creare_christmas_settings_to" type="text" name="creare_christmas_settings_to" value="<?php esc_attr_e( get_option('creare_christmas_settings_to') ); ?>" />
                            </td>
                        </tr> 
                        <tr valign="top">
                            <th scope="row"><div class="inside"><?php _e( 'Custom Body Class*', 'mytextdomain' ); ?></div></th>
                            <td>
                            <input id="creare_christmas_settings_custom_class" class="regular-text" type="text" name="creare_christmas_settings_custom_class" value="<?php esc_attr_e( get_option('creare_christmas_settings_custom_class') ); ?>" />
                            <br/><span class="description"><em>*</em> Your class will only be saved with letters hyphens (-) and underscores (_)</span>
                            </td>
                        </tr> 
                        <tr valign="top">
                            <th scope="row"><div class="inside"><?php _e( 'Repeat every year?', 'mytextdomain' ); ?></div></th>
                            <td>
                            <input type="checkbox" name="creare_christmas_settings_repeatcheck" value="1"<?php checked( 1 == get_option('creare_christmas_settings_repeatcheck') ); ?> />
                            
                            <span class="description">Checking this option will update your from and to date's automatically for next year.</span>
                            
                            </td>
                        </tr>
                    </table> 
                    </div>
                    <div id="save-action">
                    <p><input id="publish" class="button-primary" type="submit" value="<?php _e( 'Save Options', 'mytextdomain' ); ?>" /></p>
                </div>
            </div>
		</form>
	</div>
<?php 
require('creare-footer.php');