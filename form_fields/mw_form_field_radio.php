<?php
/**
 * Name: MW Form Field Radio
 * URI: http://2inc.org
 * Description: ラジオボタンを出力。
 * Version: 1.3.0
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Created : December 14, 2012
 * Modified: March 20, 2014
 * License: GPL2
 *
 * Copyright 2014 Takashi Kitajima (email : inc@2inc.org)
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
class mw_form_field_radio extends mw_form_field {

	/**
	 * String $shortcode_name
	 */
	protected $shortcode_name = 'mwform_radio';

	/**
	 * __construct
	 */
	public function __construct() {
		parent::__construct();
		$this->set_qtags(
			$this->shortcode_name,
			__( 'Radio', MWF_Config::DOMAIN ),
			$this->shortcode_name . ' name="" children=""'
		);
	}

	/**
	 * setDefaults
	 * $this->defaultsを設定し返す
	 * @return	Array	defaults
	 */
	protected function setDefaults() {
		return array(
			'name'       => '',
			'id'         => '',
			'children'   => '',
			'value'      => '',
			'show_error' => 'true',
		);
	}

	/**
	 * inputPage
	 * 入力ページでのフォーム項目を返す
	 * @return string html
	 */
	protected function inputPage() {
		$children = $this->getChildren( $this->atts['children'] );
		$_ret = $this->Form->radio( $this->atts['name'], $children, array(
			'id'    => $this->atts['id'],
			'value' => $this->atts['value'],
		) );
		if ( $this->atts['show_error'] !== 'false' )
			$_ret .= $this->getError( $this->atts['name'] );
		return $_ret;
	}

	/**
	 * confirmPage
	 * 確認ページでのフォーム項目を返す
	 * @return	String	HTML
	 */
	protected function confirmPage() {
		$children = $this->getChildren( $this->atts['children'] );
		$value = $this->Form->getRadioValue( $this->atts['name'], $children );
		$_ret  = $value;
		$_ret .= $this->Form->hidden( $this->atts['name'], $value );
		return $_ret;
	}

	/**
	 * add_mwform_tag_generator
	 * フォームタグジェネレーター
	 */
	public function mwform_tag_generator_dialog() {
		?>
		<p>
			<strong>name</strong>
			<input type="text" name="name" />
		</p>
		<p>
			<strong>id(<?php _e( 'option', MWF_Config::DOMAIN ); ?>)</strong>
			<input type="text" name="id" />
		</p>
		<p>
			<strong><?php _e( 'Choices', MWF_Config::DOMAIN ); ?>(<?php _e( 'option', MWF_Config::DOMAIN ); ?>)</strong>
			<textarea name="children"></textarea>
			<span class="mwf_note">
				<?php _e( 'Input one line about one item.', MWF_Config::DOMAIN ); ?>
			</span>
		</p>
		<p>
			<strong><?php _e( 'Default value', MWF_Config::DOMAIN ); ?>(<?php _e( 'option', MWF_Config::DOMAIN ); ?>)</strong>
			<input type="text" name="value" />
		</p>
		<p>
			<strong><?php _e( 'Dsiplay error', MWF_Config::DOMAIN ); ?></strong>
			<input type="checkbox" name="show_error" value="false" /> <?php _e( 'Don\'t display error.', MWF_Config::DOMAIN ); ?>
		</p>
		<?php
	}
}
