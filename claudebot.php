<?php
session_start();

// Admin credentials
define('ADMIN_USERNAME', 'putapasswordhere');
define('ADMIN_PASSWORD', 'putapasswordhere');

// Initialize variables
$message = '';
$chatLog = '';
$currentTime = date('Y-m-d H:i:s');
$defaultMessage = "Welcome to claudemods Custom Chatbox! How can I assist you today?";
$error = '';
$success = '';
$isAdmin = false;

// Check if user is admin
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    $isAdmin = true;
}

// Handle admin login
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        $isAdmin = true;
        $success = "Admin login successful!";
    } else {
        $error = "Invalid credentials!";
    }
}

// Handle admin logout
if (isset($_POST['logout'])) {
    unset($_SESSION['admin_logged_in']);
    $isAdmin = false;
    $success = "Logged out successfully!";
}

// Handle IP ban
if ($isAdmin && isset($_POST['ban_ip'])) {
    $ipToBan = trim($_POST['ban_ip']);
    if (!empty($ipToBan)) {
        $bannedIps = file_exists('banned_ips.txt') ? file('banned_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        if (!in_array($ipToBan, $bannedIps)) {
            file_put_contents('banned_ips.txt', $ipToBan . PHP_EOL, FILE_APPEND);
            $success = "IP $ipToBan has been banned!";
        } else {
            $error = "IP $ipToBan is already banned!";
        }
    }
}

// Handle IP unban
if ($isAdmin && isset($_POST['unban_ip'])) {
    $ipToUnban = trim($_POST['unban_ip']);
    if (!empty($ipToUnban)) {
        $bannedIps = file_exists('banned_ips.txt') ? file('banned_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        if (($key = array_search($ipToUnban, $bannedIps)) !== false) {
            unset($bannedIps[$key]);
            file_put_contents('banned_ips.txt', implode(PHP_EOL, $bannedIps));
            $success = "IP $ipToUnban has been unbanned!";
        } else {
            $error = "IP $ipToUnban is not banned!";
        }
    }
}

// Check if current IP is banned
$userIp = $_SERVER['REMOTE_ADDR'];
$bannedIps = file_exists('banned_ips.txt') ? file('banned_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
if (in_array($userIp, $bannedIps)) {
    die("Your IP ($userIp) has been banned from accessing this chat.");
}

// Check if session is new (one-time use account)
if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;
    $_SESSION['username'] = 'Guest_' . substr(md5(uniqid()), 0, 8);
    $_SESSION['chat_history'] = [];
    $_SESSION['avatar'] = 'default.png';
    $_SESSION['ip'] = $userIp;
}

// Handle message deletion (admin only)
if ($isAdmin && isset($_POST['delete_msg'])) {
    $msgId = (int)$_POST['delete_msg'];
    if (isset($_SESSION['chat_history'][$msgId])) {
        // If message has an image, delete it
        if (isset($_SESSION['chat_history'][$msgId]['image'])) {
            @unlink($_SESSION['chat_history'][$msgId]['image']);
        }
        array_splice($_SESSION['chat_history'], $msgId, 1);
        $success = "Message deleted successfully!";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $message = trim($_POST['message']);
        if (!empty($message)) {
            // Add user message to chat history
            $_SESSION['chat_history'][] = [
                'sender' => $_SESSION['username'],
                'message' => $message,
                'time' => date('H:i:s'),
                'is_user' => true,
                'ip' => $userIp
            ];
        }
    }
    
    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
        $targetPath = $uploadDir . $filename;
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            $_SESSION['chat_history'][] = [
                'sender' => $_SESSION['username'],
                'message' => '[Photo]',
                'image' => $targetPath,
                'time' => date('H:i:s'),
                'is_user' => true,
                'ip' => $userIp
            ];
        }
    }
}

// Generate chat log from history
foreach ($_SESSION['chat_history'] as $id => $entry) {
    $chatLog .= "<div class='message' id='msg-$id'>";
    
    if ($isAdmin) {
        $chatLog .= "<form method='POST' style='display:inline;'>";
        $chatLog .= "<input type='hidden' name='delete_msg' value='$id'>";
        $chatLog .= "<button type='submit' class='delete-btn'>🗑️</button>";
        $chatLog .= "</form> ";
        $chatLog .= "<span class='ip-info' title='{$entry['ip']}'>";
    }
    
    $chatLog .= "<strong>{$entry['sender']}</strong> [{$entry['time']}]: ";
    
    if ($isAdmin) {
        $chatLog .= "</span>";
    }
    
    if (isset($entry['image'])) {
        $chatLog .= "<br><img src='{$entry['image']}' style='max-width: 300px; max-height: 300px;'><br>";
    } else {
        $chatLog .= $entry['message'];
    }
    
    $chatLog .= "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClaudeMods Custom Chatbox</title>
    <style>
        body {
            background-color: #00008B;
            color: #00FFFF;
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 20px;
        }
        
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #00FFFF;
            border-radius: 10px;
            padding: 15px;
            background-color: rgba(0, 0, 139, 0.7);
        }
        
        .ascii-art {
            color: #FF0000;
            text-align: center;
            margin-bottom: 20px;
            font-size: 10px;
            line-height: 1;
        }
        
        .chat-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #00FFFF;
            padding-bottom: 10px;
        }
        
        .chat-log {
            height: 400px;
            overflow-y: auto;
            border: 1px solid #00FFFF;
            padding: 10px;
            margin-bottom: 15px;
            background-color: rgba(0, 0, 0, 0.3);
        }
        
        .message {
            margin-bottom: 10px;
            padding: 5px;
            border-bottom: 1px dotted #00FFFF;
            position: relative;
        }
        
        .time-display {
            text-align: right;
            font-size: 12px;
            margin-bottom: 10px;
        }
        
        .input-area {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        textarea {
            background-color: #000033;
            color: #00FFFF;
            border: 1px solid #00FFFF;
            padding: 8px;
            border-radius: 5px;
            resize: none;
            height: 60px;
        }
        
        button {
            background-color: #0066CC;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0099FF;
        }
        
        .file-upload {
            margin-top: 10px;
        }
        
        .admin-panel {
            border: 1px solid #FF0000;
            padding: 10px;
            margin-bottom: 15px;
            background-color: rgba(139, 0, 0, 0.3);
        }
        
        .admin-panel h3 {
            color: #FF0000;
            margin-top: 0;
        }
        
        .delete-btn {
            background: none;
            border: none;
            color: red;
            padding: 0;
            cursor: pointer;
            font-size: 14px;
        }
        
        .ip-info {
            border-bottom: 1px dashed #00FFFF;
            cursor: help;
        }
        
        .error {
            color: #FF0000;
        }
        
        .success {
            color: #00FF00;
        }
        
        .login-form {
            margin: 20px auto;
            max-width: 300px;
            text-align: center;
        }
        
        .login-form input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            background-color: #000033;
            color: #00FFFF;
            border: 1px solid #00FFFF;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="ascii-art">
<pre>
░█████╗░██╗░░░░░░█████╗░██╗░░░██╗██████╗░███████╗███╗░░░███╗░█████╗░██████╗░░██████╗
██╔══██╗██║░░░░░██╔══██╗██║░░░██║██╔══██╗██╔════╝████╗░████║██╔══██╗██╔══██╗██╔════╝
██║░░╚═╝██║░░░░░███████║██║░░░██║██║░░██║█████╗░░██╔████╔██║██║░░██║██║░░██║╚█████╗░
██║░░██╗██║░░░░░██╔══██║██║░░░██║██║░░██║██╔══╝░░██║╚██╔╝██║██║░░██║██║░░██║░╚═══██╗
╚█████╔╝███████╗██║░░██║╚██████╔╝██████╔╝███████╗██║░╚═╝░██║╚█████╔╝██████╔╝██████╔╝
░╚════╝░╚══════╝╚═╝░░░░░░╚═════╝░╚══════╝░╚══════╝╚═╝░░░░░╚═╝░╚════╝░╚═════╝░╚═════╝░
</pre>
        </div>
        
        <div class="chat-header">
            <h2>ClaudeMods Custom Chatbox</h2>
            <div class="time-display">Current Time: <?php echo $currentTime; ?></div>
            <div>Your IP: <?php echo $userIp; ?></div>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if ($isAdmin): ?>
            <div class="admin-panel">
                <h3>Admin Panel</h3>
                <form method="POST">
                    <input type="text" name="ban_ip" placeholder="IP to ban" required>
                    <button type="submit">Ban IP</button>
                </form>
                <form method="POST">
                    <input type="text" name="unban_ip" placeholder="IP to unban" required>
                    <button type="submit">Unban IP</button>
                </form>
                <form method="POST">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        <?php elseif (!isset($_POST['login'])): ?>
            <div class="login-form">
                <h3>Admin Login</h3>
                <form method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
        <?php endif; ?>
        
        <div class="chat-log">
            <div class="message"><strong>ClaudeMods</strong>: <?php echo $defaultMessage; ?></div>
            <?php echo $chatLog; ?>
        </div>
        
        <form method="POST" action="" enctype="multipart/form-data" class="input-area">
            <textarea name="message" placeholder="Type your message here..." required></textarea>
            
            <div class="file-upload">
                <label for="photo">Select photo to send:</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>