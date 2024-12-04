<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Entry</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Include your CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
@if (session('success'))
    <div style="color: green; font-weight: bold; margin-top: 20px;">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <h2>Create a New Entry</h2>
        
        <form action="/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="4" placeholder="Enter description" required></textarea>
            </div>
            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="file" name="picture" id="picture" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
        <a href="/">Back to Home</a> <br>
        <a href="/show">Show Entry</a>
    </div>
   

</body>
</html>
