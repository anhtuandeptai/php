<?php
function timGiaTriLonNhat($mang) {
    return max($mang);
}

function timGiaTriNhoNhat($mang) {
    return min($mang);
}

function tinhTong($mang) {
    return array_sum($mang);
}

function kiemTraPhanTu($mang, $phanTu) {
    return in_array($phanTu, $mang);
}

function sapXepTangDan($mang) {
    sort($mang);
    return $mang;
}

function sapXepGiamDan($mang) {
    rsort($mang);
    return $mang;
}
?>
