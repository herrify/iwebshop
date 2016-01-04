<?php
/**
 * @brief 升级更新控制器
 */
class Update extends IController
{
	/**
	 * @brief iwebshop15101000 版本升级更新
	 */
	public function iwebshop15101000()
	{
		//更新config.php
		$updateData = array("interceptor" => array('themeroute@onCreateController','layoutroute@onCreateAction','hookCreateAction@onCreateAction','hookFinishAction@onFinishAction'));
		$localTheme = IWeb::$app->config['theme'];
		$localSkin  = isset(IWeb::$app->config['skin']) ? IWeb::$app->config['skin'] : "";
		if($localSkin && is_string($localTheme['pc']))
		{
			$updateData['theme'] = array(
				'pc'     => array($localTheme['pc'] => $localSkin['pc'],"sysdefault" => "default","sysseller" => "default"),
				'mobile' => array($localTheme['mobile'] => $localSkin['mobile'],"sysdefault" => "default","sysseller" => "default"),
			);
		}
		Config::edit('config/config.php',$updateData);

		//更新oauth_user表
		$oauthUserDB = new IModel('oauth_user');
		$oauthUserDB->setData(array('oauth_id' => 5));
		$oauthUserDB->update("oauth_id = 4");

		die("升级成功");
	}
}