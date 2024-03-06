<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Popup Example</title>
</head>
<body>

<div id="overlay">
    <div id="popup-container">
        <img src="./images/tick3.png" alt="Tick Image">
        <h2>Thank You!</h2>
        <p>Your details have been submitted successfully!</p>
        <button class="btn" onclick="closePopup()">OK</button>
    </div>
</div>

<script>
    function openPopup() {
        document.getElementById('overlay').style.display = 'flex';
        document.getElementById('popup-container').style.display = 'block';
    }

    function closePopup() {
        // Simply close the popup without any redirection
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup-container').style.display = 'none';
    }
</script>

</body>
</html>
