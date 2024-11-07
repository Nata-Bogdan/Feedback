<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average</title>

    <style>
        body {
            display: grid;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            overflow: hidden;
        }

        .heading {
            display: flex;
            margin: 30px 0 30px 0;
            justify-content: center;
            align-items: center;
            font-size: 54px;
            text-align: center;
            color: #333;
        }

        .sign_in_container {
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-rows: 1fr 2px 4fr;
            padding: 20px 10px 20px 10px;
            min-width: fit-content;
            width: 50vw;
            max-width: 550px;
            min-height: fit-content;
            height: 80vh;
            max-height: 600px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .average_ratings {
            display: grid;
            height: 100%;
            padding: 0 20px 0px 30px;
            grid-template-columns: 150px 3fr;
        }

        .courses {
            display: grid;
            grid-template-rows: repeat(5, 1fr);
            justify-content: center;
            align-items: center;
            border-right: 2px dashed #ccc;
            font-size: 24px;
            font-weight: bold;
            font-variant: small-caps;
        }

        .rate {
            display: grid;
            grid-template-rows: repeat(5, 1fr);
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            font-variant: small-caps;
        }
        
    </style>
</head>



<body>
    <div class="sign_in_container">
        <h1 class="heading">Average ratings</h1>
        
        <div style="width: 400px; height: 2px; background-color: #ccc;"></div>

        <div class="average_ratings">
            <div class="courses">
                <div>Math</div>
                <div>History</div>
                <div>Physics</div>
                <div>Chemistry</div>
                <div>Biology</div>
            </div>
            <div class="rate">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "oprosnik_db";

                    // Подключение к базе данных
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Проверка подключения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Подготовленный запрос с параметром
                    $math = "SELECT AVG(math) AS average_math FROM responses";
                    $resultM = $conn->query($math);

                    

                    if ($resultM->num_rows > 0) {
                        $row = $resultM->fetch_assoc();
                        $averageMath = $row["average_math"];
                
                        echo '<div>' . round($averageMath, 2) . '</div>';
                    } else {
                        echo "<p>Нет данных для вычисления среднего арифметического.</p>";
                    }
                    
                    $history = "SELECT AVG(history) AS average_history FROM responses";
                    $resultH = $conn->query($history);

                    if ($resultH->num_rows > 0) {
                        $row = $resultH->fetch_assoc();
                        $averageHistory = $row["average_history"];
                
                        echo '<div>'. round($averageHistory, 2).'</div>';
                    } else {
                        echo "<p>Нет данных для вычисления среднего арифметического.</p>";
                    }

                    $physics = "SELECT AVG(physics) AS average_physics FROM responses";
                    $resultP = $conn->query($physics);

                    if ($resultP->num_rows > 0) {
                        $row = $resultP->fetch_assoc();
                        $averagePhysics = $row["average_physics"];
                
                        echo '<div>'. round($averagePhysics, 2).'</div>';
                    } else {
                        echo "<p>Нет данных для вычисления среднего арифметического.</p>";
                    }

                    $chemistry = "SELECT AVG(chemistry) AS average_chemistry FROM responses";
                    $resultC = $conn->query($chemistry);

                    if ($resultC->num_rows > 0) {
                        $row = $resultC->fetch_assoc();
                        $averageChemistry = $row["average_chemistry"];
                
                        echo '<div>'. round($averageChemistry, 2).'</div>';
                    } else {
                        echo "<p>Нет данных для вычисления среднего арифметического.</p>";
                    }

                    $biology = "SELECT AVG(biology) AS average_biology FROM responses";
                    $resultB = $conn->query($biology);

                    if ($resultB->num_rows > 0) {
                        $row = $resultB->fetch_assoc();
                        $averageBiology = $row["average_biology"];
                
                        echo '<div>'. round($averageBiology, 2).'</div>';
                    } else {
                        echo "<p>Нет данных для вычисления среднего арифметического.</p>";
                    }

                    $conn->close();  // Закрытие соединения
                ?>
            </div>
        </div>
</body>
</html>
