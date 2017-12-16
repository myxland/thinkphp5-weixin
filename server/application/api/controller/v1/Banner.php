<?php

namespace app\api\controller\v1;

use think\Controller;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;

class Banner extends Controller
{
    /**
     * 获取banner轮播图
     * @param  int  $id
     * @return array $banner
     */
    public function getBanner($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $banner = BannerModel::getBanner($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return json($banner);
    }
}
