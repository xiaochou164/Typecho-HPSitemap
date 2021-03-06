<?php

/**
 * sitemap生成工具。<a href='https://blog.irow.top/archives/256.html' title='help' target='_blank'>需要帮助?</a>
 *
 * @category widget
 * @package HPSitemap
 * @author Roogle&雷鬼&承影
 * @version 2.5.1
 * @link https://blog.irow.top/archives/256.html
 */

class HPSitemap_Plugin implements Typecho_Plugin_Interface
{
    public static function activate(){
        Helper::addAction('update_sitemap', 'HPSitemap_Update');

    }

    public static function deactivate(){
	    Helper::removeAction('update_sitemap');

    }

    public static function config(Typecho_Widget_Helper_Form $form){

        $sitemap_dir = new Typecho_Widget_Helper_Form_Element_Text(
            'sitemap_dir',NULL ,'sitemap',
            _t('设置生成sitemap的目录(根目录即站点根目录)'),
            _t('如:设置sitemap,则会在./sitemap/下生成sitemap.xml,请保证此目录可访问')
        );
        $form->addInput($sitemap_dir);

        $import_user_auth = new Typecho_Widget_Helper_Form_Element_Text(
            'sitemap_user_auth',NULL ,'',
            _t('设置接口密匙'),
            _t('接口地址：你的网站/action/update_sitemap?auth=接口密匙(若未设置伪静态，别忘了加上/index.php/)')
        );
        $form->addInput($import_user_auth);

        $mobile = new Typecho_Widget_Helper_Form_Element_Radio('mobile',
            ['0' => _t('否'), '1' => _t('是')],
            '0', _t('是否使用百度移动协议'), _t('百度移动协议的头文件可能不被Google和其他搜索引擎识别'));
        $form->addInput($mobile);
    }


    public static function personalConfig(Typecho_Widget_Helper_Form $form){

    }


}
