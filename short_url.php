<?php
function short_links($id = '0')
{
    //当前值
    $id = strval($id);

    //定义最长为60位
    $id = str_pad($id, 60, '0', STR_PAD_LEFT);

    $idArr = str_split($id);
    $idArrReverse = array_reverse($idArr);

    //定义进制
    $radix = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $radixLen = strlen($radix);
    $radixArr = str_split($radix);
    $radixArrFlip = array_flip($radixArr);

    foreach ($idArrReverse as &$val) {
        //查询最后一位的位置
        if ($radixArrFlip[$val] < ($radixLen - 1)) {
            $val = $radixArr[$radixArrFlip[$val] + 1];
            break;
        }

        //如果是最后一位
        $val = '0';
    }

    //返回去年左边的0
    $idArrReverse = array_reverse($idArrReverse);
    return ltrim(implode('', $idArrReverse), '0');
}