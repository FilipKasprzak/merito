<?php
    session_start();

    $formData = $_SESSION['form_data'] ?? [];
    unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="store_user.php" method="post">
    <label>Imię: <input type="text" name="name" value="<?=htmlspecialchars($formData['name'] ?? '')?>" required></label><br><br>
    <label>Email: <input type="text" name="email" value="<?=htmlspecialchars($formData['email'] ?? '')?>" required></label><br><br>
    <label>Data urodzenia: <input type="text" name="birth_data" value="<?=htmlspecialchars($formData['birth_data'] ?? '')?>" required></label><br><br>
    <label>Płeć:
      <select name="gender" required>
        <option value="">-- wybierz --</option>
        <option value="male" <? ($formData['gender']?? '') === 'male' ? 'selected' : ''?>>Mężczyzna</option>
        <option value="female" <? ($formData['gender']?? '') === 'female' ? 'selected' : ''?>>Kobieta</option>
        <option value="other" <? ($formData['gender']?? '') === 'other' ? 'selected' : ''?>>Inna</option>
</select>
  </label><br><br>
  <label>Opis:
    <textarea name="description" cols="50" rows="4" <?= htmlspecialchars($formData['description'] ?? '')?>></textarea></label><br><br>

    <button type="submit">Zapisz</button>
</form>  
</body>
</html>