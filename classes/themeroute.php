<?php
/**
 * @copyright (c) 2014 aircheng
 * @file themeroute.php
 * @brief 主题皮肤选择路由类
 * @author nswe
 * @date 2014/7/15 18:50:48
 * @version 2.6
 *
 */
class themeroute extends IInterceptorBase
{
	/**
	 * @brief theme和skin进行选择
	 */
	public static function onCreateController()
	{
		$controller = func_num_args() > 0 && func_get_arg(0) ? func_get_arg(0) : IWeb::$app->controller;

		/**
		 * 对于theme和skin的判断流程
		 * 1,直接从URL中获取是否已经设定了方案__theme,__skin
		 * 2,从cookie获取数据
		 */
		$urlTheme = IReq::get('__theme');
		$urlSkin  = IReq::get('__skin');

		if($urlTheme && $urlSkin && preg_match('|^\w+$|',$urlTheme) && preg_match('|^\w+$|',$urlSkin))
		{
			ISafe::set('__theme',$theme = $urlTheme);
			ISafe::set('__skin',$skin  = $urlSkin);
		}
		elseif(ISafe::get('__theme') && ISafe::get('__skin'))
		{
			$theme = ISafe::get('__theme');
			$skin  = ISafe::get('__skin');
		}

		if(isset($theme) && isset($skin))
		{
			$themePath = IWeb::$app->getViewPath().$theme."/".IWeb::$app->controller->getId();
			if(is_dir($themePath))
			{
				$controller->theme = $theme;
				$controller->skin  = $skin;
			}
		}
	}
}

