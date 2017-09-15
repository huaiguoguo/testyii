<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/15
 * Time: 11:22
 */

namespace common\component;

use yii;

use yii\base\Component;

use common\models\AuthItem;

use yii\helpers\Url;


class Hcomm extends Component
{

    /**
     * @author: 火柴<290559038@qq.com>
     * @descri: 此函数比上一个效率更高一些
     * @param $route
     * @param bool $isFind 如果true  就执行查询
     * @return array|mixed
     */
    public static function getMenuCopy($isFind = false)
    {
        $route = "/" . Yii::$app->requestedAction->uniqueId;
        $menu = Yii::$app->cache->get("menu");
        if ("" == $menu || null == $menu || $isFind == true) {
            $menu = [];
            $menu[] = self::getMenuHead();
//            $menuData = AuthItem::find()->where(['type' => 2, 'level' => 1])->orderBy('sort desc')->all();
            $menuData = AuthItem::find()->all();
            foreach ($menuData as $key => $value) {
                $activeUrl = [];
                $activeUrl[] = $value->name;
                $faarrow = '';
                if (!empty($value->children)) {
                    $faarrow = '<span class="fa arrow"></span>';
                };
                $TempMenu = ['label' => '<i class="fa fa-cog"></i>' . $value['description'] . $faarrow, 'url' => Url::toRoute($value['name'])];
                if (!empty($value->children)) {
                    $tempChild = [];
                    foreach ($value->children as $ke => $val) {
                        $tempChildStr = ['label' => $val['description'], 'url' => [$val['name']]];
                        $activeUrl[] = $val->name;
                        $activeUrlChild = [];
                        $activeUrlChild[] = $val->name;
                        if (!empty($val->children)) {
                            foreach ($val->children as $k => $v) {
                                $activeUrl[] = $v->name;
                                $activeUrlChild[] = $v->name;
                            }
                        }
                        $tempChildStr['active'] = in_array($route, $activeUrlChild);
                        $tempChild[] = $tempChildStr;
                    }
                    $TempMenu['items'] = $tempChild;
                }
                $TempMenu['active'] = in_array($route, $activeUrl);
                $menu[] = $TempMenu;
            }
            Yii::$app->cache->delete('menu');
            Yii::$app->cache->set('menu', $menu);
        }
        return $menu;
    }


    public static function getMenuHead()
    {
        $items = [
            'options' => ['class' => 'nav-header'],
            'label' => '
                                                                <div class="dropdown profile-element"> 
                                                                                        <span> <img alt="image" class="img-circle" src="/inspinia/img/profile_small.jpg"/> </span>
                                                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="full_height.html#">
                                                                                             <span class="clear"> 
                                                                                               <span class="block m-t-xs"><strong class="font-bold">火柴</strong></span> 
                                                                                               <span class="text-muted text-xs block">艺术总监 <b class="caret"></b></span> 
                                                                                             </span> 
                                                                                        </a>
                                                                                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                                                                            <li><a href="profile.html">Profile</a></li>
                                                                                            <li><a href="contacts.html">Contacts</a></li>
                                                                                            <li><a href="mailbox.html">Mailbox</a></li>
                                                                                            <li class="divider"></li>
                                                                                            <li><a href="login.html">Logout</a></li>
                                                                                        </ul>
                                                                </div>
                                                                <div class="logo-element"> IN+</div>'
        ];
        return $items;
    }


}