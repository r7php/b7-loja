<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
<body>
    <h1>Escolher CSV</h1>
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" accept=".csv">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
