<?php
// 连接数据库
$conn = new mysqli("localhost", "api", "api", "data");
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取请求参数
$method = $_GET['method'];
$key = $_GET['key'];
$value = $_GET['value'];
$token = $_GET['token'];
// 根据请求方法执行操作
if (!isset($_GET['token'])) {
    echo json_encode(['status' => '403', 'message' => 'Access Denied']);
    exit();
}
switch ($method) {
    case 'add':
        // 设置数据
        $stmt = $conn->prepare("INSERT INTO `data` (`data_key`, `data_value`, `data_type`, `tokenbelong`) VALUES (?, ?, 1, ?)");
        $stmt->bind_param("sss", $key, $value, $token);
        $stmt->execute();
        echo json_encode(['status' => '200', 'message' => '数据设置成功']);
        break;
    case 'set':
        $stmt = $conn->prepare("update `data` set `data_value` = ? where `data_key` = ? and tokenbelong = ?");
        $stmt->bind_param("sss", $value, $key, $token);
        $stmt->execute();
        echo json_encode(['status' => '200', 'message' => '数据设置成功']);
        break;
    case 'del':
        $stmt = $conn->prepare("delete from `data` where `data_key` = ? and tokenbelong = ?");
        $stmt->bind_param("ss", $key, $token);
        $stmt->execute();
        echo json_encode(['status' => '200', 'message' => '数据删除成功']);
        break;

    case 'query': 
        $stmt = $conn->prepare("select * from `data` where `data_key` = ? and tokenbelong = ?"); 
        $stmt->bind_param("ss", $key, $token); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 

        if ($result) {
    // 逐行获取查询结果
            while ($row = $result->fetch_assoc()) {
        // 处理每一行数据
                echo json_encode(['status' => '100', 'value' => $row['data_value']]);
            }
    // 释放结果集
            $result->free();
        } else {
            echo json_encode(['status' => '404', 'message' => '未找到数据']);
        } 
        break;
    case 'queryall':
        $stmt = $conn->prepare("select * from `data` where tokenbelong = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $arr = [];
        

        if ($result) {
    // 逐行获取查询结果
            while ($row = $result->fetch_assoc()) {
        // 处理每一行数据
        
                $arr[$row['data_key']] = $row['data_value'];
                
            }
    // 释放结果集
            echo json_encode(['status' => '101', 'values' => json_encode($arr)]);
            $result->free();
        } else {
            echo json_encode(['status' => '404', 'message' => '未找到数据']);
        }
        break;
    default:
        echo json_encode(['status' => '400', 'message' => '无效的方法']);
}

// 关闭连接
$conn->close();
?>
