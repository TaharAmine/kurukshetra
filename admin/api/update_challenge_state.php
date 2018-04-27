<?php

require $_SERVER['DOCUMENT_ROOT'].'/includes/core.php';
check_admin(); //not logged in? redirect to login page
if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $result = [];
    if ($action == 'approved' || $action == 'rejected') {
        $result = approve_reject_challenge($id, $action);
    } else if ($action == 'enabled' || $action == 'disabled') {
        $result = enable_disable_challenge($id, $action);
    } else {
        $result['success'] = false;
        $result['action'] = "invalid";
    }
} else {
    $result['success'] = false;
    $result['action'] = "invalid";
}
echo json_encode($result);
