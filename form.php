<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شكراً لتسجيلك</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
           
            text-align:left;
            
        }
        .receipt {
            border: solid 3px black;
            padding: 1px;
            background-color:rgb(255, 255, 255);
        }
        
        h1 {
            color:rgb(255, 255, 255);
            background-color: red;
            padding: 0px;
            margin: 0px;
        }
        .data-row {
           
            padding-bottom: 10px;
            background-color: #DBA500;
            direction: ltr;
        }

        .secondRow {
            background-color: #92D050 !important;
            
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>مرحبا بك في موقعنا، البيانات التي تم ادخالها هي:</h1>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data and sanitize
            $firstName = htmlspecialchars($_POST['fullName']?? '');
            $lastName = htmlspecialchars($_POST['lastName']?? '');
           
        $birthDate = htmlspecialchars($_POST['birthDate'] ?? '');
            
        $birthDateObj = new DateTime($birthDate);
        $formattedDate = $birthDateObj->format('d/m/Y'); 
     
            $country = htmlspecialchars($_POST['country'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $phone = htmlspecialchars($_POST['phone'] ?? '');
        ?>
        
        <div class="data-row">
            <strong>Name:</strong> <?php echo $firstName . ' ' . $lastName; ?>
        </div>
        
        <div class="data-row secondRow">
            <strong>Date of Birth:</strong> <?php echo $formattedDate  ; ?>
        </div>
        
        <div class="data-row">
            <strong>Your Country:</strong> <?php echo $country; ?>
        </div>
        
        <div class="data-row secondRow">
            <strong>Email:</strong> <?php echo $email; ?>
        </div>
        
        <div class="data-row">
            <strong>Phone #:</strong> <?php echo $phone; ?>
        </div>
        
        <?php
        } else {
            echo "<p>لم يتم إرسال أي بيانات. يرجى ملء النموذج أولاً.</p>";
        }
        ?>
    </div>
</body>
</html>