<?php
/**
 * Name: MW Form Field Error
 * URI: http://2inc.org
 * Description: エラーを出力。
 * Version: 1.2
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Created: December 14, 2012
 * Modified: Septermber 19, 2013
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
class mw_form_field_error extends mw_form_field {

	/**
	 * String $short_code_name
	 */
	protected $short_code_name = 'mwform_error';

	/**
	 * setDefaults
	 * $this->defaultsを設定し返す
	 * @return	Array	defaults
	 */
	protected function setDefaults() {
		return array(
			'keys' => '',
		);
	}

	/**
	 * inputPage
	 * 入力ページでのフォーム項目を返す
	 * @return	String	HTML
	 */
	protected function inputPage() {
		$keys = explode( ',', $this->atts['keys'] );
		$_ret = '';
		foreach ( $keys as $key ) {
			$_ret .= $this->getError( trim( $key ) );
		}
		return $_ret;
	}

	/**
	 * previewPage
	 * 確認ページでのフォーム項目を返す
	 * @return	String	HTML
	 */
	protected function previewPage() {
	}

	/**
	 * add_qtags
	 * QTags.addButton を出力
	 */
	protected function add_qtags() {
		?>
		'<?php echo $this->short_code_name; ?>',
		'<?php _e( 'Error Message', MWF_Config::DOMAIN ); ?>',
		'[<?php echo $this->short_code_name; ?> keys=""]',
		''
		<?php
	}
}
