<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Письмо с формы обратной связи {{env('APP_NAME')}}</title>
</head>
<body>

<p>Имя отправителя: {{$data['name'] ?? 'Не указан'}}</p>
<p>E-mail: {{$data['email'] ?? 'Не указан' }}</p>
<p>Сообщение: {{$data['subject'] ?? 'Не указан'}} </p>
<p>Телефон: {{$data['phone'] ?? 'Не указан'}} </p>
<p>Вложение: {{$data['file'] ?? 'Не указан'}} </p>

</body>

</html>
