# array_one_more
自己编写的多维数组和一维数组的互相转换，特征为多维数组转成一维数组时，其层次关系保存在一维数组的键名中，并可据此将一维数组再次转换为多维数组！
示例：
	多维数组：
		array('a'=>'aa','b'=>array('c'=>'cc','d'=>array('e'=>'ee','f'=>'ff'),));
	对应的一维数组：
		array('a'=>'aa','b.c'=>'cc','b.d.e'=>'ee','b.d.f'=>'ff');
	有些时候需要把多维数组转为一维数组展示，但又希望能转换回去时，可采用此方法
