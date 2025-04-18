<?php

$mysqli = new mysqli("localhost", "root", "", "trello");

if ($mysqli->connect_errno) {
    die("MySQL bağlantısı başarısız: " . $mysqli->connect_error);
}

echo "Bağlantı başarılı. Veri ekleniyor...\n";

$i = 1;
while (true) {
    $name = "User $i";
    $email = "user$i@example.com";
    $password = password_hash("password$i", PASSWORD_BCRYPT); // güvenli şifreleme
    $created_at = date('Y-m-d H:i:s');

    $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $created_at, $created_at);

    if ($stmt->execute()) {
        echo "[$i] Kullanıcı eklendi: $email\n";
    } else {
        echo "[$i] Hata: " . $stmt->error . "\n";
    }

    $stmt->close();

    $i++;

    // CPU'yu yormamak için ufak bir bekleme eklenebilir
    // usleep(50000); // 50 milisaniye bekle (isteğe bağlı)
}

$mysqli->close();
