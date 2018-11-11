<?php
/*
	多维数组和一维数组互相转换。
	多维数组转为一维数组时，将多维的键以指定字符间隔拼接起来作为一维数组的键。
	一维数组转为多维数组时，通过解析一维数组的键来生成多维数组。
	示例：
	多维数组：
		array('a'=>'aa','b'=>array('c'=>'cc','d'=>array('e'=>'ee','f'=>'ff'),));
	对应的一维数组：
		array('a'=>'aa','b.c'=>'cc','b.d.e'=>'ee','b.d.f'=>'ff');
	
*/
class one__more{
	public function __construct($glue='.'){
		$this->glue=$glue;
	}
	function one_more($one){
		if(!is_array($one) || empty($one)){
			return array();
		}
		$more=array();
		foreach($one as $key=>$value){
			$this->to_more($key,$value,$more);
		}
		return $more;
	}
	function to_more($key,$value,&$array){
		$key=trim($key,$this->glue);
		$index=strpos($key,$this->glue);
		if($index){
			$this->to_more(substr($key,$index),$value,$array[substr($key,0,$index)]);
		}else{
			$array[$key]=$value;
		}
	}
	function more_one($more){
		if(!is_array($more) || empty($more)){
			return array();
		}
		$one=array();
		foreach($more as $key=>$value){
			$this->to_one($key,$value,$one);
		}
		return $one;
	}
	function to_one($key,$value,&$one){
		if(is_array($value) && !empty($value)){
			foreach($value as $key1=>$value1){
				$this->to_one($key.$this->glue.$key1,$value1,$one);
			}
		}else{
			$one[$key]=$value;
		}
	}
}
