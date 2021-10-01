<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
?>
<div class="cookie-law-info-tab-content" data-id="<?php echo $target_id; ?>">
    <ul class="cli_sub_tab">
        <li style="border-left:none; padding-left: 0px;" data-target="cookie-message"><a><?php _e('Cookie bar', 'webtoffee-gdpr-cookie-consent'); ?></a></li>
        <li data-target="show-again-tab"><a><?php _e('Show again tab', 'webtoffee-gdpr-cookie-consent'); ?></a></li>
    </ul>
    <div class="cli_sub_tab_container">
        <div class="cli_sub_tab_content" data-id="cookie-message" style="display:block;">
            <div class="wt-cli-section wt-cli-section-general-settings">
                <h3><?php _e('Cookie Bar', 'webtoffee-gdpr-cookie-consent'); ?></h3>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="bar_heading_text_field"><?php _e('Message Heading', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <input type="text" name="bar_heading_text_field" value="<?php echo stripslashes($the_options['bar_heading_text']) ?>" />
                            <span class="cli_form_help"><?php _e('Leave it blank, If you do not need a heading', 'webtoffee-gdpr-cookie-consent'); ?>
                            </span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="notify_message_field"><?php _e('Message', 'webtoffee-gdpr-cookie-consent'); ?></label><span class="wt-cli-tootip" data-wt-cli-tooltip="<?php _e('All the elements defined within the class `wt-cli-ccpa-element` will be removed if CCPA does not apply to the visitors country.', 'webtoffee-gdpr-cookie-consent'); ?>"><span class="wt-cli-tootip-icon"></span></span></th>
                        <td>
                            <?php
                            echo '<textarea name="notify_message_field" class="vvv_textbox">';
                            echo apply_filters('format_to_edit', stripslashes($the_options['notify_message'])) . '</textarea>';
                            ?>
                            <span class="cli_form_help"><?php _e('Shortcodes allowed: see the Help guide', 'webtoffee-gdpr-cookie-consent'); ?> <br /><?php _e('Examples: "We use cookies on this website [cookie_accept] to find out how to delete cookies [cookie_link]."', 'webtoffee-gdpr-cookie-consent'); ?></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="background_field"><?php _e('Cookie Bar Colour', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            echo '<input type="text" name="background_field" id="cli-colour-background" value="' . $the_options['background'] . '" class="my-color-field" data-default-color="#fff" />';
                            ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="text_field"><?php _e('Text Colour', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            echo '<input type="text" name="text_field" id="cli-colour-text" value="' . $the_options['text'] . '" class="my-color-field" data-default-color="#000" />';
                            ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="font_family_field"><?php _e('Font', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <select name="font_family_field" class="vvv_combobox">
                                <?php $this->print_combobox_options($this->get_fonts(), $the_options['font_family']) ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="cookie_bar_as_field"><?php _e('Show cookie bar as', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            $cookie_bar_as = $the_options['cookie_bar_as'];
                            ?>
                            <input type="radio" id="cookie_bar_as_field_banner" name="cookie_bar_as_field" class="styled cli_form_toggle" cli_frm_tgl-target="cli_bar_type" value="banner" <?php checked($cookie_bar_as, 'banner'); ?> /> <?php _e('Banner', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="cookie_bar_as_field_popup" name="cookie_bar_as_field" class="styled cli_form_toggle" cli_frm_tgl-target="cli_bar_type" value="popup" <?php checked($cookie_bar_as, 'popup'); ?> /> <?php _e('Popup', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="cookie_bar_as_field_widget" name="cookie_bar_as_field" class="styled cli_form_toggle" cli_frm_tgl-target="cli_bar_type" value="widget" <?php checked($cookie_bar_as, 'widget'); ?> /> <?php _e('Widget', 'webtoffee-gdpr-cookie-consent'); ?>
                        </td>
                    </tr>
                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="widget">
                        <th scope="row"><label for="widget_position_field"><?php _e('Position', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php $widget_position = $the_options['widget_position']; ?>
                            <select name="widget_position_field" id="widget_position_field" class="vvv_combobox">
                                <option value="left" <?php echo $widget_position == 'left' ? 'selected' : ''; ?>>Left</option>
                                <option value="right" <?php echo $widget_position == 'right' ? 'selected' : ''; ?>>Right</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="popup">
                        <th scope="row"><label for="popup_overlay_field"><?php _e('Add overlay?', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <input type="radio" id="popup_overlay_field_yes" name="popup_overlay_field" class="styled" value="true" <?php echo ($the_options['popup_overlay'] == true) ? ' checked="checked"' : ''; ?> /> <?php _e('Yes', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="popup_overlay_field_no" name="popup_overlay_field" class="styled" value="false" <?php echo ($the_options['popup_overlay'] == false) ? ' checked="checked"' : ''; ?> /> <?php _e('No', 'webtoffee-gdpr-cookie-consent'); ?>
                            <span class="cli_form_help"><?php _e('When the popup is active, an overlay will block the user from browsing the site.', 'webtoffee-gdpr-cookie-consent'); ?></span>
                            <span class="cli_form_er cli_scroll_accept_er"><?php _e('`Accept on scroll` will not work along with this option.', 'webtoffee-gdpr-cookie-consent'); ?></span>
                        </td>
                    </tr>
                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="banner" cli_frm_tgl-lvl="1">
                        <th scope="row"><label for="notify_position_vertical_field"><?php _e('Position:', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            $notify_positon = (isset($the_options['notify_position_vertical']) ? $the_options['notify_position_vertical'] : 'bottom');
                            ?>
                            <input type="radio" id="notify_position_vertical_field_top" name="notify_position_vertical_field" class="styled cli_form_toggle" cli_frm_tgl-target="cli_bar_pos" value="top" <?php checked($notify_positon, 'top'); ?> /> <?php _e('Header', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="notify_position_vertical_field_bottom" name="notify_position_vertical_field" class="styled cli_form_toggle" cli_frm_tgl-target="cli_bar_pos" value="bottom" <?php checked($notify_positon, 'bottom'); ?> /> <?php _e('Footer', 'webtoffee-gdpr-cookie-consent'); ?>
                        </td>
                    </tr>
                    <!-- header_fix code here -->
                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="banner" cli_frm_tgl-lvl="1">
                        <td colspan="2" style="padding: 0px;">
                            <table>
                                <tr valign="top" cli_frm_tgl-id="cli_bar_pos" cli_frm_tgl-val="top" cli_frm_tgl-lvl="2">
                                    <th scope="row" style="width:400px;">
                                        <label for="header_fix_field"><?php _e('Fix Cookie Bar to Header?', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                                    <td>
                                        <input type="radio" id="header_fix_field_yes" name="header_fix_field" class="styled" value="true" <?php echo ($the_options['header_fix'] == true) ? ' checked="checked"' : ''; ?> /> <?php _e('Yes', 'webtoffee-gdpr-cookie-consent'); ?>
                                        <input type="radio" id="iheader_fix_field_no" name="header_fix_field" class="styled" value="false" <?php echo ($the_options['header_fix'] == false) ? ' checked="checked"' : ''; ?> /> <?php _e('No', 'webtoffee-gdpr-cookie-consent'); ?>
                                        <span class="cli_form_help"><?php _e('If you select "Header" then you can optionally stick the cookie bar to the header. Will not have any effect if you select "Footer".', 'webtoffee-gdpr-cookie-consent'); ?></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="notify_animate_show_field"><?php _e('On load', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            $notify_animate_show = (isset($the_options['notify_animate_show']) ? $the_options['notify_animate_show'] : false);
                            ?>
                            <input type="radio" id="notify_animate_show_field_animate" name="notify_animate_show_field" class="styled" value="true" <?php checked($notify_animate_show, true); ?> /> <?php _e('Animate', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="notify_animate_show_field_sticky" name="notify_animate_show_field" class="styled" value="false" <?php checked($notify_animate_show, false); ?> /> <?php _e('Sticky', 'webtoffee-gdpr-cookie-consent'); ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="notify_animate_hide_field"><?php _e('On hide', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <?php
                            $notify_animate_hide = (isset($the_options['notify_animate_hide']) ? $the_options['notify_animate_hide'] : true);
                            ?>
                            <input type="radio" id="notify_animate_hide_field_animate" name="notify_animate_hide_field" class="styled" value="true" <?php checked($notify_animate_hide, true); ?> /> <?php _e('Animate', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="notify_animate_hide_field_sticky" name="notify_animate_hide_field" class="styled" value="false" <?php checked($notify_animate_hide, false); ?> /> <?php _e('Sticky', 'webtoffee-gdpr-cookie-consent'); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="cli_sub_tab_content" data-id="show-again-tab">
            <div class="wt-cli-section wt-cli-section-floating-widget-settings">
                <h3><?php _e('Show Again Tab', 'webtoffee-gdpr-cookie-consent'); ?></h3>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="showagain_tab_field"><?php _e('Use Show Again Tab?', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <input type="radio" id="showagain_tab_field_yes" name="showagain_tab_field" class="styled" value="true" <?php echo ($the_options['showagain_tab'] == true) ? ' checked="checked"' : ''; ?> /><?php _e('Yes', 'webtoffee-gdpr-cookie-consent'); ?>
                            <input type="radio" id="showagain_tab_field_no" name="showagain_tab_field" class="styled" value="false" <?php echo ($the_options['showagain_tab'] == false) ? ' checked="checked" ' : ''; ?> /> <?php _e('No', 'webtoffee-gdpr-cookie-consent'); ?>
                        </td>
                    </tr>

                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="banner" cli_frm_tgl-lvl="0">
                        <th scope="row"><label for="notify_position_horizontal_field"><?php _e('Tab Position', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <select name="notify_position_horizontal_field" class="vvv_combobox">
                                <?php
                                if ($the_options['notify_position_horizontal'] == "right") {
                                    echo '<option value="right" selected="selected">' . __('Right', 'webtoffee-gdpr-cookie-consent') . '</option>';
                                    echo '<option value="left">' . __('Left', 'webtoffee-gdpr-cookie-consent') . '</option>';
                                } else {
                                    echo '<option value="right">' . __('Right', 'webtoffee-gdpr-cookie-consent') . '</option>';
                                    echo '<option value="left" selected="selected">' . __('Left', 'webtoffee-gdpr-cookie-consent') . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr valign="top" cli_frm_tgl-id="cli_bar_type" cli_frm_tgl-val="popup" cli_frm_tgl-lvl="0">
                        <th scope="row"><label for="popup_showagain_position_field"><?php _e('Tab Position', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <select name="popup_showagain_position_field" class="vvv_combobox">
                                <?php
                                $pp_sa_pos = $the_options['popup_showagain_position'];
                                ?>
                                <option value="bottom-right" <?php echo $pp_sa_pos == 'bottom-right' ? 'selected' : ''; ?>>
                                    <?php _e('Bottom Right', 'webtoffee-gdpr-cookie-consent') ?>
                                </option>
                                <option value="bottom-left" <?php echo $pp_sa_pos == 'bottom-left' ? 'selected' : ''; ?>>
                                    <?php _e('Bottom Left', 'webtoffee-gdpr-cookie-consent') ?>
                                </option>
                                <option value="top-right" <?php echo $pp_sa_pos == 'top-right' ? 'selected' : ''; ?>>
                                    <?php _e('Top Right', 'webtoffee-gdpr-cookie-consent') ?>
                                </option>
                                <option value="top-left" <?php echo $pp_sa_pos == 'top-left' ? 'selected' : ''; ?>>
                                    <?php _e('Top Left', 'webtoffee-gdpr-cookie-consent') ?>
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="showagain_x_position_field"><?php _e('From Left Margin', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <input type="text" name="showagain_x_position_field" value="<?php echo $the_options['showagain_x_position'] ?>" />
                            <span class="cli_form_help"><?php _e('Specify', 'webtoffee-gdpr-cookie-consent'); ?> px&nbsp;or&nbsp;&#37;, e.g. "100px" or "30%"</span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="showagain_text"><?php _e('Show More Text', 'webtoffee-gdpr-cookie-consent'); ?></label></th>
                        <td>
                            <input type="text" name="showagain_text_field" value="<?php echo $the_options['showagain_text'] ?>" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
    include "admin-settings-save-button.php";
    ?>
</div>