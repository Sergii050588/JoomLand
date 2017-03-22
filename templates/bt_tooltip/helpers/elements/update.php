<?php
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldUpdate extends JFormField {
	protected $type = 'Update';

	protected function getInput() {
		
		JLoader::import( "joomla.version" );
		$version = new JVersion();
		if (!version_compare( $version->RELEASE, "2.5", "<=")) {
		   if (!defined("DS")) define("DS", DIRECTORY_SEPARATOR); //j3
		}
		
		// get current template version & creationDate
		$base_path = str_replace('helpers'.DS.'elements', '', dirname(__FILE__)).'templateDetails.xml';
		$file_handle = fopen($base_path, "r");
		$data = fread($file_handle, 2048);
		preg_match('/<version>.*<\/version>/i', $data, $current_version);
		$current_version[0] = str_replace('<version>', '', $current_version[0]);
		$current_version[0] = str_replace('</version>', '', $current_version[0]);
		
		preg_match('/<creationDate>.*<\/creationDate>/i', $data, $current_creationDate);
		$current_creationDate[0] = str_replace('<creationDate>', '', $current_creationDate[0]);
		$current_creationDate[0] = str_replace('</creationDate>', '', $current_creationDate[0]);

		// get changelog & download path
		preg_match('/<name>.*<\/name>/i', $data, $name);
		$name[0] = str_replace('<name>', '', $name[0]);
		$name[0] = str_replace('</name>', '', $name[0]);
		$clean_name = str_replace('bt_','',$name[0]); // without prefix bt_
		$bt_name = $name[0]; //with prefix bt_
		$changelog_path = 'http://www.bonusthemes.com/demo/joomla25/'.$clean_name.'/templates/'.$bt_name.'/changelog.html';
		$download_path = 'http://www.bonusthemes.com/download/'.$clean_name.'/.html';

		// get latest template version & creationDate from bonusthemes.com		
		$base_path = 'http://www.bonusthemes.com/demo/joomla25/'.$clean_name.'/templates/'.$bt_name.'/templateDetails.xml';
		$file_handle = fopen($base_path, "r");
		$data = fread($file_handle, 2048);
		preg_match('/<version>.*<\/version>/i', $data, $latest_version);
		$latest_version[0] = str_replace('<version>', '', $latest_version[0]);
		$latest_version[0] = str_replace('</version>', '', $latest_version[0]);
		
		preg_match('/<creationDate>.*<\/creationDate>/i', $data, $latest_creationDate);
		$latest_creationDate[0] = str_replace('<creationDate>', '', $latest_creationDate[0]);
		$latest_creationDate[0] = str_replace('</creationDate>', '', $latest_creationDate[0]);
		
		if ($current_version == $latest_version) :
			$html = '<div style="font-weight: bold;clear: both;font-size: 13px;margin-bottom: 15px;color:green;position: relative;left: -175px;">Your current version is: '.$current_version[0].' ('.$current_creationDate[0].')'.'.<br /><br />Your version is up to date. Congratulations!</div>';
		elseif ($current_version != $latest_version) :
			$current_version[0] = (!empty($current_version[0])) ? $current_version[0] : '1.0.0' ;
			$html = '<div style="font-weight: bold;padding: 10px 0;clear: both;font-size: 13px;margin-bottom: 10px;position: relative;left: -175px;">Your current version is: '.$current_version[0].' ('.$current_creationDate[0].')'.'.<br /><br /><span style="color:red">You have to UPDATE your template to the latest version '.$latest_version[0].' ('.$latest_creationDate[0].')'.'!</span><br /><br /><a href="'.$changelog_path.'" target="_blank">view the Changelog</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="'.$download_path.'" target="_blank">go to Download Area</a></div>';
		endif;
		
		return $html;		
	}
}
?>