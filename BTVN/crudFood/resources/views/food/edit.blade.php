<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Food</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button.btn {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button.btn:hover {
            background-color: #45a049;
        }

        .hidden{
          display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Food</h1>
        <form action="{{ route('foodEditPost') }}" method="POST">
            @csrf
            <div class="form-group hidden">
                <input type="text"  name="id"
                    value="{{ $food->id }}" required>
            </div>
            <div class="form-group">
                <label for="name">Food Name</label>
                <input type="text" id="name" name="name" placeholder="Enter food name"
                    value="{{ $food->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter food description" required>{{ $food->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="count">Count</label>
                <input type="number" id="count" name="count" placeholder="Enter food count"
                    value={{ $food->count }} required>
            </div>
            <button type="submit" class="btn">Edit Food</button>
        </form>
    </div>
</body>

</html>
