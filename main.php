<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มสมัครสมาชิก</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .sex-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .sex-buttons label {
            display: flex;
            align-items: center;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

        .result h3 {
            color: #333;
        }

        .result p {
            color: #555;
        }
    </style>
</head>
<body>

    <?php
    // ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // รับข้อมูลที่กรอกเข้ามา
        $name = $_POST['fname'];
        $surname = $_POST['Iname'];
        $birthday = $_POST['birthday'];
        $sex = $_POST['sex'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];

        // แปลงค่าของเพศ ('m' หรือ 'f') เป็นข้อความภาษาไทย
        if ($sex == 'm') {
            $sexText = 'ชาย';
        } elseif ($sex == 'f') {
            $sexText = 'หญิง';
        } else {
            $sexText = 'ไม่ระบุ';
        }

        // แสดงข้อมูลที่กรอก
        echo "<div class='result'>";
        echo "<h3>ข้อมูลที่คุณส่งมา</h3>";
        echo "<p>สวัสดีคุณ $name $surname </p>";
        echo "<p>วันเกิด : $birthday</p>";
        echo "<p>เพศ : $sexText</p>";
        echo "<p>ชื่อเข้าระบบ: $username</p>";
        echo "<p>รหัสผ่าน: $pwd</p>";
        
        // ปุ่มกลับไปยังหน้า main.php
        echo "<form action='main.php' method='get'>
                <input type='submit' value='กลับไปยังหน้าแรก'>
              </form>";
        echo "</div>";
    } else {
    ?>

    <h2>ฟอร์มสมัครสมาชิก</h2>
    <form action="main.php" method="POST">
        <label for="fname">ชื่อ:</label>
        <input type="text" id="fname" name="fname" required>

        <label for="Iname">นามสกุล:</label>
        <input type="text" id="Iname" name="Iname" required>

        <label for="birthday">วันเกิด:</label>
        <input type="date" id="birthday" name="birthday" required>

        <label>เพศ:</label>
        <div class="sex-buttons">
            <label>
                <input type="radio" name="sex" value="m" required> ชาย
            </label>
            <label>
                <input type="radio" name="sex" value="f" required> หญิง
            </label>
            <label>
                <input type="radio" name="sex" value="other" required> ไม่ระบุ
            </label>
        </div>

        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" id="username" name="username" required>

        <label for="pwd">รหัสผ่าน:</label>
        <input type="password" id="pwd" name="pwd" required>

        <input type="submit" value="สมัครสมาชิก">
    </form>

    <?php
    }
    ?>

</body>
</html>
