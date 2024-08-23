<?php
function tinhtoan($sothunhat,$sothuhai,$luachon){
    switch($luachon){
        case 'tong':
            return $sothuhai + $sothuhai;
        case 'hieu':
            return $sothunhat-$sothuhai;
        case 'tich':
            return $sothunhat * $sothuhai;
        case 'thuong':
            if($sothuhai ==0){
                return "không thể chia cho 0";
            }
            return $sothunhat/$sothuhai;
        default:
        return "chưa nhập lựa chọn";
    }
}
?>