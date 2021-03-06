<?php
if (!defined('ABSPATH')) {
    exit;
}
ob_start();
?>
<h3><?php _e('CCPA Settings', 'webtoffee-gdpr-cookie-consent'); ?><span class="wt-cli-tootip" data-wt-cli-tooltip="<?php _e('The right to opt out in the California Consumer Privacy Act gives consumers the ability to direct a business not to sell their personal information to a third party. If the user considers to not sell their personal information, all the scripts related to the categories which are configured to sell personal information will be blocked. The DO NOT SELL option is facilitated via a shortcode [wt_cli_ccpa_optout].', 'webtoffee-gdpr-cookie-consent'); ?>"><span class="wt-cli-tootip-icon"></span></span></h3>
<table class="form-table">
    <tr valign="top">
        <th scope="row"><label for="ccpa_enabled_field"><?php _e('Enable CCPA ?', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
        <td>
            <input type="hidden" name="ccpa_enabled_field" value="false" id="ccpa_enabled_no">
            <input name="ccpa_enabled_field" type="checkbox" value="true" id="ccpa_enabled_yes" <?php checked(Cookie_Law_Info::sanitise_settings('ccpa_enabled', $cookie_options['ccpa_enabled']), true); ?>>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row"><label for="ccpa_region_based_field"><?php _e('Restrict CCPA to only California', 'webtoffee-gdpr-cookie-consent'); ?></label><span class="wt-cli-tootip" data-wt-cli-tooltip="<?php _e('When enabled this regulation will be applicable only to visits from California; applicable to all visitors when disabled.', 'webtoffee-gdpr-cookie-consent'); ?>"><span class="wt-cli-tootip-icon"></span></span></th>
        <td>
            <input type="hidden" name="ccpa_region_based_field" value="false" id="ccpa_region_based_no">
            <input name="ccpa_region_based_field" type="checkbox" value="true" id="ccpa_region_based_yes" <?php checked(Cookie_Law_Info::sanitise_settings('ccpa_region_based', $cookie_options['ccpa_region_based']), true); ?>>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row"><label for="ccpa_enable_bar_field"><?php _e('Enable CCPA notice', 'webtoffee-gdpr-cookie-consent'); ?></label><span class="wt-cli-tootip" data-wt-cli-tooltip="<?php _e('Enabling the notice will display the banner with the relevant text as per your configuration. Use this option particularly to record prior consent from the website visitors.', 'webtoffee-gdpr-cookie-consent'); ?>"><span class="wt-cli-tootip-icon"></span></span></th>
        <td>
            <input type="hidden" name="ccpa_enable_bar_field" value="false" id="ccpa_enable_bar_no">
            <input name="ccpa_enable_bar_field" type="checkbox" value="true" id="ccpa_enable_bar_yes" <?php checked(Cookie_Law_Info::sanitise_settings('ccpa_enable_bar', $cookie_options['ccpa_enable_bar']), true); ?>>
        </td>
    </tr>
</table>
<!-- Webtoffee GDPR CCPA Styles -->
<style>
    .cookie-law-info-tab-content[data-id=cookie-law-info-ccpa] th {
        width: 400px;
    }
</style>
<?php
$ccpa_settings = ob_get_contents();
ob_end_clean();
?>