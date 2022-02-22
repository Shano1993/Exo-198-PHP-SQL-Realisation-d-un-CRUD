<?php

// Fonction pour créer un étudiant dans la base de donnée
function createStudent($name, $firstName, $age, $pdo) {
    $sql = "
    INSERT INTO students (name, firstName, age)
    VALUES ('$name', '$firstName', '$age')
    ";
    return $pdo->exec($sql);
}

// Fonction pour lire les données d'un étudiant
function readStudent($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM students");
    if ($stmt->execute()) {
        foreach ($stmt->fetchall() as $student) {
            echo 'Elèves : ' . $student['id'] . " " . $student['name'] . " " . $student['firstName'] . "<br>";
        }
    }
}

// Fonction pour remplacer les données d'un étudiant
function updateStudent($id, $name, $firstName, $age, $pdo) {
    $stmt = $pdo->prepare("UPDATE students SET name = :name, firstName = :firstName, age = :age WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':age', $age);

    $stmt->execute();
}

// Fonction pour supprimer un élève
function deleteStudent($id, $pdo) {
    $sql = "DELETE FROM students WHERE id = $id";
    if ($pdo->exec($sql) !== false) {
        echo "L'élève numéro " . $id . " a été supprimé";
    }
}
