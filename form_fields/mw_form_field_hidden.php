<?php
/**
 * Name: MW Form Field Hidden
 * URI: http://2inc.org
 * Description: hiddenフィールドを出力。
 * Version: 1.3
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Created: December 14, 2012
 * Modified: December 5, 2013
 * License: GPL2
 *
 * Copyright 2013 Takashi Kitajima (email : inc@2inc.org)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class mw_form_field_hidden extends mw_form_field {

	/**
	 * String $short_code_name
	 */
	protected $short_code_name = 'mwform_hidden';

	/**
	 * setDefaults
	 * $this->defaultsを設定し返す
	 * @return	Array	defaults
	 */
	protected function setDefaults() {
		return array(
			'name'  => '',
			'value' => '',
			'echo'  => 'false',
		);
	}

	/**
	 * inputPage
	 * 入力ページでのフォーム項目を返す
	 * @return	String	HTML
	 */
	protected function inputPage() {
		$echo_value = '';
		if ( $this->atts['echo'] === 'true' ) {
			$echo_value = $this->atts['value'];
		}
		return $echo_value . $this->Form->hidden( $this->atts['name'], $this->atts['value'] );
	}

	/**
	 * previewPage
	 * 確認ページでのフォーム項目を返す
	 * @return	String	HTML
	 */
	protected function previewPage() {
		$value = $this->Form->getValue( $this->atts['name'] );
		$echo_value = '';
		if ( $this->atts['echo'] === 'true' ) {
			$echo_value = $value;
		}
		return $echo_value . $this->Form->hidden( $this->atts['name'], $value );
	}

	/**
	 * add_qtags
	 * QTags.addButton を出力
	 */
	protected function add_qtags() {
		?>
		'<?php echo $this->short_code_name; ?>',
		'<?php _e( 'Hidden', MWF_Config::DOMAIN ); ?>',
		'[<?php echo $this->short_code_name; ?> name=""]',
		''
		<?php
	}
}
