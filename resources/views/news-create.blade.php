<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action={{route('create-news')}}>
    @csrf
    <div>
        <label for="title">title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="subtitle">subtitle</label>
        <textarea name="subtitle" rows="4" cols="4"></textarea>
    </div>
    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>
