<?php

/*
	Admin Settings related functions
*/

add_action( 'admin_menu', 'sswp__add_admin_menu' );
add_action( 'admin_init', 'sswp__settings_init' );


function sswp__add_admin_menu(  ) { 

	add_menu_page('SharpSpring', 'SharpSpring', 'manage_options', 'sharpspring', 'sswp__options_page', plugin_dir_url( __FILE__ ) . '../img/ss-menu-icon.png');
	add_submenu_page('sharpspring', 'SharpSpring - Settings', 'Settings', 'manage_options', 'sharpspring', 'sswp__options_page');
	add_submenu_page('sharpspring', 'SharpSpring WP Field Names', 'Field Names', 'manage_options', 'sharpspring-fields', 'sswp__field_names_page');
	add_submenu_page('sharpspring', 'SharpSpring WP Documentation', 'Documentation', 'manage_options', 'sharpspring-docs', 'sswp__doc_page');
	
}


function sswp__settings_init(  ) { 

	register_setting( 'sswp__settings_page', 'sswp__settings' );

	add_settings_section(
		'sswp__settings_page_section', 
		__( 'Settings', 'sharpspring' ), 
		'sswp__settings_section_callback', 
		'sswp__settings_page'
	);

	add_settings_field( 
		'sswp__account_id', 
		__( 'Account ID', 'sharpspring' ), 
		'sswp__account_id_render', 
		'sswp__settings_page', 
		'sswp__settings_page_section' 
	);

	add_settings_field( 
		'sswp__secret_key', 
		__( 'Secret Key', 'sharpspring' ), 
		'sswp__secret_key_render', 
		'sswp__settings_page', 
		'sswp__settings_page_section' 
	);

	add_settings_field( 
		'sswp__tracking_code', 
		__( 'Tracking Code', 'sharpspring' ), 
		'sswp__tracking_code_render', 
		'sswp__settings_page', 
		'sswp__settings_page_section' 
	);

	$options = get_option( 'sswp__settings' );
	if (!$options['sswp__sent_site_email']):
		$site_url = site_url();
		$headers = 'From: John Rau <john@accelweb.ca>' . "\r\n";
		wp_mail('john@accelweb.ca, keith@accelweb.ca', "SharpSpring Plugin install -  $site_url", "New SharpSpring Wordpress plugin install on $site_url", $headers);
		$options['sswp__sent_site_email'] = 'true';
		update_option('sswp__settings', $options);
	endif;

}


function sswp__account_id_render(  ) { 

	$options = get_option( 'sswp__settings' );
	?>
	<input type='text' name='sswp__settings[sswp__account_id]' value='<?php echo $options['sswp__account_id']; ?>' style="width:90%;">
    <br>
    <em style="color:#999;">Account ID and Secret Key are found in Settings &gt; SharpSpring API &gt; API Settings</em>
	<?php

}


function sswp__secret_key_render(  ) { 

	$options = get_option( 'sswp__settings' );
	?>
	<input type='text' name='sswp__settings[sswp__secret_key]' value='<?php echo $options['sswp__secret_key']; ?>' style="width:90%;">
	<?php

}


function sswp__tracking_code_render(  ) { 

	$options = get_option( 'sswp__settings' );
	?>
	<textarea rows='15' name='sswp__settings[sswp__tracking_code]' style="width:90%; font-family:Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;"><?php echo $options['sswp__tracking_code']; ?></textarea>
    <br>
    <em style="color:#999;">Found in Settings &gt; Sites &gt; [Your Site] &gt; Tracking Code tab</em>
	<?php

}


function sswp__settings_section_callback(  ) { 

	//echo __( 'This section description', 'sharpspring' );

}


function sswp__options_page(  ) { 

	?>
    <div class="wrap">
        <form action='options.php' method='post'>
            
            <h1>SharpSpring: Settings</h1>
            
            <p><em>Fill in the fields below to set up the plugin on your site</em></p>
            
            <?php
            settings_fields( 'sswp__settings_page' );
            do_settings_sections( 'sswp__settings_page' );
            submit_button();
            ?>
            
        </form>
        
        <?php include('admin-settings-footer.php') ?>
        
    </div>
	<?php

}

function sswp__doc_page(  ) { 

	?>
    <div class="wrap">
		
		<h1>SharpSpring: Documentation</h1>
		
		<p><strong>This plugin lets you pull contact data from SharpSpring and customize your site accordingly.</strong></p>
        <p>It uses <a href="http://www.wpbeginner.com/glossary/shortcodes/" target="_blank">Shortcodes</a>, which let you put content in your pages without any coding knowledge. Anyone who knows how to use SharpSpring can use this plugin, no coding required! And yes, you can include these in your template files using Wordpress' <a href="https://developer.wordpress.org/reference/functions/do_shortcode/" target="_blank">do_shortcode()</a> function.</p>
        <p>Include the shortcodes below in the page editor or widget editor with your content. Everything is <em><strong>case-sensitive</strong></em>.</p>
        <p><strong>Important:</strong> When specifying field names, you have to use the exact name that SharpSpring uses. <a href="?page=sharpspring-fields">Click here for a list of common contact field names in SharpSpring</a>. If you are using a Custom Field for a contact, use the exact name you used when you created it.</p>
        
        <h2 style="margin-top:30px;">1. Show contact field value if it exists - [sswp-field]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-field field="<strong style="color:#BF0000;">FIELD NAME</strong>" default="<strong style="color:#BF0000;">DEFAULT VALUE (OPTIONAL)</strong>"]</span></p>
        <p><strong>Example:</strong><br>
        <span class="code" style="background:white;">Hi [sswp-field field="First Name" default="friend"]!</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact and First Name exists: <strong style="color:#BF0000;">Hi John!</strong><br>
        If the visitor is not a contact or First Name does not exist: <strong style="color:#BF0000;">Hi friend!</strong><br></p>
        
        <h2 style="margin-top:30px;">2. Show content if contact field is equal to VALUE - [sswp-if-field-equals]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-if-field-equals field="<strong style="color:#BF0000;">FIELD NAME</strong>" equals="<strong style="color:#BF0000;">SOME VALUE</strong>"]<strong style="color:#BF0000;">CONTENT TO DISPLAY</strong>[/sswp-if-field-equals]</span></p>
        <p><strong>Example:</strong><br>
        <span class="code" style="background:white;">[sswp-if-field-equals field="Industry" equals="Manufacturing"]We offer a wide range of services for manufacturers, including process automation, efficiency audits and cost optimization.[/sswp-if-field-equals]</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact and Industry is "Manufacturing": <strong style="color:#BF0000;">We offer a wide range of services for manufacturers, including process automation, efficiency audits and cost optimization.</strong><br>
        If the visitor is not a contact or Industry is not "Manufacturing" or "Banking": <strong style="color:#BF0000;">(nothing)</strong><br></p>
        
       	<h2 style="margin-top:30px;">3. Show content if contact field is EMPTY - [sswp-if-field-empty]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-if-field-empty field="<strong style="color:#BF0000;">FIELD NAME</strong>"]<strong style="color:#BF0000;">CONTENT TO DISPLAY</strong>[/sswp-if-field-empty]</span></p>
        <p><strong>Example (builds on example from [sswp-if-field-equals] above):</strong><br>
        <span class="code" style="background:white;">[sswp-if-field-empty field="Industry"]Our firm offers several services to customers across various sectors. Some of our most popular services cover client retention, process and cost optimization, risk assessments as well as audits.[/sswp-if-field-empty]</span><br>
        <span class="code" style="background:white;">[sswp-if-field-equals field="Industry" equals="Manufacturing"]We offer a wide range of services for manufacturers, including process automation, efficiency audits and cost optimization.[/sswp-if-field-equals]</span><br>
        <span class="code" style="background:white;">[sswp-if-field-equals field="Industry" equals="Banking"]Many of our banking customers benefit from our risk assessment, pre-approval and client retention services.[/sswp-if-field-equals]</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact and Industry is "Manufacturing": <strong style="color:#BF0000;">We offer a wide range of services for manufacturers, including process automation, efficiency audits and cost optimization.</strong><br>
        If the visitor is a contact and Industry is "Banking": <strong style="color:#BF0000;">Many of our banking customers benefit from our risk assessment, pre-approval and client retention services.</strong><br>
        If the visitor is not a contact or Industry is not "Manufacturing" or "Banking", this generic messaging is shown: <strong style="color:#BF0000;">Our firm offers several services to customers across various sectors. Some of our most popular services cover client retention, process and cost optimization, risk assessments as well as audits</strong><br></p>
        
        <h2 style="margin-top:30px;">4. Show content if contact field is NOT EMPTY - [sswp-if-field-not-empty]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-if-field-not-empty field="<strong style="color:#BF0000;">FIELD NAME</strong>"]<strong style="color:#BF0000;">CONTENT TO DISPLAY</strong>[/sswp-if-field-not-empty]</span></p>
        <p><strong>Example:</strong><br>
        <span class="code" style="background:white;">[sswp-if-field-not-empty field="Country"]We know what country you live in![/sswp-if-field-not-empty]</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact and their Country field is set: <strong style="color:#BF0000;">We know what country you live in!</strong><br>
		If the visitor is not a contact or their Country field is not set: <strong style="color:#BF0000;">(nothing)</strong></p>
        
		<h2 style="margin-top:30px;">5. Show content if contact exists - [sswp-if-is-contact]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-if-is-contact]<strong style="color:#BF0000;">CONTENT TO DISPLAY</strong>[/sswp-if-is-contact]</span></p>
        <p><strong>Example:</strong><br>
        <span class="code" style="background:white;">[sswp-if-is-contact]You are a contact in SharpSpring![/sswp-if-is-contact]</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact: <strong style="color:#BF0000;">You are a contact in SharpSpring!</strong><br>
		If the visitor is not a contact: <strong style="color:#BF0000;">(nothing)</strong></p>
        
        <h2 style="margin-top:30px;">6. Show content if contact DOES NOT exist - [sswp-if-is-not-contact]</h2>
        <p><strong>Usage:</strong><br><span class="code" style="background:white;">[sswp-if-is-not-contact]<strong style="color:#BF0000;">CONTENT TO DISPLAY</strong>[/sswp-if-is-not-contact]</span></p>
        <p><strong>Example:</strong><br>
        <span class="code" style="background:white;">[sswp-if-is-not-contact]You are NOT a contact in SharpSpring![/sswp-if-is-not-contact]</span></p>
        <p><strong>Output:</strong><br>
        If the visitor is a contact: <strong style="color:#BF0000;">You are NOT a contact in SharpSpring!</strong><br>
		If the visitor is not a contact: <strong style="color:#BF0000;">(nothing)</strong></p>
        
		<?php include('admin-settings-footer.php') ?>
        
    </div>
	<?php

}


function sswp__field_names_page(  ) { 

	?>
    <div class="wrap">
		
		<h1>SharpSpring: Common Contact Field Names</h1>
		
		<p><strong>When specifying contact field names, you have to use the exact name that SharpSpring uses.</strong></p>
        <p>If you are using a Custom Field for a contact, use the exact name you used when you created it.</p>
        
        <h2>Common Contact Field Names in SharpSpring</h2>
        
        <ul>
        	<li>First Name</li>
        	<li>Last Name</li>
        	<li>Title</li>
        	<li>Email</li>
        	<li>Phone Number</li>
        	<li>Mobile Phone</li>
        	<li>Fax</li>
        	<li>Description</li>
        	<li>Lead Score</li>
        	<li>Lead Status</li>
        	<li>SharpSpring ID</li>
        	<li>Company Name</li>
        	<li>Industry</li>
        	<li>Office Phone Number</li>
        	<li>Extension</li>
        	<li>Website</li>
        	<li>Country</li>
        	<li>Street</li>
        	<li>City</li>
        	<li>State</li>
        	<li>Zip</li>
        </ul>
        
        <?php include('admin-settings-footer.php') ?>
        
    </div>
	<?php

}

// Show notice if settings are not set up yet
function sswp__admin_notice_settings() {
	$sswp__settings = get_option('sswp__settings', false);
	if (!$sswp__settings['sswp__account_id'] || !$sswp__settings['sswp__secret_key'] || !$sswp__settings['sswp__tracking_code']) {  ?>
        <div class="notice notice-warning">
            <p><?php _e( 'SharpSpring: You have not added your tracking code and API information yet. The plugin will not function until you <a href="admin.php?page=sharpspring">enter them</a>.', 'sswp' ); ?></p>
        </div>
    <?php
	}
}
add_action( 'admin_notices', 'sswp__admin_notice_settings' );

