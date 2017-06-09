<?php

/**
* Tab_admin_theme class
*/
class Tabs_admin_theme
{
	private $template = '<div class="admin_mix-container">
		<div class="admin_mix-tabs-list">
			<ul class="admin_l-mix-tabs-list">
				{$LINKS}
			</ul>
		</div>
		<div class="admin_mix-tabs">

            <input type="hidden" id="form-tab-action" name="action" value="save" />

            {$gt3_tabs}

            <div class="theme_settings_submit_cont">
                <input type="button" name="reset_theme_settings" class="admin_reset_settings admin_button admin_danger_btn" value="Reset Settings" />
                <input type="submit" name="submit_theme_settings" class="admin_save_all admin_button admin_ok_btn" value="Save Settings" />
            </div>
		</div>
		<div class="clear"></div>
	</div>';
	
	private $vars = array(
		'{$LINKS}',
		'{$gt3_tabs}'
	);
	
	private $gt3_tabs = array();
	
	public function __construct()
	{
		
	}
	
	public function add(Tab_admin_theme $tab)
	{
		$this->tabs[] = $tab;
	}
	
	public function render()
	{
		$links = array();
		$gt3_tabs  = array();
		foreach ($this->tabs as $tab) {
			$links[] = $tab->render_link();
			$gt3_tabs[]  = $tab->render_tab();
		}
		
		return str_replace($this->vars, array(
			implode(' ', $links),
			implode(' ', $gt3_tabs)
		), $this->template);
	}
	
	public function save()
	{
		foreach ($this->tabs as $tab) {
			$tab->save();
		}
	}
	
	public function reset($tab_id)
	{
		if( strtolower($tab_id) === 'all' ) {
			foreach ($this->tabs as $tab) {
				$tab->reset(TRUE);
			}
		}else{
			foreach ($this->tabs as $tab) {
				if ($tab_id == $tab->id()) {
					$tab->reset();
				}
			}
		}
	}
	
	public function reset_to_default()
	{
		foreach ($this->tabs as $tab) {
			$tab->reset(TRUE);
		}
	}
}


/**
* end of file
*/
?>