<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
<style type="text/css">
.cli_import_popup{ position: fixed; width:300px; height:150px; background:#fff; border:solid 1px #ccc; z-index: 10; left: 50%; top:0; margin-left:-165px; margin-top:40px; padding: 15px; box-shadow: 0px 2px 2px #ccc; }
.cli-scan-listing li{ padding-left: 15px; }
.cli-scan-listing-table{ margin-left: 15px; }
</style>
	<div class="cookie-law-info-form-container">
		<div class="cli-plugin-toolbar top">
            <div class="left">
            	<h1><?php _e('Scan result', 'webtoffee-gdpr-cookie-consent'); ?></h1>
	        </div>
	        <div class="right" style="padding-top: 10px; margin-right: 0px;">
	            <a class="button-primary pull-right cli_scan_again" style="margin-left:5px;" href="<?php echo $scan_page_url;?>"><?php _e('Scan again', 'webtoffee-gdpr-cookie-consent'); ?></a>
				<?php
				if($scan_cookies['total']>0)
				{
				?>
					<a class="button-secondary pull-right cli_export" style="margin-left:5px;" href="<?php print wp_nonce_url($export_page_url.$scan_details['id_cli_cookie_scan'], 'cli_cookie_scaner', 'cli_cookie_scaner');?>"><?php _e('Download cookies as CSV', 'webtoffee-gdpr-cookie-consent'); ?></a>
					<a class="button-secondary pull-right cli_import" data-scan_id="<?php echo $scan_details['id_cli_cookie_scan']; ?>" style="margin-left:5px;"><?php _e('Add to cookie list', 'webtoffee-gdpr-cookie-consent'); ?></a>
				<?php	
				}
				?>
	            <span class="spinner" style="margin-top:5px"></span>
	        </div>
        </div>
	<?php
	if($scan_details)
	{
		?>
		<h3 style="margin-top: 45px; margin-bottom: 5px;"><?php _e('Summary', 'webtoffee-gdpr-cookie-consent'); ?></h3>
		<ul style="margin-top: 0px;" class="cli-scan-listing">
			<li>
			<b><?php _e('Scan started at', 'webtoffee-gdpr-cookie-consent'); ?></b>: <?php echo date('F j, Y g:i a T',$scan_details['created_at']); ?>
			</li>
			<li>
			<b><?php _e('Scan status', 'webtoffee-gdpr-cookie-consent'); ?></b>: <?php echo $this->getStatusText($scan_details['status']); ?>
			</li>
			<li>
			<b><?php _e('Total URLs', 'webtoffee-gdpr-cookie-consent'); ?></b>:  <?php echo $scan_urls['total']; ?><br />
			</li>
			<li>
			<b><?php _e('Total cookies', 'webtoffee-gdpr-cookie-consent'); ?></b>: <?php echo $scan_cookies['total']; ?><br />
			</li>
		</ul>

		<h3 style="margin-top: 45px; margin-bottom: 5px;"><?php _e('Cookies', 'webtoffee-gdpr-cookie-consent'); ?></h3>
		<table class="wp-list-table widefat fixed striped" style="margin-bottom:25px;">
		<thead>
		<tr>
			<th align="left" width="40">#</th>
			<th align="left"><?php _e('Cookie Name', 'webtoffee-gdpr-cookie-consent'); ?></th>
			<th align="left"><?php _e('Duration', 'webtoffee-gdpr-cookie-consent'); ?></th>
			<th align="left"><?php _e('Category', 'webtoffee-gdpr-cookie-consent'); ?></th>
			<th align="left"><?php _e('First found URL', 'webtoffee-gdpr-cookie-consent'); ?></th>
		</tr>
		</thead>
		<tbody>
			<?php
			if(count($scan_cookies['data'])>0)
			{
				$sn=1;
				foreach($scan_cookies['data'] as $cookies_arr)
				{
					?>
					<tr>
						<td><?php echo $sn++; ?></td>
						<td><?php echo $cookies_arr['cookie_id']; ?></td>
						<td><?php echo $cookies_arr['expiry']; ?></td>
						<td><?php echo $cookies_arr['category']; ?></td>
						<td><?php echo $cookies_arr['url']; ?></td>
					</tr>
					<?php
				}	
			}else
			{
			?>
				<tr><td colspan="4"><?php _e('No cookies', 'webtoffee-gdpr-cookie-consent'); ?></td></tr>
			<?php
			}
			?>
		</tbody>
		</table>


		<h3 style="margin-top: 45px; margin-bottom: 5px;"><?php _e('URLs', 'webtoffee-gdpr-cookie-consent'); ?></h3>		
		<table class="wp-list-table widefat fixed striped">
		<thead>
		<tr>
			<th align="left" width="40">#</th>
			<th align="left"><?php _e('URL', 'webtoffee-gdpr-cookie-consent'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(count($scan_urls['data'])>0)
		{
			$sn=1;
			foreach($scan_urls['data'] as $url_arr)
			{
				?>
				<tr>
					<td><?php echo $sn++; ?></td>
					<td><?php echo $url_arr['url']; ?></td>					
				</tr>
				<?php
			}	
		}else
		{
		?>
			<td colspan="2"><?php _e('No URLs', 'webtoffee-gdpr-cookie-consent'); ?></td>
		<?php
		}
		?>
		</tbody>
		</table>

		
		<?php
	}
	?>
	<div class="cli-plugin-toolbar bottom">
       	<div class="right" style="padding-top: 10px; margin-right: 0px;">
            <a class="button-primary pull-right cli_scan_again" style="margin-left:5px;" href="<?php echo $scan_page_url;?>"><?php _e('Scan again', 'webtoffee-gdpr-cookie-consent'); ?></a>
			<?php
			if($scan_cookies['total']>0)
			{
			?>
				<a class="button-secondary pull-right cli_export" style="margin-left:5px;" href="<?php echo $export_page_url.$scan_details['id_cli_cookie_scan'];?>"><?php _e('Download cookies as CSV', 'webtoffee-gdpr-cookie-consent'); ?></a>
				<a class="button-secondary pull-right cli_import" data-scan_id="<?php echo $scan_details['id_cli_cookie_scan']; ?>" style="margin-left:5px;"><?php _e('Add to cookie list', 'webtoffee-gdpr-cookie-consent'); ?></a>
			<?php	
			}
			?>
            <span class="spinner" style="margin-top:5px"></span>
        </div> 
    </div>
	</div>
</div>