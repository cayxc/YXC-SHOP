<?php namespace Common\Model;

use Hdphp\Model\Model;
class Detail extends Model{
    //指定表名
    protected $table='goods_details';
    //自动验证
    protected $validate=array(
//        array(字段名,验证方法,错误信息,验证条件,验证时间)
        array('gdimages','required','图片不能为空',3,3)
    );

    //商品详细添加
    public function store(){
        if ($this->create()){
            $this->add();
            return true;
        }
        return false;
    }
}