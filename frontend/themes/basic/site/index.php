<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/11
 * Time: 16:28
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>




<div class="col-lg-2 col-sm-2" style="border: 1px;">
    <ul class="nav">
        <li> <a href="#">基本信息</a> </li>
        <li> <a href="#">期望工作</a> </li>
        <li> <a href="#">自我描述</a> </li>
        <li> <a href="#">教育经历</a> </li>
        <li> <a href="#">工作经历</a> </li>
        <li> <a href="#">项目经理</a> </li>
        <li> <a href="#">技能评价</a> </li>
    </ul>
</div>



<form class="form-horizontal">

<!--    <div class="row">-->

        <div class="col-lg-8 col-sm-8">

            <div class="form-group">
                <label class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="姓名">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">昵称</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="昵称">
                    <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">邮箱</label>
                <div class="col-sm-5">
                    <input type="text" name="" class="form-control" value="" placeholder="邮箱">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">手机</label>
                <div class="col-sm-5">
                    <input type="text" name="" class="form-control" value="" placeholder="手机">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">生日</label>
                <div class="col-sm-5">
                    <input type="text" name="" class="form-control" value="" placeholder="生日">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="">当前状态</label>
                <div class="col-sm-5">
                    <input type="text" name="" class="form-control" value="" placeholder="当前状态">
                </div>
            </div>

        </div>


<!--    </div>-->



</form>


