<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Issue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
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
        input[type="number"],
        input[type="datetime-local"],
        select {
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

        .combo {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        button.btn:hover {
            background-color: #45a049;
        }

        .container {
            margin-top: 20px;
        }

        select {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thêm Vấn Đề</h1>
        <form action="{{ route('createIssuePost') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="computer_id">Máy Tính:</label>
                <select name="computer_id" id="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reported_by">Người Báo Cáo:</label>
                <input type="text" id="reported_by" name="reported_by" value="{{ old('reported_by') }}">
            </div>

            <div class="form-group">
                <label for="reported_date">Ngày Báo Cáo:</label>
                <input type="datetime-local" id="reported_date" name="reported_date" value="{{ old('reported_date') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả Vấn Đề:</label>
                <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="combo">
                <div class="form-group">
                    <label for="urgency">Mức Độ:</label>
                    <select name="urgency" id="urgency" required>
                        <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Thấp</option>
                        <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Trung Bình</option>
                        <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>Cao</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Trạng Thái:</label>
                    <select name="status" id="status" required>
                        <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Mở</option>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>Đang Xử Lý</option>
                        <option value="Resolved" {{ old('status') == 'Resolved' ? 'selected' : '' }}>Đã Giải Quyết</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Sửa Vấn Đề</button>
        </form>
    </div>
</body>

</html>
