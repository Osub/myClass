//五种排序算法
//①插入排序【稳定】
function charu ( $arr ) {
  $count = count ( $arr );
  for ( $i = 1; $i < $count; $i++ ) {
    $temp = $arr[$i];
    for ( $j = $i-1; $j>=0; $j--) {
      if ( $temp < $arr[$j] ) {
        $arr[$j+1] = $arr[$j];
        $arr[$j] = $temp;
      } else {
        break;
      }
    }
  }
  return $arr;
}

//②快速排序【不稳定】
function kuaisu ($arr) {
  $count = count ( $arr );
  if ( $count <= 1 ) {
    return $arr;
  }
  $temp = $arr[0];
  $left = $right = [];
  for ( $i = 1; $i < $count; $i++ ) {
    if ( $temp > $arr[$i] ) {
      $left[] = $arr[$i];
    } else {
      $right[] = $arr[$i];
    }
  }
  $left = kuaisu ( $left );
  $right = kuaisu ( $right );
  return array_merge ( $left, array($temp), $right);
}

//③选择排序【不稳定】
function xuanze ( $arr ) {
  $count = count ( $arr );
  for ( $i = 0; $i < $count - 1; $i++ ) {
    $min = $i;
    for ( $j = $i + 1; $j < $count; $j++ ) {
      if ( $arr[$min] > $arr[$j] ) {
        $min = $j;
      }
    }
    if ( $i != $min ) {
      $temp = 0;
      $temp = $arr[$min];
      $arr[$min] = $arr[$i];
      $arr[$i] = $temp;
    }
  }
  return $arr;
}

//④冒泡排序[稳定]
function maopao ( $arr ) {
  $count  = count( $arr );
  for ( $i = 0; $i < $count - 1; $i++ ) {
    for ( $j = $i + 1; $j < $count; $j++) {
      if( $arr[$i] > $arr[$j] ) {
        $temp = 0;
        $temp = $arr[$j];
        $arr[$j] = $arr[$i];
        $arr[$i] = $temp;
      }
    }
  }
  return $arr;
}

//⑤木桶排序【不稳定】
function mutong ( $arr ) {
  $min = min( $arr );
  $max = max( $arr );
  $count = count( $arr );
  $buffer = array_fill( $min, $max - $min + 1, 0);
  for ( $i = 0; $i < $count - 1; $i++ ) {
    $buffer[$arr[$i]] ++;
  }
  //根据统计桶内的次数输出桶内数字
  for ( $i = $min; $i < $max + 1; $i++) {
    for ($i = 0; $j < $buffer[$i]; $j++ ) {
      $result[] = $i;
    }
  }
  return $result;
}







