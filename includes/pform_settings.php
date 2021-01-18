<?php
class PForm_project_MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    public $pform_project_options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'pform_project_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'pform_project_page_init' ) );
    }

    /**
     * Add options page
     */
    public function pform_project_add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Settings Admin', 
            'PForm Setting', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->pform_project_options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>PForm Settings</h1>
            <h2 class="nav-tab-wrapper"> 
        </h2>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function pform_project_page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  
        
        add_settings_field(
            'pformtitle1', 
            'Button-Form Title', 
            array( $this, 'pformtitle1_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );     

        add_settings_field(
            'pformtitle2', // ID
            'Shortcode-Form Title', // Title 
            array( $this, 'pformtitle2_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      
         
        add_settings_field(
            'gscript_url', // ID
            'Google Apps Script URL', // Title 
            array( $this, 'gscript_url_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );

        add_settings_field(
            'pform_button_enabler', // ID
            'Button Form', // Title 
            array( $this, 'button_form_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );     
    }

    /**
     * Sanitize each setting field as needed
     *
     *array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['pformtitle1'] ) )
            $new_input['pformtitle1'] = sanitize_text_field( $input['pformtitle1'] );

        if( isset( $input['pformtitle2'] ) )
            $new_input['pformtitle2'] = sanitize_text_field( $input['pformtitle2'] );

        if( isset( $input['gscript_url'] ) )
            $new_input['gscript_url'] = sanitize_text_field( $input['gscript_url'] );

        if( isset( $input['pform_button_enabler'] ) )
            $new_input['pform_button_enabler'] = $input['pform_button_enabler'];

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        //test value check
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function pformtitle1_callback()
    {
        printf(
            '<input type="text" id="pformtitle1" name="my_option_name[pformtitle1]" size="30" value="%s" />',
            isset( $this->pform_project_options['pformtitle1'] ) ? esc_attr( $this->pform_project_options['pformtitle1']) : ''
        );
    }

    public function pformtitle2_callback()
    {
        printf(
            '<input type="text" id="pformtitle2" name="my_option_name[pformtitle2]" size="30" value="%s" />',
            isset( $this->pform_project_options['pformtitle2'] ) ? esc_attr( $this->pform_project_options['pformtitle2']) : ''
        );
    }
    /** 
     * Get the settings option array and print one of its values
     */

    public function gscript_url_callback()
    {
        printf(
            '<input type="text" id="gscript_url" name="my_option_name[gscript_url]" size="100" value="%s" placeholder="https://script.google.com/--------"/>',
            isset( $this->pform_project_options['gscript_url'] ) ? esc_attr( $this->pform_project_options['gscript_url']) : ''
        );
    }

    public function button_form_callback()
    {
        $checkbox_pform_tick = null;
        printf(
            '<input type="checkbox" id="pform_button_enabler" name="my_option_name[pform_button_enabler]" value="PFormButtonEnable" %s> <label for="pform_button_enabler"> Enable </label>',
            isset( $this->pform_project_options['pform_button_enabler']) ? "checked" : ''
        );
    }

    public function pform_telegram_bot_token_callback()
    {
        printf(
            '<input type="text" id="pform_telegram_bot_token" name="my_option_name[pform_telegram_bot_token]" value="%s" placeholder=""/>',
            isset( $this->pform_project_options['pform_telegram_bot_token'] ) ? esc_attr( $this->pform_project_options['pform_telegram_bot_token']) : ''
        );
    }

    public function pform_telegram_chat_id_callback()
    {
        printf(
            '<input type="text" id="pform_telegram_chat_id" name="my_option_name[pform_telegram_chat_id]" value="%s" placeholder=""/>',
            isset( $this->pform_project_options['pform_telegram_chat_id'] ) ? esc_attr( $this->pform_project_options['pform_telegram_chat_id']) : ''
        );
    }

}


if( is_admin() )
    $Pform_settings_page = new PForm_project_MySettingsPage();
    


 