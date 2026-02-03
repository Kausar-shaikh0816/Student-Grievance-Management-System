<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - Student Grievance Support System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color:rgb(242, 229, 229);
            color:rgb(21, 15, 15);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background:rgb(230, 224, 224);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color:rgb(0, 145, 255);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background:rgb(198, 191, 191);
            color:rgb(0, 0, 0);
            font-size: 1rem;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background:rgb(14, 115, 224);
            color: #121212;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background:rgb(8, 174, 220);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Set New Password</h2>
        <form onsubmit="return showPopup(event)">
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your new password" required>

            <button type="submit">Set Password</button>
        </form>
    </div>

    <script>
        function showPopup(event) {
            event.preventDefault(); // Prevents actual form submission
            let newPassword = document.getElementById('new-password').value;
            let confirmPassword = document.getElementById('confirm-password').value;

            if (newPassword === confirmPassword) {
                alert('Your password has been set successfully!');
            } else {
                alert('Passwords do not match. Please try again.');
            }
        }
    </script>
</body>
</html>

