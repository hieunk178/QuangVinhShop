<?php
if (isset($_POST['id_prov'])) {
    $id_prov = (int)$_POST['id_prov'];
    $where = "WHERE _province_id = {$id_prov}";
    $sql = "SELECT * FROM district $where";
    $result = mysqli_query($conn, $sql);
    $Prov = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Prov[] = $row;
        }
    }
    echo "<option value=''>Quận / Huyện</option>";
    foreach ($Prov as $item) {
        echo "<option value='{$item['id']}'>{$item['_name']}</option>";
    }
}
if (isset($_POST['id_dist'])) {
    $id_dist = (int)$_POST['id_dist'];
    $where = "WHERE _district_id = {$id_dist}";
    $sql = "SELECT * FROM ward $where";
    $result = mysqli_query($conn, $sql);
    $Dist = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Dist[] = $row;
        }
    }
    echo "<option value=''>Xã / Phường</option>";
    foreach ($Dist as $item) {
        echo "<option value='{$item['id']}'>{$item['_prefix']} {$item['_name']}</option>";
    }
}